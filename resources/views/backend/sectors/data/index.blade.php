@extends('layouts.app', ['activePage' => 'data', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">DATA:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">code</i>  Вилоят
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">code</i> Саховат
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <a href="{{ route('data.create',['type' => 'region']) }}" class="btn btn-warning">Вилоят</a>
                            <table class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Value
                                    </th>
                                    <th>
                                        Region
                                    </th>
                                    <th>
                                        District
                                    </th>
                                    <th>
                                        Section
                                    </th>
                                    <th>
                                        Indicator
                                    </th>
                                    <th>
                                        Indicator
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse($dataRegion as $item)
                                    <tr>
                                        <td>
                                            {{ $id++ }}
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
{{--                                            {{ $item->value }}--}}
                                        </td>
                                        <td>
                                            {{ $item->region_id }}
                                        </td>
                                        <td>
                                            {{ $item->district_id }}
                                        </td>
                                        <td>
{{--                                            {{ $item->section_id }}--}}
                                        </td>
                                        <td>
{{--                                            {{ $item->indicator_id }}--}}
                                        </td>
                                        <td class="text-primary">
                                            {{ $item->status }}
                                        </td>
                                        <td class="text-primary text-center">
                                            <a href="{{ route('data.edit', ['data' => $item, 'type' => 'region']) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No records
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <a href="{{ route('data.create',['type' => 'sahovat']) }}" class="btn btn-warning">Саховат</a>
                            <table class="table">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Region
                                    </th>
                                    <th>
                                        District
                                    </th>
                                    <th>
                                        Section
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @forelse($dataSahovat as $item)
                                    <tr>
                                        <td>
                                            {{ $id++ }}
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            {{ $item->name_ru }}
                                        </td>
                                        <td>
                                            {{ $item->name_en }}
                                        </td>
                                        <td class="text-primary">
                                            {{ $item->status }}
                                        </td>
                                        <td class="text-primary text-center">
                                            <a href="{{ route('data.edit', ['data' => $item, 'type' => 'sahovat']) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No records
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
