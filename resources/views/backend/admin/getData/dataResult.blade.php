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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                  @php
                      $id = 1;
                  @endphp
                  <tr class="text-center">
                      <th rowspan="3">ID</th>
                      @foreach($sectionTop as $item)
                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">
                              {{ $item->name_uz }}
                          </th>
                      @endforeach
                  </tr>
                  <tr class="text-center">
                      @foreach($sectionBottom as $item)
                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">
                              {{ $item->name_uz }}
                          </th>
                      @endforeach
                  </tr>
                  <tr class="text-center">
                      @foreach($sectionBottom2 as $item)
                          <th colspan="{{ $item->colspan }}" rowspan="{{ $item->rowspan }}">
                              {{ $item->name_uz }}
                          </th>
                      @endforeach
                  </tr>
                  </thead>
             {{--   <thead>
                    <tr>
                        <th rowspan="3">Т/Р</th>
                        <th rowspan="3">Корхона, тадбиркор ёки фермер хўжаликлари номи  (ҳомийлар) ва манзили</th>
                        <th colspan="5">Ҳудуддаги камбағал оилалар, шундан</th>
                        <th colspan="9">Таъминот шакли</th>
                        <th rowspan="3">Тадбиркорларга фаолиятини ривожлантириш учун керак бўладиган ресурслар</th>
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
                </thead>--}}
                <tbody>
                @php
                    $id = 1;
                @endphp
                    @foreach($dataCollections as $dataCollection)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{ $dataCollection->title }}</td>
                            @foreach($dataCollection->data as $data)
                                <td>{{ $data->value }}</td>
                            @endforeach
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
