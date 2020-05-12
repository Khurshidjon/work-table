@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
    @php
        use App\DataCollection;
    @endphp
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
                      @foreach($regions as $region)
                          <tr>
                              <td>{{ $id++ }}</td>
                              <td><a class="font-weight-bold" href="{{ route('get-data-regional.index', [$region, $table]) }}">{{ $region->name_uz }}</a></td>
                              <td>{{ \App\DataCollection::query()->where('region_id', $region->id)->first()->poorFamilies->sum('id') }}</td>
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
