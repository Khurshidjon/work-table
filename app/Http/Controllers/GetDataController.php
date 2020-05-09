<?php

namespace App\Http\Controllers;

use App\Data;
use App\DataCollection;
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
        $regions = Region::query()->orderBy('id')->get();

        if (!Auth()->user()->hasRole('superadmin') || !Auth()->user()->hasRole('viloyat')){
            $dataCollections = DataCollection::query()->where('district_id', Auth()->user()->district_id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
            $district = District::find(Auth()->user()->district_id);
            return view('backend.admin.getData.dataResult', [
                'table' => $table,
                'district' => $district,
                'dataCollections' => $dataCollections
            ]);
        }
        return view('backend.admin.getData.data', [
            'table' => $table,
            'regions' => $regions
        ]);
    }

    public function getTableDataRegional(Region $region, Table $table)
    {
        if (!Auth()->user()->hasRole('superadmin') || !Auth()->user()->hasRole('viloyat')){
            $dataCollections = DataCollection::query()->where('district_id', Auth()->user()->district_id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
            $district = District::find(Auth()->user()->district_id);
            return view('backend.admin.getData.dataResult', [
                'table' => $table,
                'district' => $district,
                'dataCollections' => $dataCollections
            ]);
        }
        $districts = District::query()->where('region_id', $region->id)->orderBy('id')->get();
        return view('backend.admin.getData.dataRegional', [
            'table' => $table,
            'districts' => $districts,
        ]);
    }

    public function getTableDataResult(District $district, Table $table)
    {
        $dataCollections = DataCollection::query()->where('district_id', $district->id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
        $district = District::find($district->id);
        return view('backend.admin.getData.dataResult', [
            'table' => $table,
            'district' => $district,
            'dataCollections' => $dataCollections
        ]);
    }
}
