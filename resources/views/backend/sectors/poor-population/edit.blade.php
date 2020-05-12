@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('data-poor-population.update', ['dataPoorPopulation' => $dataPoorPopulation, 'table' => $table]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

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
                              <select class="form-control{{ $errors->has('indicator_id') ? ' is-invalid' : '' }}" name="indicator_id" id="input-indicator_id" required >
                                  <option value="">-- выберите показатель --</option>
                                  @foreach($indicators as $indicator)
                                      <option value="{{ $indicator ->id}}" {{ $indicator->hasParent?'disabled':'' }} {{ $indicator->id == $dataPoorPopulation->indicator_id ? 'selected' : '' }}>{{ $indicator->name_uz }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('indicator_id'))
                                  <span id="indicator_id-error" class="error text-danger" for="input-indicator_id">{{ $errors->first('indicator_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Value') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" name="value" id="input-name" type="text" placeholder="{{ __('Value') }}" value="{{ old('value', $dataPoorPopulation->value) }}" required="true" aria-required="true"/>
                      @if ($errors->has('value'))
                        <span id="name-error" class="error text-danger" for="input-value">{{ $errors->first('value') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Единица измерения') }}</label>
                  <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('unit_id') ? ' has-danger' : '' }}">
                          <select class="form-control{{ $errors->has('unit_id') ? ' is-invalid' : '' }}" name="unit_id" id="input-unit_id" required >
                            <option value="">-- выберите показатель --</option>
                              @foreach($units as $unit)
                                  <option value="{{ $unit ->id}}" {{ $unit->id == $dataPoorPopulation->unit_id ? 'selected' : '' }}>{{ $unit->name_uz }}</option>
                              @endforeach
                          </select>
                          @if ($errors->has('unit_id'))
                              <span id="unit_id-error" class="error text-danger" for="input-unit_id">{{ $errors->first('unit_id') }}</span>
                          @endif
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Отправить') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
