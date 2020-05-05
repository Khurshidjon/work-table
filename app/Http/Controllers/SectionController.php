<?php

namespace App\Http\Controllers;

use App\Section;
use App\Table;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('backend.superadmin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status', 1)->get();
        return view('backend.superadmin.sections.create', [
            'tables' => $tables
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
        $section = new Section();
        $section->name_uz = $request->name_uz;
        $section->name_ru = $request->name_ru;
        $section->name_en = $request->name_en;
        $section->colspan = $request->colspan;
        $section->rowspan = $request->rowspan;
        $section->order = $request->order;
        $section->table_id = $request->table_id;
        $section->formula_id = $request->formula_id;
        $section->head_style = $request->head_style;
        if ($request->status == 'on'){
            $section->status = 1;
        }else{
            $section->status = 0;
        }
        $section->save();
        return redirect()->route('sections.index')->with('success', 'Section has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $tables = Table::where('status', 1)->get();
        return view('backend.superadmin.sections.edit', [
            'item' => $section,
            'tables' => $tables,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section->name_uz = $request->name_uz;
        $section->name_ru = $request->name_ru;
        $section->name_en = $request->name_en;
        $section->colspan = $request->colspan;
        $section->rowspan = $request->rowspan;
        $section->table_id = $request->table_id;
        $section->formula_id = $request->formula_id;
        $section->head_style = $request->head_style;
        $section->order = $request->order;
        if ($request->status == 'on'){
            $section->status = 1;
        }else{
            $section->status = 0;
        }
        $section->save();
        return redirect()->route('sections.index')->with('success', 'Section has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
