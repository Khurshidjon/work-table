<?php

namespace App\Http\Controllers;

use App\Data;
use App\DataCollection;
use App\District;
use App\Indicator;
use App\Region;
use App\Section;
use App\Table;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function index()
    {
        $tables = Table::query()->where('status', Table::TABLE_STATUS_ACTIVE)->get();
        return view('backend.admin.getData.index', compact('tables'));
    }
    public function getTableData(Table $table)
    {
        if ($table->id == Table::TABLE_ONE){
            $regions = Region::query()->orderByDesc('id')->get();
            if (Auth()->user()->hasRole('superadmin') || Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('viloyat')){
                return view('backend.admin.getData.data', [
                    'table' => $table,
                    'regions' => $regions
                ]);
            }
            $dataCollections = DataCollection::query()->where('district_id', Auth()->user()->district_id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
            $district = District::find(Auth()->user()->district_id);
            return view('backend.admin.getData.dataResult', [
                'table' => $table,
                'district' => $district,
                'dataCollections' => $dataCollections
            ]);
        }elseif ($table->id == Table::TABLE_TWO){
            $regions = Region::query()->orderBy('id')->get();
            if (Auth()->user()->hasRole('superadmin') || Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('viloyat')){
                return view('backend.admin.getData.data', [
                    'table' => $table,
                    'regions' => $regions
                ]);
            }
        }
    }

    public function getTableDataRegional(Region $region, Table $table)
    {
        if ($table->id == Table::TABLE_ONE){
            if (Auth()->user()->hasRole('superadmin') || Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('viloyat')){
                $districts = District::query()->where('region_id', $region->id)->orderBy('id')->get();
                return view('backend.admin.getData.data-districts', [
                    'table' => $table,
                    'districts' => $districts,
                ]);
            }
            $dataCollections = DataCollection::query()->where('district_id', Auth()->user()->district_id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
            $district = District::find(Auth()->user()->district_id);
            return view('backend.admin.getData.dataResult', [
                'table' => $table,
                'district' => $district,
                'dataCollections' => $dataCollections
            ]);
        }elseif ($table->id == Table::TABLE_TWO){
            $indicators = Indicator::query()->where('status', 1)->where('parent_id', null)->get();
            return view('backend.admin.getData.dataResultRegional', [
                'table' => $table,
                'region' => $region,
                'indicators' => $indicators
            ]);
        }
    }

    public function getTableDataResult(District $district, Table $table)
    {
        if (Auth()->user()->hasRole('superadmin') || Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('viloyat')){
            $dataCollections = DataCollection::query()->where('district_id', $district->id)->where('status', DataCollection::COLLECTION_STATUS_MODERATED)->latest()->paginate(20);
            $district = District::find($district->id);
            return view('backend.admin.getData.dataResult', [
                'table' => $table,
                'district' => $district,
                'dataCollections' => $dataCollections
            ]);
        }
    }
}
