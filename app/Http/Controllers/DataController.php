<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\Tipe;
use App\Models\DetailTransaksi;
use App\Models\Stok;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        // total menu   
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        // total Jenis
        $tipe = Tipe::get();
        $data['count_tipe'] = $tipe->count();

        // stok
        $stokTerendah = Stok::orderBy('jumlah')->take(3)->get();
        $data['stokTerendah'] = $stokTerendah;



        // Tampilkan total transaksi
        $transaksi = Transaksi::get();
        $data['count_transaksi'] = $transaksi->count();

        // Tampilkan total pendapatan
        $pendapatan = Transaksi::all()->sum('total_harga');
        $data['pendapatan'] = 'Rp ' . number_format($pendapatan, 0, ',', '.');



        // Menu paling laku
        $palingLaku = DetailTransaksi::groupBy('menu_id')
            ->selectRaw('menu_id, COUNT(*) as subtotal')
            ->orderByDesc('subtotal')
            ->take(5)
            ->get();

        $palingLakuMenuNama = [];
        foreach ($palingLaku as $lak) {
            $menu_id = $lak->menu_id;
            $menu = Menu::find($menu_id);
            if ($menu) {
                $palingLakuMenuNama[] = $menu->nama_menu;
            }
        }

        $data['palingLaku'] = $palingLakuMenuNama;








        return view('grafik.data')->with($data);
    }
}
