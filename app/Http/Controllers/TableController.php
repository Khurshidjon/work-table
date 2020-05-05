<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('backend.superadmin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status', 1)->get();
        return view('backend.superadmin.tables.create', [
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
        $table = new Table();
        $table->name_uz = $request->name_uz;
        $table->name_ru = $request->name_ru;
        $table->name_en = $request->name_en;
        if ($request->status == 'on'){
            $table->status = 1;
        }else{
            $table->status = 0;
        }
        if ($request->type == 'on'){
            $table->type = 1;
        }else{
            $table->type = 2;
        }
        $table->save();
        return redirect()->route('tables.index')->with('success', 'Table has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('backend.superadmin.tables.edit', [
            'item' => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $table->name_uz = $request->name_uz;
        $table->name_ru = $request->name_ru;
        $table->name_en = $request->name_en;
        if ($request->status == 'on'){
            $table->status = 1;
        }else{
            $table->status = 0;
        }
        if ($request->type == 'on'){
            $table->type = 1;
        }else{
            $table->type = 2;
        }
        $table->update();
        return redirect()->route('tables.index')->with('success', 'Table has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table has been deleted successfully');
    }
}
