@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h3 class="card-title ">{{ $table->name_uz }}</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <ul class="list-inline">
              @foreach($regions as $region)
                  <li class="list-inline-item"><a class="btn btn-lg font-weight-bold btn-info" href="{{ route('get-data-regional.index', [$region, $table]) }}">{{ $region->name_uz }}</a></li>
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
