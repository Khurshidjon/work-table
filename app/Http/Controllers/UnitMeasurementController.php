<?php

namespace App\Http\Controllers;

use App\UnitMeasurement;
use Illuminate\Http\Request;

class UnitMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitMeasurement = UnitMeasurement::all();
        return view('backend.superadmin.units.index', compact('unitMeasurement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.superadmin.units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unitMeasurement = new UnitMeasurement();
        $unitMeasurement->name_uz = $request->name_uz;
        $unitMeasurement->name_ru = $request->name_ru;
        $unitMeasurement->name_en = $request->name_en;
        if ($request->status == 'on'){
            $unitMeasurement->status = 1;
        }else{
            $unitMeasurement->status = 0;
        }
        $unitMeasurement->save();
        return redirect()->route('unit-measurement.index')->with('success', 'Unit measurement has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitMeasurement  $unitMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(UnitMeasurement $unitMeasurement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitMeasurement  $unitMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitMeasurement $unitMeasurement)
    {
        return view('backend.superadmin.units.edit', [
            'item' => $unitMeasurement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitMeasurement  $unitMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitMeasurement $unitMeasurement)
    {
        $unitMeasurement->name_uz = $request->name_uz;
        $unitMeasurement->name_ru = $request->name_ru;
        $unitMeasurement->name_en = $request->name_en;
        if ($request->status == 'on'){
            $unitMeasurement->status = 1;
        }else{
            $unitMeasurement->status = 0;
        }
        $unitMeasurement->update();
        return redirect()->route('unit-measurement.index')->with('success', 'Unit measurement has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitMeasurement  $unitMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitMeasurement $unitMeasurement)
    {
        //
    }
}
