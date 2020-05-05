<?php

namespace App\Http\Controllers;

use App\Data;
use App\District;
use App\Region;
use App\Section;
use App\Table;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function index()
    {
        $tables = Table::where('status', 1)->get();
        return view('backend.admin.getData.index', compact('tables'));
    }
    public function getTableData(Table $table)
    {
        $sectionTop = Section::where('status', 1)->where('table_id', $table->id)->get();
        $sectionBottom = Section::where('status', 0)->where('table_id', $table->id)->get();
        $regions = Region::all();
        return view('backend.admin.getData.data', [
            'table' => $table,
            'sectionTop' => $sectionTop,
            'sectionBottom' => $sectionBottom,
            'regions' => $regions
        ]);
    }

    public function getTableDataRegional(Region $region, Table $table)
    {
        $sectionTop = Section::where('status', 1)->where('table_id', $table->id)->get();
        $sectionBottom = Section::where('status', 0)->where('table_id', $table->id)->get();
        $districts = District::where('region_id', $region->id)->get();
        return view('backend.admin.getData.dataRegional', [
            'table' => $table,
            'sectionTop' => $sectionTop,
            'sectionBottom' => $sectionBottom,
            'districts' => $districts,

        ]);
    }

    public function getTableDataResult(District $district, Table $table)
    {
        $sectionTop = Section::where('status', 1)->where('table_id', $table->id)->get();
        $sectionBottom = Section::where('status', 0)->where('table_id', $table->id)->orderBy('order')->orderBy('created_at')->get();
        $sectionBottom2 = Section::where('status', 2)->where('table_id', $table->id)->orderBy('order')->orderBy('created_at')->get();
        $cols = Section::where('colspan', 1)->where('table_id', $table->id)->with('data')->get();
        $district = District::find( $district->id);
        $data = Data::where('status', 1)->get();
        return view('backend.admin.getData.dataResult', [
            'table' => $table,
            'sectionTop' => $sectionTop,
            'sectionBottom' => $sectionBottom,
            'sectionBottom2' => $sectionBottom2,
            'district' => $district,
            'data' => $data,
            'cols' => $cols
        ]);
    }
}
