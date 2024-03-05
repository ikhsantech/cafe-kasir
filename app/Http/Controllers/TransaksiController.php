<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\TransaksiRequest;
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
        //
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
        try{
            $last_id = Transaksi::where('tanggal',date('Y-m-d'))->orderBy('tanggal','desc')->select('id')->first();

            $notrans = $last_id == null ? date('Ymd').'001':date('Ymd').sprintf('%04d', substr($last_id,8,4)+1);

            $insertTransaksi = Transaksi::create([
                    'id' =>$notrans,
                    'tanggal'=> date('Y-m-d'),
                    'total_harga'=>$request->total,
                    'metode_pembayaran'=>'cash',
                    'keterangan'=>''
            ]); 
            if(!$insertTransaksi->exists)return'error';
        

         
            // input detail transaksi
            foreach($request->orderedList as $detail){
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id'=>$notrans,
                    'menu_id'=>$detail['menu_id'],
                    'jumlah'=>$detail['qty'],
                    'menu_id'=>$detail['harga'] * $detail['qty'],

                ]);
            }

                    DB::commit();
                    return response()->json(['status'=>true,'message'=>"Pemesanan Berhasil",'notrans'=>$notrans]);
                 }catch(Exception | QueryException | PDOException $e){
                    return response()->json(['status'=>false,'message'=>"Pemesanan Gagal"]);

                    DB::rollback();
                 };

                 return $insertTransaksi;
    }


    public function faktur($nofaktur){
  try{
    $data['transaksi']=Transaksi::where('id',$nofaktur)->with(['detailTransaksi'=> function 
    ($query){
        $query->with('menu');
    }])->first();
    
    return view('cetak.faktur')->with($data);
  }catch(Exception | QueryException | PDOException $e){
    return response()->json(['status'=>false,'message'=>'Pemesanan Gagal']);
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
