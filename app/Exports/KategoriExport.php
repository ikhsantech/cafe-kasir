<?php

namespace App\Exports;


use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Sheet;

class KategoriExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kategori::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'nama kategori',
            'created at',
            'updated at',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Autosize columns A, B, C, and D
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);

                // Insert two new rows before the first row
                $event->sheet->insertNewRowBefore(1);

                // Merge cells A1 to C1 and set value to 'DATA KATEGORI'
                $event->sheet->mergeCells('A1:C1');
                $event->sheet->setCellValue('A1', 'DATA KATEGORI');

                // Style A1: bold and horizontally center
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // Apply border to cells from A3 to the last row
                $event->sheet->getStyle('A1:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
