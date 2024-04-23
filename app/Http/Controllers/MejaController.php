<?php

namespace App\Http\Controllers;

use App\Models\meja;
use App\Http\Requests\StoremejaRequest;
use App\Http\Requests\UpdatemejaRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MejaExport;
use App\Imports\MejaImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meja'] = meja::get();
        return view('meja.index')->with($data);
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
    public function store(StoremejaRequest $request)
    {
        meja::create($request->all());
        return redirect('meja');
    }

    /**
     * Display the specified resource.
     */
    public function show(meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemejaRequest $request, meja $meja)
    {
        $validated = $request->validated();
        $meja->update($validated);
        return redirect()->route('meja.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(meja $meja)
    {
        $meja->delete();
        return redirect('meja');
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date . '_meja.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MejaImport, $request->import);
        return redirect('meja')->with('success', 'Import data berhasil');
    }

    public function downloadspdf()
    {
        $data['meja'] = Meja::get();
        $pdf = Pdf::loadView('meja.meja-pdf', $data);
        return $pdf->stream();
    }
}
