<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\tipe;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::with('tipe')->get();
        $tipe = Tipe::all();

        return view('menu.index', compact('menu', 'tipe'));
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
        $validated = $request->validated();
        $menu->update($validated);
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        $menu->delete();
        return redirect('menu');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . '_menu.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);
        return redirect('menu')->with('success', 'Import data berhasil');
    }

    public function downloadspdf()
    {
        $data['menu'] = Menu::get();
        $pdf = Pdf::loadView('menu.menu-pdf', $data);
        return $pdf->stream();
    }
}
