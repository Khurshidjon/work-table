<?php

namespace App\Http\Controllers;

use App\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = Indicator::all();
        return view('backend.superadmin.indicators.index', compact('indicators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicators = Indicator::where('status', 1)->get();
        return view('backend.superadmin.indicators.create', [
            'indicators' => $indicators
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indicator = new Indicator();
        $indicator->name_uz = $request->name_uz;
        $indicator->name_ru = $request->name_ru;
        $indicator->name_en = $request->name_en;
        $indicator->parent_id = $request->parent_id;
        if ($request->status == 'on'){
            $indicator->status = 1;
        }else{
            $indicator->status = 0;
        }
        $indicator->save();
        return redirect()->route('indicators.index')->with('success', 'Indicators has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function show(Indicator $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicator $indicator)
    {
        $indicators = Indicator::where('status', 1)->get();
        return view('backend.superadmin.indicators.edit', [
            'item' => $indicator,
            'indicators' => $indicators
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indicator $indicator)
    {
        $indicator->name_uz = $request->name_uz;
        $indicator->name_ru = $request->name_ru;
        $indicator->name_en = $request->name_en;
        $indicator->parent_id = $request->parent_id;
        if ($request->status == 'on'){
            $indicator->status = 1;
        }else{
            $indicator->status = 0;
        }
        $indicator->save();
        return redirect()->route('indicators.index')->with('success', 'Indicators has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicator  $indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indicator $indicator)
    {
        //
    }
}
