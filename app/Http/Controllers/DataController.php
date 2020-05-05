<?php

namespace App\Http\Controllers;

use App\Data;
use App\District;
use App\Indicator;
use App\Region;
use App\Section;
use App\UnitMeasurement;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataRegion = Data::where('region_id', '!=', null)->get();
        $dataSahovat = Data::where('indicator_id', '!=', null)->get();
        return view('backend.sectors.data.index', [
            'dataRegion' => $dataRegion,
            'dataSahovat' => $dataSahovat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type = '')
    {
        $sections = Section::all();
        $units = UnitMeasurement::all();
        $indicators = Indicator::all();
        $regions = Region::all();
        return view('backend.sectors.data.create', [
            'sections' => $sections,
            'units' => $units,
            'indicators' => $indicators,
            'regions' => $regions,
            'type' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        if ($type == 'region'){
            $request->validate([
                'region_id' => 'required|numeric',
                'district_id' => 'required|numeric',
            ]);
        }
        $data = new Data();
        $data->title = $request->title;
        $data->value = $request->value;
        if ($request->region_id != '' and $request->district_id != ''){
            $data->region_id = $request->region_id;
            $data->district_id = $request->district_id;
        }
        $data->section_id = $request->section_id;
        $data->unit_id = $request->unit_id;
        $data->indicator_id = $request->indicator_id;
        $data->user_id = \Auth::id();
        $data->status = $request->status;
        $data->save();
        return redirect()->route('data.index')->with('success', 'Section has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data, $type)
    {
        $sections = Section::all();
        $units = UnitMeasurement::all();
        $indicators = Indicator::all();
        $regions = Region::all();
        $district = District::find($data->district_id);

        return view('backend.sectors.data.edit', [
            'sections' => $sections,
            'units' => $units,
            'indicators' => $indicators,
            'regions' => $regions,
            'data' => $data,
            'type' => $type,
            'district' => $district
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data, $type)
    {
        if ($type == 'region'){
            $request->validate([
                'region_id' => 'required|numeric',
                'district_id' => 'required|numeric',
            ]);
        }
        $data->title = $request->title;
        $data->value = $request->value;
        $data->region_id = $request->region_id;
        $data->district_id = $request->district_id;
        $data->section_id = $request->section_id;
        $data->unit_id = $request->unit_id;
        $data->indicator_id = $request->indicator_id;
        $data->user_id = \Auth::id();
        $data->status = $request->status;
        $data->update();
        return redirect()->route('data.index')->with('success', 'Section has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function changeDistricts(Request $request)
    {
        $districts = District::where('region_id', $request->region_id)->get();
        return response()->json($districts);
    }
}
