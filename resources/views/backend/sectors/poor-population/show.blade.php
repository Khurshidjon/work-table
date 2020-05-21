@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Value') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('data.list', [$table]) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Показатель') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('indicator_id') ? ' has-danger' : '' }}">
                                        <span>{{ $dataPoorPopulation->indicator->name_uz }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Value') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                                        <span>{{ $dataPoorPopulation->value }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Единица измерения') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <span>{{ $dataPoorPopulation->units->name_uz }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Область') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <span>{{ $dataPoorPopulation->region->name_uz }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Район') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <span>{{ $dataPoorPopulation->districts->name_uz }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Автор') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <span>{{ $dataPoorPopulation->author->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Статус') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <span>{{ \App\DataPoorPopulation::statusAttribute()[$dataPoorPopulation->status] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
