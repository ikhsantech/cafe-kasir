<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
      use HasFactory;
    protected $table = 'menu';
    protected $fillable = [
        'nama_menu',
        'harga',
        'deskripsi',
        'jenis_id',
    ];

    
    public function tipe(){
    return $this->belongsTo(Tipe::class,'jenis_id');
    
}
}
