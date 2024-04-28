<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;

class DataController extends Controller
{
    public function index()
    {
        // total menu
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        // 

        // Tampilkan semua pendapatan
        $transaksi = Transaksi::get();
        $data['count_transaksi'] = $transaksi->count();


        return view('grafik.data')->with($data);
    }
}
