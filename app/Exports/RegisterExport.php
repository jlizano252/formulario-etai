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
                'IDE'        => $s->ide,
                'NAME'       => strtoupper(trim($s->name . ' ' . $s->lastname)),
                'EMAIL'      => $s->email,
                'PHONE'      => $s->mobile,
                'REGISTERED' => $s->created_at->toDateString(),
            ]);
    }

    public function title(): string
    {
        return 'Students - ' . date('Y-m-d');
    }

    public function headings(): array
    {
        return ['ID NUMBER', 'NAME', 'EMAIL', 'PHONE', 'REGISTERED'];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->applyFromArray([
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
}
