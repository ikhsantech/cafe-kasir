<?php

namespace App\Imports;

use App\Models\Tipe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TipeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Tipe([
            'nama_jenis' => $row[0],
            'kategori_id' => $row[1]
        ]);
    }
}
