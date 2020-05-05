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
                        <th rowspan="2">ID</th>
                        <th rowspan="2">Вилоятлар</th>
                    </tr>
                </thead>
                  <tbody>
                  @foreach($regions as $region)
                      <tr>
                          <td>{{ $id++ }}</td>
                          <td><a href="{{ route('get-data-regional.index', [$region, $table]) }}">{{ $region->name_uz }}</a></td>
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
