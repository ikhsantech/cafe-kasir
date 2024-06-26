<?php

namespace App\Exports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Sheet;

class StokExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Stok::all();
    }


    public function headings(): array
    {
        return [
            'No',
            'Menu ID',
            'Jumlah',
            'Created at',
            'Updated at',
        ];
    }


}
