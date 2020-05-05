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
                <tbody>
                   {{-- <!--@foreach($data as $key => $value)
                        <tr>
                            <td>{{ $id++ }}</td>
                            @foreach($cols as $key => $data)
                                <td>
                                @if($value->section_id == $data->id)
                                        @foreach($data->data as $item)
                                            <p> {{ $item->title }}</p>
                                        @endforeach
                               @endif
                                </td>
                            @endforeach
                        </tr> boldi
                    @endforeach-->--}}
                            @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$value}}</td>
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
