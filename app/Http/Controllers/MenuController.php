<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\tipe;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('tipe')->get();
        $tipe = Tipe::all();

        return view('menu.index',compact('menu','tipe'));
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
    public function store(StoremenuRequest $request)
    {
        Menu::create($request->all());
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemenuRequest $request, menu $menu)
    {
         $validated=$request->validated();
       $menu->update($validated);
       return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        //
    }
}
