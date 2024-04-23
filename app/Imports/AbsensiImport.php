<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;

class AbsensiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Absensi([
            'nama_karyawan' => $row[0],
            'tanggal_masuk' => $row[1],
            'waktu_masuk' => $row[2],
            'status' => $row[3],
            'waktu_selesai' => $row[4],
        ]);
    }
}
