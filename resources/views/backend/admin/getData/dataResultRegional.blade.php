@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
    <style>
        .vertical-rows  th {
            text-align:center;
            white-space:nowrap;
            transform-origin:50% 50%;
            transform: rotate(-90deg);

        }
        .vertical-rows  th:before {
            content:'';
            padding-top:5em;/* takes width as reference, + 10% for faking some extra padding */
            display:inline-block;
            vertical-align:middle;
        }
        /*.vertical-rows th{*/
        /*    width:50px;*/
        /*    vertical-align: bottom;*/
        /*}*/
        /*.vertical-rows th span {*/
        /*    writing-mode: sideways-lr; !* +90°: use 'tb-rl' *!*/
        /*    text-align: left;          !* +90°: use 'right' *!*/
        /*    padding:10px 5px 0;*/
        /*}*/
    </style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary text-center">
                <h3 class="card-title text-uppercase">{{ $region->name_uz }} аҳолисининг камбағал қатлами тўғрисида маълумотлар</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2">Т/р</th>
                                <th rowspan="2">Кўрсаткичлар номи</th>
                                <th rowspan="2">Ўлчов бирлиги</th>
                                <th rowspan="2">Вилоят бўйича жами</th>
                                <th colspan="4">шундан:</th>
                                <th rowspan="2">Туман бўйича жами</th>
                                <th colspan="4">шундан:</th>
                                <th rowspan="2">Маҳалла бўйича жами</th>
                                <th colspan="4">шундан:</th>
                            </tr>
                            <tr class="vertical-rows">
                                <th><span>1 - сектор</span></th>
                                <th><span>2 - сектор</span></th>
                                <th><span>3 - сектор</span></th>
                                <th><span>4 - сектор</span></th>
                                <th><span>1 - сектор</span></th>
                                <th><span>2 - сектор</span></th>
                                <th><span>3 - сектор</span></th>
                                <th><span>4 - сектор</span></th>
                                <th><span>1 - сектор</span></th>
                                <th><span>2 - сектор</span></th>
                                <th><span>3 - сектор</span></th>
                                <th><span>4 - сектор</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 0;
                                $idChild = 1;
                            @endphp
                            @forelse($indicators as $indicator)
                                <tr>
                                    <td>{{ ++$id }}</td>
                                    <td><strong>{{ $indicator->name_uz }}</strong></td>
                                    <td>{{ $indicator->units }}</td>
                                    @php
                                        $districtArr = \App\District::query()->select('id')->where('region_id', $region->id)->get()->toArray();
                                        $quarterArr = \App\Quarter::query()->select('id')->whereIn('district_id', $districtArr)->get()->toArray();
                                        //dd($quarterArr)
                                    @endphp
                                    <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('indicator_id', $indicator->id)->sum('value') }}</th>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 1)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 2)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 3)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 4)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('indicator_id', $indicator->id)->sum('value') }}</th>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 1)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 2)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 3)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 4)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('indicator_id', $indicator->id)->sum('value') }}</th>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 1)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 2)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 3)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                    <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 4)->where('indicator_id', $indicator->id)->sum('value') }}</td>
                                </tr>
                                @if($indicator->hasParent)
                                    <tr>
                                        <td></td>
                                        <td><i>шу жумладан:</i></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                @foreach($indicator->indicatorChildren as $indicatorChild)
                                    <tr>
                                        <td>{{ $id.'.'.$idChild++ }}</td>
                                        <td style="padding-left: 45px">{{ $indicatorChild->name_uz }}</td>
                                        <td>{{ $indicatorChild->units }}</td>
                                        <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('indicator_id', $indicatorChild->id)->sum('value') }}</th>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 1)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 2)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 3)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->where('sector_id', 4)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('indicator_id', $indicatorChild->id)->sum('value') }}</th>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 1)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 2)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 3)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->where('sector_id', 4)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <th>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('indicator_id', $indicatorChild->id)->sum('value') }}</th>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 1)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 2)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 3)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                        <td>{{ \App\DataPoorPopulation::query()->where('region_id', $region->id)->whereIn('district_id', $districtArr)->whereIn('mahalla_id', $quarterArr)->where('sector_id', 4)->where('indicator_id', $indicatorChild->id)->sum('value') }}</td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="24"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
