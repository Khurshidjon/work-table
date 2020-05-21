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
                            <h4 class="card-title ">{{ __('Саҳоват ва кўмак') }}</h4>
                            <p class="card-category"> {{ __('Бу ерда сиз киритга маълумотларингизни бошқаришингиз мумкин') }}</p>
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
                        <a href="{{ route('data.create', [$table]) }}" class="btn btn-sm btn-success">{{ __('Янги қўшиш') }}</a>
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
                                    Корхона номи
                                </th>
                                <th>
                                    Вилоят
                                </th>
                                <th>
                                    Туман
                                </th>
                                <th>
                                    Ҳолат
                                </th>
                                <th class="text-center">
                                    Ҳаракатлар
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
                                    {{ $item->region->name_uz }}
                                </td>
                                <td>
                                    {{ $item->districts->name_uz }}
                                </td>
                                <td>
                                    @if($item->status == \App\DataCollection::COLLECTION_STATUS_NEW)
                                        <span class="badge badge-info">{{  \App\DataCollection::statusAttribute()[$item->status] }}</span>
                                    @elseif($item->status == \App\DataCollection::COLLECTION_STATUS_CANCELLED)
                                        <span class="badge badge-danger">{{  \App\DataCollection::statusAttribute()[$item->status] }}</span>
                                    @elseif($item->status == \App\DataCollection::COLLECTION_STATUS_MODERATED)
                                        <span class="badge badge-success">{{  \App\DataCollection::statusAttribute()[$item->status] }}</span>
                                    @endif
                                </td>
                                <td class="text-primary text-center">
                                    <a href="{{ route('data.show', ['dataCollection' => $item, 'table' => $table]) }}" type="button" rel="tooltip" title="Предварительный просмотр" class="btn btn-warning btn-link btn-sm">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    @if($item->user_id == Auth::user()->id)
                                    <a href="{{ route('data.edit', ['dataCollection' => $item, 'table' => $table]) }}" type="button" rel="tooltip" title="Редактировать" class="btn btn-primary btn-link btn-sm">
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
                                                <form action="{{ route('data.confirm', ['dataCollection' => $item, 'table' => $table]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="currentPage" value="{{ $dataRegion->currentPage()  }}">
                                                    <input type="hidden" name="status" value="unpublished">
                                                    <button type="submit" class="btn btn-sm btn-primary">Отменить публикацию</button>
                                                </form>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('data.confirm', ['dataCollection' => $item, 'table' => $table]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="currentPage" value="{{ $dataRegion->currentPage()  }}">
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
                                    Маълумот топилмади
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $dataRegion->links() }}
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
