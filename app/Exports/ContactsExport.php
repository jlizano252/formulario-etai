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

class ContactsExport implements FromCollection, WithStrictNullComparison, WithHeadings, ShouldAutoSize, WithStyles, WithTitle
{
    public function collection()
    {
        return Student::orderBy('created_at', 'desc')
            ->get()
            ->map(fn($s) => [
                'NOMBRE'    => strtoupper($s->name),
                'APELLIDOS' => strtoupper($s->lastname),
                'TELÉFONO'  => $this->formatPhone($s->mobile),
            ]);
    }

    public function title(): string
    {
        return 'Contactos - ' . date('Y-m-d');
    }

    public function headings(): array
    {
        return ['NOMBRE', 'APELLIDOS', 'TELÉFONO'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:C1')->applyFromArray([
            'font' => [
                'bold'  => true,
                'size'  => 12,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color'    => ['argb' => '42AB34'], // verde institucional
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    private function formatPhone(string $phone): string
    {
        $clean = preg_replace('/[^\d+]/', '', $phone);

        if (preg_match('/^\+506(\d{4})(\d{4})$/', $clean, $m)) {
            return '+506 ' . $m[1] . '-' . $m[2];
        }

        return $clean;
    }
}