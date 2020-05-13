<?php

namespace App\Http\Controllers;

use App\AgroSupply;
use App\Data;
use App\DataCollection;
use App\DataPoorPopulation;
use App\District;
use App\FormOfSupply;
use App\HelpToCompany;
use App\Indicator;
use App\LivestockSupply;
use App\PoorFamily;
use App\Profession;
use App\Quarter;
use App\Region;
use App\Section;
use App\Table;
use App\UnitMeasurement;
use Facade\Ignition\Tabs\Tab;
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
        $tables = Table::all();
        return view('backend.sectors.index-table', [
            'tables' => $tables,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataList(Table $table)
    {
        if ($table->id == Table::TABLE_ONE){
            $dataRegion = DataCollection::query()->where('region_id', \Auth::user()->region_id)->where('district_id', \Auth::user()->district_id)->where('sector_id', \Auth::user()->sector_id)->latest()->paginate(20);
            return view('backend.sectors.data.index', [
                'dataRegion' => $dataRegion,
                'table' => $table
            ]);
        }else{
            $data = DataPoorPopulation::query()->latest()->paginate(20);
            return view('backend.sectors.poor-population.index', [
                'data' => $data,
                'table' => $table
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Table $table)
    {
        $regions = Region::all();
        return view('backend.sectors.data.create', [
            'regions' => $regions,
            'table' => $table
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
        $data_collection = new DataCollection();
        $data_collection->title = $request->company_name;
        $data_collection->user_id = \Auth::id();
        $data_collection->region_id = \Auth::user()->region_id;
        $data_collection->district_id = \Auth::user()->district_id;
        $data_collection->table_id = \Auth::user()->table_id;
        $data_collection->sector_id = \Auth::user()->sector_id;
        $data_collection->status = DataCollection::COLLECTION_STATUS_NEW;
        $data_collection->save();
//        Kam ta'minlanga oilalar
        $poor_families = new PoorFamily();
        $poor_families->unemployed_count = $request->unemployed_count;
        $poor_families->disable_people_count = $request->disable_people_count;
        $poor_families->low_income_families_count = $request->low_income_families_count;
        $poor_families->large_families_count = $request->large_families_count;
        $poor_families->lost_breadwinner_count = $request->lost_breadwinner_count;
        $poor_families->data_collection_id = $data_collection->id;
        $poor_families->save();

//        Taminot shakli

        $form_of_supply = new FormOfSupply();
        $form_of_supply->cash = $request->cash;
        $form_of_supply->money_transfer = $request->money_transfer;
        $form_of_supply->foods = $request->foods;
        $form_of_supply->employment = $request->employment;
        $form_of_supply->training = json_encode([
            'trainees_count' => $request->trainees_count,
            'teach_type' => $request->teach_type,
        ]);
        $form_of_supply->data_collection_id = $data_collection->id;

        if ($form_of_supply->save()){
//        Касб-ҳунарга (тил) ўқитиш ёрдамида (киши, тури)

            $profession = new Profession();
            $profession->trainees_count = $request->trainees_count;
            $profession->teach_type = $request->teach_type;
            $profession->form_of_supply_id = $form_of_supply->id;
            $profession->data_collection_id = $data_collection->id;
            $profession->save();

//        Chorva mollari bilan yordam

            $livestock_supply = new LivestockSupply();
            $livestock_supply->large_horned = $request->large_horned;
            $livestock_supply->small_horned = $request->small_horned;
            $livestock_supply->birds = $request->birds;
            $livestock_supply->form_of_supply_id = $form_of_supply->id;
            $livestock_supply->data_collection_id = $data_collection->id;
            $livestock_supply->save();

//        Agrar yordam

            $agro_supply = new AgroSupply();
            $agro_supply->sotix = $request->agro_sotix;
            $agro_supply->sum = $request->agro_sum;
            $agro_supply->form_of_supply_id = $form_of_supply->id;
            $agro_supply->data_collection_id = $data_collection->id;
            $agro_supply->save();

//            $help_to_company = new HelpToCompany();
//            $help_to_company->value = $request->help_title;
//            $help_to_company->type = $request->help_type;
//            $help_to_company->data_collection_id = $data_collection->id;
//            $help_to_company->save();
        }

        return redirect()->route('data.list', [$table])->with('success', 'Section has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function show(DataCollection $dataCollection, Table $table)
    {
        $regions = Region::all();
        $district = District::find($dataCollection->district_id);

        return view('backend.sectors.data.show', [
            'regions' => $regions,
            'dataCollection' => $dataCollection,
            'district' => $district,
            'table' => $table
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(DataCollection $dataCollection, Table $table)
    {
        $this->authorize('update', $dataCollection);
        $regions = Region::all();
        $district = District::find($dataCollection->district_id);

        return view('backend.sectors.data.edit', [
            'regions' => $regions,
            'dataCollection' => $dataCollection,
            'district' => $district,
            'table' => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataCollection $dataCollection, Table $table)
    {
        $this->authorize('update', $dataCollection);

        $dataCollection->title = $request->company_name;
        $dataCollection->user_id = \Auth::id();
        $dataCollection->region_id = \Auth::user()->region_id;
        $dataCollection->district_id = \Auth::user()->district_id;
        $dataCollection->table_id = \Auth::user()->table_id;
        $dataCollection->sector_id = \Auth::user()->sector_id;
        $dataCollection->status = DataCollection::COLLECTION_STATUS_NEW;
        $dataCollection->update();
//        Kam ta'minlanga oilalar
        $poor_families = $dataCollection->updatePoorFamily;

        $poor_families->unemployed_count = $request->unemployed_count;
        $poor_families->disable_people_count = $request->disable_people_count;
        $poor_families->low_income_families_count = $request->low_income_families_count;
        $poor_families->large_families_count = $request->large_families_count;
        $poor_families->lost_breadwinner_count = $request->lost_breadwinner_count;
        $poor_families->data_collection_id = $dataCollection->id;
        $poor_families->update();

//        Taminot shakli

        $form_of_supply = $dataCollection->updateFormOfSupplies;
        $form_of_supply->cash = $request->cash;
        $form_of_supply->money_transfer = $request->money_transfer;
        $form_of_supply->foods = $request->foods;
        $form_of_supply->employment = $request->employment;
        $form_of_supply->training = json_encode([
            'trainees_count' => $request->trainees_count,
            'teach_type' => $request->teach_type,
        ]);
        $form_of_supply->data_collection_id = $dataCollection->id;

        if ($form_of_supply->update()){
//        Chorva mollari bilan yordam

            $livestock_supply = $dataCollection->updateFormOfSupplies->updateLivestockSupply;
            $livestock_supply->large_horned = $request->large_horned;
            $livestock_supply->small_horned = $request->small_horned;
            $livestock_supply->birds = $request->birds;
            $livestock_supply->form_of_supply_id = $form_of_supply->id;
            $livestock_supply->data_collection_id = $dataCollection->id;
            $livestock_supply->update();

//        Agrar yordam

            $agro_supply = $dataCollection->updateFormOfSupplies->updateAgroSupply;
            $agro_supply->sotix = $request->agro_sotix;
            $agro_supply->sum = $request->agro_sum;
            $agro_supply->form_of_supply_id = $form_of_supply->id;
            $agro_supply->data_collection_id = $dataCollection->id;
            $agro_supply->update();
//        Agrar yordam

            $profession = $dataCollection->updateFormOfSupplies->updateProfession;
            $profession->trainees_count = $request->trainees_count;
            $profession->teach_type = $request->teach_type;
            $profession->form_of_supply_id = $form_of_supply->id;
            $profession->data_collection_id = $dataCollection->id;
            $profession->update();

//            $help_to_company = new HelpToCompany();
//            $help_to_company->value = $request->help_title;
//            $help_to_company->type = $request->help_type;
//            $help_to_company->data_collection_id = $dataCollection->id;
//            $help_to_company->update();
        }
        return redirect()->route('data.list', [$table])->with('success', 'Section has been updated successfully');
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
    public function confirm(DataCollection $dataCollection, Request $request, Table $table)
    {
//        dd($request->status);
        if ($request->status == 'published'){
            $dataCollection->status = DataCollection::COLLECTION_STATUS_MODERATED;
        }elseif($request->status == 'unpublished'){
            $dataCollection->status = DataCollection::COLLECTION_STATUS_CANCELLED;
        }
        $dataCollection->update();
        if ($request->currentPage){
            return redirect('data/index-list/'.$table->id.'?page='.$request->currentPage)->with('success', 'Section has been updated successfully');
        }else{
            return redirect()->route('data.index')->with('success', 'Section has been updated successfully');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function changeQuarter(Request $request)
    {
        $quarters = Quarter::where('district_id', $request->district_id)->get();
        return response()->json($quarters);
    }
}
