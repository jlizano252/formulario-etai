<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RegisterExport implements FromCollection, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithStyles, WithTitle
{
    public function collection()
    {
        return Student::orderBy('created_at', 'desc')
            ->get()
            ->map(fn($s) => [
                'IDENTIFICACIÓN'   => $s->ide,
                'NOMBRE COMPLETO'  => strtoupper(trim($s->name . ' ' . $s->lastname)),
                'CORREO'           => $s->email,
                'TELÉFONO'       => $this->formatPhone($s->mobile),
                'CARRERA'          => $s->career,
                'CONTACTO 1'       => $s->emergency_name_1,
                'TELÉFONO C1'    => $this->formatPhone($s->emergency_phone_1),
                'CONTACTO 2'       => $s->emergency_name_2,
                'TELÉFONO C2'    => $this->formatPhone($s->emergency_phone_2),
                'FECHA REGISTRO'   => $s->created_at->toDateString(),
            ]);
    }

    public function title(): string
    {
        return 'Students - ' . date('Y-m-d');
    }

    public function headings(): array
    {
        return ['IDENTIFICACIÓN', 'ESTUDIANTE', 'CORREO', 'TELÉFONO', 'CARRERA', 'CONTACTO DE EMERGENCIA 1', 'TELÉFONO DE EMERGENCIA 1', 'CONTACTO DE EMERGENCIA 2', 'TELÉFONO DE EMERGENCIA 2', 'REGISTRADO'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => [
                'bold'  => true,
                'size'  => 12,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color'    => ['argb' => '1E75BB'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    private function formatPhone(string $phone): string
    {
        // Quita todo excepto dígitos y el +
        $clean = preg_replace('/[^\d+]/', '', $phone);

        // Si tiene +506 al inicio, formatea como +506 XXXX-XXXX
        if (preg_match('/^\+506(\d{4})(\d{4})$/', $clean, $m)) {
            return '+506 ' . $m[1] . '-' . $m[2];
        }

        // Para otros países, devuelve limpio con el +
        return $clean;
    }
}
