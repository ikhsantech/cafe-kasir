<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
  use HasFactory;
  protected $table = 'tipe';
  protected $fillable = [
    'nama_jenis',
    'kategori_id'
  ];


  public function menu()
  {
    return $this->hasMany(Menu::class, 'jenis_id');
  }

  public function kategori()
  {
    return $this->belongsTo(Kategori::class);
  }
}
