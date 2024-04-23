<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['absensi'] = absensi::orderBy('created_at', 'ASC')->get();
        return view('absensi.index')->with($data);
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
    public function store(StoreabsensiRequest $request)
    {
        Absensi::create($request->all());
        return redirect('absensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateabsensiRequest $request, absensi $absensi)
    {
        $validated = $request->validated();
        $absensi->update($validated);
        return redirect()->route('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(absensi $absensi)
    {
        $absensi->delete();
        return redirect('absensi');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . '_absensi.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new AbsensiImport, $request->import);
        return redirect('absensi')->with('success', 'Import data berhasil');
    }


    public function downloadspdf()
    {
        $data['absensi'] = Absensi::get();
        $pdf = Pdf::loadView('absensi.absensi-pdf', $data);
        return $pdf->stream();
    }
}
