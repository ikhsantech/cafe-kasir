<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = pelanggan::get();
        return view('pelanggan.index')->with($data);
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
    public function store(StorepelangganRequest $request)
    {
        pelanggan::create($request->all());
        return redirect('pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $validated = $request->validated();
        $pelanggan->update($validated);
        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('pelanggan');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date . '_pelanggan.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new PelangganImport, $request->import);
        return redirect('pelanggan')->with('success', 'Import data berhasil');
    }

    public function downloadspdf()
    {
        $data['pelanggan'] = Pelanggan::get();
        $pdf = Pdf::loadView('pelanggan.pelanggan-pdf', $data);
        return $pdf->stream();
    }
}
