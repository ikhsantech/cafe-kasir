<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Models\menu;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StokExport;
use App\Imports\StokImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        $stok = Stok::with('menu')->get();
        return view('stok.index', compact('stok', 'menu'));
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
        $validated = $request->validated();
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

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date . '_stok.xlsx');
    }


    public function importData(Request $request)
    {

        Excel::import(new StokImport, $request->import);
        return redirect('stok')->with('success', 'Import data berhasil');
    }



    public function downloadspdf()
    {
        $data['stok'] = Stok::get();
        $pdf = Pdf::loadView('stok.stok-pdf', $data);
        return $pdf->stream();
    }
}
