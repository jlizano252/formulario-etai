<?php

namespace App\Http\Livewire\Public\EnrollmentForm\V1;

use App\Models\Student;
use App\Helpers\MailService;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class StudentForm extends Component
{
    // Pasos
    public int $current_step = 1;
    public int $steps_count = 4;

    // Paso 1 — Instrucciones / confirmación
    public string $accepts_terms = 'si';

    // Paso 2 — Datos personales
    public string $ide       = '';
    public string $name      = '';
    public string $lastname  = '';
    public string $email     = '';
    public string $mobile    = '';
    public string $career = '';

    // Paso 3 — Contactos de Emergencia

    public string $contact1_name      = '';
    public string $contact1_relation  = '';
    public string $contact1_phone     = '';

    public string $contact2_name      = '';
    public string $contact2_relation  = '';
    public string $contact2_phone     = '';

    // Paso 4 — Confirmación (solo lectura, sin campos extra por ahora)

    public function validateData(): void
    {
        switch ($this->current_step) {
            case 2:

                $this->validate([
                    'ide'      => 'required|string|min:5|max:30|unique:students,ide',
                    'name'     => 'required|string|min:2|max:180',
                    'lastname' => 'required|string|min:2|max:180',
                    'email'    => 'required|email|max:180|unique:students,email',
                    'mobile' => ['required', 'string', 'regex:/^\+[1-9]\d{7,14}$/'],
                    'career' => 'required|string|max:150',
                ]);

                break;

            case 3:

                $this->validate([
                    'contact1_name'     => 'required|min:3|max:180',
                    'contact1_relation' => 'required|max:100',
                    'contact1_phone'    => ['required', 'regex:/^\+506\s?[0-9]{4}-?[0-9]{4}$/'],

                    'contact2_name'     => 'required|min:3|max:180',
                    'contact2_relation' => 'required|max:100',
                    'contact2_phone'    => ['required', 'regex:/^\+506\s?[0-9]{4}-?[0-9]{4}$/'],
                ]);

                $this->validateEmergencyContacts();

                break;
        }
    }

    private function validateEmergencyContacts(): void
    {
        $studentFullName = strtolower(trim($this->name . ' ' . $this->lastname));

        $contact1 = strtolower(trim($this->contact1_name));
        $contact2 = strtolower(trim($this->contact2_name));

        /*
        |--------------------------------------------------------------
        | No puede ponerse a sí mismo
        |--------------------------------------------------------------
        */
        if ($contact1 === $studentFullName || $this->contact1_phone === $this->mobile) {
            $this->addError('contact1_name', 'No puede agregarse como contacto de emergencia.');
        }

        if ($contact2 === $studentFullName || $this->contact2_phone === $this->mobile) {
            $this->addError('contact2_name', 'No puede agregarse como contacto de emergencia.');
        }

        /*
        |--------------------------------------------------------------
        | Contactos distintos entre sí
        |--------------------------------------------------------------
        */
        if ($contact1 === $contact2 || $this->contact1_phone === $this->contact2_phone) {
            $this->addError('contact2_name', 'Los contactos deben ser diferentes.');
        }

        /*
        |--------------------------------------------------------------
        | Si hubo errores, detener proceso
        |--------------------------------------------------------------
        */
        if ($this->getErrorBag()->isNotEmpty()) {
            throw \Illuminate\Validation\ValidationException::withMessages(
                $this->getErrorBag()->toArray()
            );
        }
    }

    public function increaseStep(): void
    {
        $this->resetErrorBag();

        $this->validateData();

        $this->current_step++;

        if ($this->current_step > $this->steps_count) {
            $this->current_step = $this->steps_count;
            $this->processData();
        }
    }

    public function decreaseStep(): void
    {
        $this->resetErrorBag();
        $this->current_step = max(1, $this->current_step - 1);
    }

    public function processData(): void
    {
        $this->resetErrorBag();

        $params = [
            'ide'      => $this->ide,
            'name'     => $this->name,
            'lastname' => $this->lastname,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'career'   => $this->career,

            'emergency_name_1'  => $this->contact1_name,
            'emergency_phone_1' => $this->contact1_phone,

            'emergency_name_2'  => $this->contact2_name,
            'emergency_phone_2' => $this->contact2_phone,
        ];

        try {
            Student::create($params);
            // MailService::sendRegisterMailNotification($params);
            $this->redirect(route('public.register.success'));
        } catch (\Exception $e) {
            $this->redirect(route('public.register.error'));
        }
    }

    public function render()
    {
        return view('livewire.public.enrollment-form.v1.student-form');
    }
}
