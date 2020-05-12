@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <h3 class="card-title">{{ $table->name_uz }}</h3>
          </div>
          <div class="card-body">
            <div>
              <ul class="list-inline">
              @foreach($districts as $district)
                      <li class="list-inline-item"><a class="btn btn-info font-weight-bold btn-lg" href="{{ route('get-data-result.index', [$district, $table]) }}">{{ $district->name_uz }}</a></li>
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
