<?php

namespace App\Http\Controllers;

use App\Models\tipe;
use App\Models\kategori;
use App\Http\Requests\StoretipeRequest;
use App\Http\Requests\UpdatetipeRequest;
use Illuminate\Support\Facades\DB;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tipe = Tipe::With('kategori')->get();
       $kategori = Kategori::all();
        
        return view(('tipe.index'),compact('tipe','kategori'));


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
    public function store(StoretipeRequest $request)
    {
        Tipe::create($request->all());
        return redirect('tipe');
    }

    /**
     * Display the specified resource.
     */
    public function show(tipe $tipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipe $tipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetipeRequest $request, tipe $tipe)
    {
        $validated=$request->validated();
       $tipe->update($validated);
       return redirect()->route('tipe.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipe $tipe)
    {
          $tipe->delete();
        return redirect('tipe');
    }
}
