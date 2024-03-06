<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data['stok'] =stok::get();
      return view('stok.index')->with($data);
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
    public function store(StorestokRequest $request)
    {
       
        stok::create($request->all());
        
        return redirect('stok');
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, stok $stok)
    {
       $validated=$request->validated();
       $stok->update($validated);
       return redirect()->route('stok.index');

    // $stok->update($request)->all();
    // return redirect('stok.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $stok)
    {
     $stok->delete();
        return redirect('stok');
    }
}
