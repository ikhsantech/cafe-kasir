<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Absensi::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Karyawan',
            'Tanggal Masuk',
            'Waktu Masuk',
            'Status',
            'Waktu Selesai Kerja',
            'created at',
            'updated at',
        ];
    }
}
