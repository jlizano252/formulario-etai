<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Exports\RegisterExport;
use App\Exports\ContactsExport;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class StudentsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showModal = false;
    public ?Student $selectedStudent = null;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public bool $exporting = false;

    public function export()
    {
        $this->exporting = true;

        $file = Excel::download(
            new RegisterExport('students'),
            'Students-' . date('Y-m-d_H-i-s') . '.xlsx'
        );

        $this->exporting = false;

        return $file;
    }

    public function exportContacts()
    {
        $this->exporting = true;

        $file = Excel::download(
            new ContactsExport,
            'Contactos-' . date('Y-m-d_H-i-s') . '.xlsx'
        );

        $this->exporting = false;

        return $file;
    }

    public function openModal(int $studentId): void
    {
        $this->selectedStudent = Student::find($studentId);
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->selectedStudent = null;
        $this->showModal = false;
    }

    public function render()
    {
        $students = Student::query()
            ->where(function ($q) {
                $q->where('name',     'LIKE', '%' . $this->search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email',    'LIKE', '%' . $this->search . '%')
                    ->orWhere('ide',      'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('livewire.admin.dashboard.students-table', compact('students'));
    }
    
    public function updatedSearch(): void
    {
        // necesario para que wire:target lo reconozca
    }
}
