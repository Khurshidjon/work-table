<?php

namespace App\Http\Controllers;

use App\Data;
use App\DataCollection;
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
        $dataRegion = DataCollection::all();
        $dataSahovat = Data::where('id', '!=', null)->get();
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
        $sections = Section::query()->where('parent_id', null)->get();
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
        $data_collection = new DataCollection();
        $data_collection->title = $request->company_name;
        $data_collection->user_id = \Auth::id();
        if ($request->region_id != '' and $request->district_id != ''){
            $data_collection->region_id = $request->region_id;
            $data_collection->district_id = $request->district_id;
        }
        $data_collection->status = $request->status;
        $data_collection->save();

        foreach ($request->input('value') as $key => $section){
            $data = new Data();
            $data->value = $section;
            $data->section_id = $key;
            $data->data_id = $data_collection->id;
            $data->save();
        }
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
        $sections = Section::where('parent_id', null)->get();
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
