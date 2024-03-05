<?php

namespace App\Http\Controllers;

use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['titipan'] = ProdukTitipan::get();
      return view('titipan.index')->with($data);
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
    public function store(StoreProdukTitipanRequest $request)
    {
      ProdukTitipan::create($request->all());
        return redirect('titipan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produkTitipan)
    {
                   $validated=$request->validated();
       $produkTitipan->update($validated);
       return redirect()->route('titipan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produkTitipan)
    {
        // $produkTitipan->delete();
        // return redirect('titipan');
    }
}

