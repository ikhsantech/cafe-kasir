<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
     use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama'
    ];

      public function tipe(){
    return $this->hasMany(Tipe::class,'jenis_id','id');
    
}
}
