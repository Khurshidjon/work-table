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
                            <h4 class="card-title ">{{ __('Users') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage users') }}</p>
                        </div>
                    </div>
                </div>
                @if (session('status'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('status') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('data.poor-population', [$table]) }}" class="btn btn-sm btn-success">{{ __('Добавить новый') }}</a>
                    </div>
                </div>
                <div class="card-body">
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
                                    Status
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
                        @forelse($data as $item)
                            <tr>
                                <td>
                                    {{ $id++ }}
                                </td>
                                <td>
                                    {{ $item->value }}
                                </td>
                                <td>
                                    {{ $item->region->name_uz }}
                                </td>
                                <td>
                                    {{ $item->districts->name_uz }}
                                </td>
                                <td>
                                    @if($item->status == \App\DataPoorPopulation::STATUS_NEW)
                                        <span class="badge badge-info">{{  \App\DataPoorPopulation::statusAttribute()[$item->status] }}</span>
                                    @elseif($item->status == \App\DataPoorPopulation::STATUS_CANCELLED)
                                        <span class="badge badge-danger">{{  \App\DataPoorPopulation::statusAttribute()[$item->status] }}</span>
                                    @elseif($item->status == \App\DataPoorPopulation::STATUS_MODERATED)
                                        <span class="badge badge-success">{{  \App\DataPoorPopulation::statusAttribute()[$item->status] }}</span>
                                    @endif
                                </td>
                                <td class="text-primary text-center">
                                    <a href="{{ route('data-poor-population.show', ['dataPoorPopulation' => $item, 'table' => $table]) }}" type="button" rel="tooltip" title="Предварительный просмотр" class="btn btn-warning btn-link btn-sm">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    @if($item->user_id == Auth::user()->id)
                                    <a href="{{ route('data-poor-population.edit', ['dataPoorPopulation' => $item, 'table' => $table]) }}" type="button" rel="tooltip" title="Редактировать" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    @endif
                                   @can('tozalash huquqi')
                                        <a type="button" rel="tooltip" title="Удалить" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </a>
                                    @endcan
                                    @can('ruhsat berish')
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <form action="{{ route('data-poor-population.confirm', ['dataPoorPopulation' => $item, 'table' => $table]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="currentPage" value="{{ $data->currentPage()  }}">
                                                    <input type="hidden" name="status" value="unpublished">
                                                    <button type="submit" class="btn btn-sm btn-primary">Отменить публикацию</button>
                                                </form>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('data-poor-population.confirm', ['dataPoorPopulation' => $item, 'table' => $table]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="currentPage" value="{{ $data->currentPage()  }}">
                                                    <input type="hidden" name="status" value="published">
                                                    <button type="submit" class="btn btn-sm btn-primary">Публиковать</button>
                                                </form>
                                            </li>
                                        </ul>
                                    @endcan
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
                {{ $data->links() }}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
