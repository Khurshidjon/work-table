@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
    @php
        use App\DataCollection;
    @endphp
    <style>
        .table-row td{
            text-align: center;
            text-transform: uppercase !important;
        }
    </style>
    <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header  text-center card-header-primary">
            <h3 class="card-title ">{{ $table->name_uz }}</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                  <thead  class="text-center">
                      <tr>
                          <th rowspan="3">Т/Р</th>
                          <th rowspan="3">Худуд номлари</th>
                          <th colspan="5">Ҳудуддаги камбағал оилалар, шундан</th>
                          <th colspan="10">Таъминот шакли</th>
                      </tr>
                      <tr>
                          <th rowspan="2">Ишсиз аъзоси бор оилалар</th>
                          <th rowspan="2">Ногирон ва пенсионерлари бор оилалар</th>
                          <th rowspan="2">Кам таъминланган оилалар</th>
                          <th rowspan="2">Кўп болали оилалар</th>
                          <th rowspan="2">Боқувчисини йўқотган (бева)лар</th>
                          <th rowspan="2">Нақд пул кўринишида <br>(сўм)</th>
                          <th rowspan="2">Пул ўтказиш йўли билан (сўм)</th>
                          <th rowspan="2">Тўғридан-тўғри озиқ-овқат маҳсулотлари ёрдамида (сўм)</th>
                          <th rowspan="2">Иш билан таъминлаш орқали (киши)</th>
                          <th rowspan="2">Касб-ҳунарга (тил) ўқитиш ёрдамида (киши, тури)</th>
                          <th colspan="3">Берилган чорва ва парранда бош сони (тури, миқдори)</th>
                          <th colspan="2">Такрорий экин, уруғлик, кўчат ва бошқа деҳқончилик масалалари ёрдамида (қиймати, тури, миқдори)</th>
                      </tr>
                      <tr>
                          <th>йирик шохли</th>
                          <th>майда шохли</th>
                          <th>парранда</th>
                          <th>сотих</th>
                          <th>сўм</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php
                        $id = 1;
                      @endphp
                      @foreach($regions as $region)
                          @php
                            $dataCollection = \App\DataCollection::query()->where('region_id', $region->id)->select('id')->get()->toArray();
                            $poor_families = \App\PoorFamily::query()->whereIn('data_collection_id', $dataCollection);
                            $form_of_supply = \App\FormOfSupply::query()->whereIn('data_collection_id', $dataCollection);
                            $forLiveStock = $form_of_supply->select('id')->get()->toArray();
                            $liveStock = \App\LivestockSupply::query()->whereIn('form_of_supply_id', $forLiveStock);
                            $agroSupply = \App\AgroSupply::query()->whereIn('form_of_supply_id', $forLiveStock);
                            $profession = \App\Profession::query()->whereIn('form_of_supply_id', $forLiveStock);
                          @endphp
                          <tr class="table-row">
                              <td>{{ $id++ }}</td>
                              <th><a class="font-weight-bold" href="{{ route('get-data-regional.index', [$region, $table]) }}">{{ $region->name_uz }}</a></th>
                              <td>{{ $poor_families->sum('unemployed_count') }}</td>
                              <td>{{ $poor_families->sum('disable_people_count') }}</td>
                              <td>{{ $poor_families->sum('low_income_families_count') }}</td>
                              <td>{{ $poor_families->sum('large_families_count') }}</td>
                              <td>{{ $poor_families->sum('lost_breadwinner_count') }}</td>
                              <td>{{ $form_of_supply->sum('cash') }}</td>
                              <td>{{ $form_of_supply->sum('money_transfer') }}</td>
                              <td>{{ $form_of_supply->sum('foods') }}</td>
                              <td>{{ $form_of_supply->sum('employment') }}</td>
                              <td>
                                    {{ $profession->sum('trainees_count') }}
                              </td>
                              <td>{{ $liveStock->sum('large_horned') }}</td>
                              <td>{{ $liveStock->sum('small_horned') }}</td>
                              <td>{{ $liveStock->sum('birds') }}</td>
                              <td>{{ $agroSupply->sum('sotix') }}</td>
                              <td>{{ $agroSupply->sum('sum') }}</td>
                          </tr>
                      @endforeach
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
