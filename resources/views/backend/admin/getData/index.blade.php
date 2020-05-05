@extends('layouts.app', ['activePage' => 'getData', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
          </div>
          <div class="card-body">
              <div class="container-fluid">
                  <div class="row justify-content-center text-center">
                      @forelse($tables as $table)
                          <div class="col-md-12">
                              <a href="{{ route('get-data.table', ['table' => $table]) }}" class="btn btn-warning">{{ $table->name_uz }}</a>
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
