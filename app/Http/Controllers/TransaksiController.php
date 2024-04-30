<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\TransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['transaksi'] = Transaksi::orderBy('created_at', 'ASC')->get();
        // return view('transaksi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaksiRequest $request)
    {



        try {

            DB::beginTransaction();


            $today = now()->format('Ymd');
            $last_custom_id = transaksi::where('tanggal', $today)->orderBy('id', 'desc')->first();

            if ($last_custom_id) {
                $last_id = substr($last_custom_id->id, -4);
                $notrans = $today . str_pad((intval($last_id) + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $notrans = $today . '0001';
            }

            $insertTransaksi = transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => 'uji coba',
            ]);


            if (!$insertTransaksi) return 'error';

            // input detail transaksi
            foreach ($request->orderedList as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'],

                ]);
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => "Pemesanan Berhasil", 'notrans' => $insertTransaksi->id]);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage(), 'error' => $e->getMessage()]);

            DB::rollback();
        };

        return $insertTransaksi;
    }


    public function faktur($nofaktur)
    {
        try {
            $transaksi = transaksi::findOrFail($nofaktur);


            return view('cetak.faktur', compact('transaksi'));
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
