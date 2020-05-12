<?php

namespace App\Http\Controllers;

use App\DataPoorPopulation;
use App\Indicator;
use App\Region;
use App\Table;
use App\UnitMeasurement;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;

class DataPoorPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Table $table)
    {
        $indicators = Indicator::all();
        $units = UnitMeasurement::all();
        return view('backend.sectors.poor-population.create', [
            'table' => $table,
            'indicators' => $indicators,
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Table $table)
    {
        $poorPopulation = new DataPoorPopulation();
        $poorPopulation->value = $request->value;
        $poorPopulation->user_id = \Auth::id();
        $poorPopulation->indicator_id = $request->get('indicator_id');
        $poorPopulation->unit_id = $request->get('unit_id');
        $poorPopulation->region_id = \Auth::user()->region_id;
        $poorPopulation->district_id = \Auth::user()->district_id;
        $poorPopulation->mahalla_id = \Auth::user()->quarter_id;
        $poorPopulation->sector_id = \Auth::user()->sector_id;
        $poorPopulation->status = DataPoorPopulation::STATUS_NEW;
        $poorPopulation->save();
        return redirect()->route('data.list', [$table])->with('success', 'Section has been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataPoorPopulation  $dataPoorPopulation
     * @return \Illuminate\Http\Response
     */
    public function show(DataPoorPopulation $dataPoorPopulation, Table $table)
    {
        return view('backend.sectors.poor-population.show', [
            'table' => $table,
            'dataPoorPopulation' => $dataPoorPopulation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPoorPopulation  $dataPoorPopulation
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPoorPopulation $dataPoorPopulation, Table $table)
    {
        $indicators = Indicator::all();
        $units = UnitMeasurement::all();
        return view('backend.sectors.poor-population.edit', [
            'table' => $table,
            'indicators' => $indicators,
            'units' => $units,
            'dataPoorPopulation' => $dataPoorPopulation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPoorPopulation  $dataPoorPopulation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPoorPopulation $dataPoorPopulation, Table $table)
    {
        $request->validate([
            'indicator_id' => 'required',
            'value' => 'required',
            'unit_id' => 'required',
        ]);
        $dataPoorPopulation->value = $request->value;
        $dataPoorPopulation->user_id = \Auth::id();
        $dataPoorPopulation->indicator_id = $request->get('indicator_id');
        $dataPoorPopulation->unit_id = $request->get('unit_id');
        $dataPoorPopulation->mahalla_id = \Auth::user()->quarter_id;
        $dataPoorPopulation->sector_id = \Auth::user()->sector_id;
        $dataPoorPopulation->status = DataPoorPopulation::STATUS_NEW;
        $dataPoorPopulation->update();
        return redirect()->route('data.list', [$table])->with('success', 'Section has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPoorPopulation  $dataPoorPopulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPoorPopulation $dataPoorPopulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPoorPopulation  $dataPoorPopulation
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, DataPoorPopulation $dataPoorPopulation, Table $table)
    {
        if ($request->status == 'published'){
            $dataPoorPopulation->status = DataPoorPopulation::STATUS_MODERATED;
        }elseif($request->status == 'unpublished'){
            $dataPoorPopulation->status = DataPoorPopulation::STATUS_CANCELLED;
        }
        $dataPoorPopulation->update();
        if ($request->currentPage){
            return redirect('data/index-list/'.$table->id.'?page='.$request->currentPage)->with('success', 'Data has been updated successfully');
        }else{
            return redirect()->route('data.index')->with('success', 'Data has been updated successfully');
        }
    }

}
