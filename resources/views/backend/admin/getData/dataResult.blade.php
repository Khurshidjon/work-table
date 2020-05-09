@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card text-center">
          <div class="card-header card-header-primary">
              <h3 class="card-title ">{{ $table->name_uz }}</h3>
          </div>
                <div class="row justify-content-center mt-2">
                    <div class="col-10">
                        <div class="card-header card-header-tabs card-header-warning">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <b>{{ $district->region->name_uz . ', ' . $district->name_uz }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
{{--                  @php--}}
{{--                      $id = 1;--}}
{{--                  @endphp--}}
{{--                  <tr class="text-center">--}}
{{--                      <th rowspan="3">ID</th>--}}
{{--                      @foreach($sectionTop as $item)--}}
{{--                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">--}}
{{--                              {{ $item->name_uz }}--}}
{{--                          </th>--}}
{{--                      @endforeach--}}
{{--                  </tr>--}}
{{--                  <tr class="text-center">--}}
{{--                      @foreach($sectionBottom as $item)--}}
{{--                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">--}}
{{--                              {{ $item->name_uz }}--}}
{{--                          </th>--}}
{{--                      @endforeach--}}
{{--                  </tr>--}}
{{--                  <tr class="text-center">--}}
{{--                      @foreach($sectionBottom2 as $item)--}}
{{--                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">--}}
{{--                              {{ $item->name_uz }}--}}
{{--                          </th>--}}
{{--                      @endforeach--}}
{{--                  </tr>--}}
{{--                  </thead>--}}
                <thead>
                    <tr>
                        <th rowspan="3">Т/Р</th>
                        <th rowspan="3">Корхона, тадбиркор ёки фермер хўжаликлари номи  (ҳомийлар) ва манзили</th>
                        <th colspan="5">Ҳудуддаги камбағал оилалар, шундан</th>
                        <th colspan="10">Таъминот шакли</th>
{{--                        <th rowspan="3">Тадбиркорларга фаолиятини ривожлантириш учун керак бўладиган ресурслар</th>--}}
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
                    @forelse($dataCollections as $dataCollection)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{ $dataCollection->title }}</td>
                            @foreach($dataCollection->poorFamilies as $data)
                                <td>{{ $data->unemployed_count }}</td>
                                <td>{{ $data->disable_people_count }}</td>
                                <td>{{ $data->low_income_families_count }}</td>
                                <td>{{ $data->large_families_count }}</td>
                                <td>{{ $data->lost_breadwinner_count }}</td>
                            @endforeach
                            @foreach($dataCollection->formOfSupplies as $data)
                                <td>{{ $data->cash }}</td>
                                <td>{{ $data->money_transfer }}</td>
                                <td>{{ $data->foods }}</td>
                                <td>{{ $data->employment }}</td>
                                <td>
                                    @foreach(json_decode($data->training) as $employment)
                                            {{ $employment->trainees_count . ' киши, ' . $employment->teach_type }}
                                    @endforeach
                                </td>
                                @foreach($data->liveStockSupplies as $liveStock)
                                    <td>{{ $liveStock->large_horned }}</td>
                                    <td>{{ $liveStock->small_horned }}</td>
                                    <td>{{ $liveStock->birds }}</td>
                                @endforeach
                                @foreach($data->agroSupplies as $agroSupply)
                                    <td>{{ $agroSupply->sotix }}</td>
                                    <td>{{ $agroSupply->sum }}</td>
                                @endforeach
                            @endforeach
                            {{--@foreach($dataCollection->helpToCompanies as $helpToCompany)
                                <td>{{ $helpToCompany->value .' - '. $helpToCompany->type }}</td>
                            @endforeach--}}
                        </tr>
                    @empty
                        <tr>
                            <th colspan="17" class="text-center">
                                No records
                            </th>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
              {{ $dataCollections->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
