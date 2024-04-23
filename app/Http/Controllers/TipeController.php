<?php

namespace App\Http\Controllers;

use App\Models\tipe;
use App\Models\kategori;
use App\Http\Requests\StoretipeRequest;
use App\Http\Requests\UpdatetipeRequest;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TipeExport;
use App\Imports\TipeImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipe = Tipe::With('kategori')->get();
        $kategori = Kategori::all();

        return view(('tipe.index'), compact('tipe', 'kategori'));
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
        $validated = $request->validated();
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

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new TipeExport, $date . '_tipe.xlsx');
    }


    public function importData(Request $request)
    {

        Excel::import(new TipeImport, $request->import);
        return redirect('tipe')->with('success', 'Import data berhasil');
    }

    public function downloadspdf()
    {
        $data['tipe'] = Tipe::get();
        $pdf = Pdf::loadView('tipe.tipe-pdf', $data);
        return $pdf->stream();
    }
}
