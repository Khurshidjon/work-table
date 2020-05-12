@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
                          @if ($errors->has('email'))
                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                          @endif
                      </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
                  <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" required />
                          @if ($errors->has('phone'))
                              <span id="phone-error" class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
                          @endif
                      </div>
                  </div>
                </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Region') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('region_id') ? ' has-danger' : '' }}">
                              <select name="region_id" id="region_id" class="form-control" required>
                                  <option value="">--выберите регион--</option>
                                  @foreach($regions as $region)
                                      <option value="{{ $region->id }}">{{ $region->name_uz }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('region_id'))
                                  <span id="region_id-error" class="error text-danger" for="region_id-name">{{ $errors->first('region_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('District') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('district_id') ? ' has-danger' : '' }}">
                              <select name="district_id" id="district_id" class="form-control" required>
                                  <option value="">--выберите район--</option>
                              </select>
                              @if ($errors->has('district_id'))
                                  <span id="district_id-error" class="error text-danger" for="district_id-name">{{ $errors->first('district_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Quarter') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('quarter_id') ? ' has-danger' : '' }}">
                              <select name="quarter_id" id="quarter_id" class="form-control" required>
                                  <option value="">--выберите район--</option>
                              </select>
                              @if ($errors->has('district_id'))
                                  <span id="quarter_id-error" class="error text-danger" for="quarter_id-name">{{ $errors->first('quarter_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Sector') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('sector_id') ? ' has-danger' : '' }}">
                              <select name="sector_id" id="sector_id" class="form-control" required>
                                  <option value="">--выберите сектор--</option>
                                  @foreach(\App\User::sectors() as $key => $sector)
                                      <option value="{{ $key }}">{{ $sector }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('sector_id'))
                                  <span id="sector_id-error" class="error text-danger" for="sector_id-name">{{ $errors->first('sector_id') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('roles') ? ' has-danger' : '' }}">
                              <select name="roles" id="roles" class="form-control" required>
                                  <option value="">--выберите роль--</option>
                                  @foreach($roles as $role)
                                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                                  @endforeach
                              </select>
                              @if ($errors->has('roles'))
                                  <span id="roles-error" class="error text-danger" for="roles-name">{{ $errors->first('roles') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" input type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @push('js')
      <script !src="">
          $('#region_id').on('change', function () {
              var optionSelected = $("option:selected", this);
              var valueSelected = this.value;
              // alert(valueSelected);
              $.ajax({
                  url: "{{ route('change-districts') }}",
                  type: 'GET',
                  data: {
                      region_id: valueSelected
                  },
                  success: function (response) {
                      console.log(response)
                      $('#district_id').empty();
                      $.each(response, function (key, value) {
                          $('#district_id')
                              .append($("<option></option>")
                                  .attr("value",value.id)
                                  .text(value.name_uz));
                      })
                  }
              });
          })

          $('#district_id').on('change', function () {
              var optionSelected = $("option:selected", this);
              var valueSelected = this.value;
              // alert(valueSelected);
              $.ajax({
                  url: "{{ route('change-quarter') }}",
                  type: 'GET',
                  data: {
                      district_id: valueSelected
                  },
                  success: function (response) {
                      console.log(response);
                      $('#quarter_id').empty();
                      $.each(response, function (key, value) {
                          $('#quarter_id')
                              .append($("<option></option>")
                                  .attr("value",value.id)
                                  .text(value.name_uz));
                      })
                  }
              });
          })

      </script>
  @endpush
@endsection
