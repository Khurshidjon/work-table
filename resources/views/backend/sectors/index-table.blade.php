@extends('layouts.app', ['activePage' => 'data', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                      <h4 class="card-title ">{{ __('Саҳоват ва кўмак') }}</h4>
                      <p class="card-category"> {{ __('Бу ерда сиз керкли жадвални танлашингиз мумкин') }}</p>
                  </div>
              </div>
          </div>
          <div class="card-body">
              <div class="container-fluid">
                  <div class="row justify-content-center">
                      @forelse($tables as $table)
                          <div class="col-md-12">
                              <a href="{{ route('data.list', ['table' => $table]) }}" class="btn btn-info btn-lg">{{ $table->name_uz }}</a>
                          </div>
                      @empty
                          <h2>Table not here</h2>
                      @endforelse
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
