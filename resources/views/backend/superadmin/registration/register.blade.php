@extends('layouts.app', ['activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-lg-8 col-md-6 col-sm-8 ml-auto mr-auto">
          <form class="form" method="POST" action="{{ route('register.form') }}">
            @csrf

            <div class="card card-login card-hidden mb-3">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
                <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div>
              <div class="card-body ">
                <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
                <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
                  </div>
                  @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">email</i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                  </div>
                  @if ($errors->has('email'))
                    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('phone') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                    </div>
                    <input type="text" name="phone" class="form-control" placeholder="{{ __('Phone...') }}" value="{{ old('phone') }}" required>
                  </div>
                  @if ($errors->has('phone'))
                    <div id="email-error" class="error text-danger pl-3" for="phone" style="display: block;">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </div>
                  @endif
                </div>
                  <div class="bmd-form-group{{ $errors->has('regions') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                          <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">place</i>
                      </span>
                          </div>
                          <select name="regions" id="regions" class="form-control" required>
                              <option value="">--выберите регион--</option>
                              @foreach($regions as $region)
                                  <option value="{{ $region->id }}">{{ $region->name_uz }}</option>
                              @endforeach
                          </select>
                      </div>
                      @if ($errors->has('regions'))
                          <div id="regions-error" class="error text-danger pl-3" for="regions" style="display: block;">
                              <strong>{{ $errors->first('regions') }}</strong>
                          </div>
                      @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('districts') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">place</i>
                              </span>
                          </div>
                          <select name="districts" id="districts" class="form-control" required>
                              <option value="">--выберите район--</option>
                          </select>
                      </div>
                      @if ($errors->has('districts'))
                          <div id="districts-error" class="error text-danger pl-3" for="districts" style="display: block;">
                              <strong>{{ $errors->first('districts') }}</strong>
                          </div>
                      @endif
                  </div>
                <div class="bmd-form-group{{ $errors->has('roles') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                          <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">settings</i>
                      </span>
                          </div>
                          <select name="roles" id="roles" class="form-control" required>
                              <option value="">--выберите роль--</option>
                              @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      @if ($errors->has('roles'))
                          <div id="roles-error" class="error text-danger pl-3" for="roles" style="display: block;">
                              <strong>{{ $errors->first('roles') }}</strong>
                          </div>
                      @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('sectors') ? ' has-danger' : '' }} mt-3">
                      <div class="input-group">
                          <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">vertical_split</i>
                      </span>
                          </div>
                          <select name="sectors" id="sectors" class="form-control" required>
                              <option value="">--выберите сектор--</option>
                              @foreach(\App\User::sectors() as $key => $sector)
                                  <option value="{{ $key }}">{{ $sector }}</option>
                              @endforeach
                          </select>
                      </div>
                      @if ($errors->has('sectors'))
                          <div id="sectors-error" class="error text-danger pl-3" for="sectors" style="display: block;">
                              <strong>{{ $errors->first('sectors') }}</strong>
                          </div>
                      @endif
                  </div>
                <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
                  </div>
                  @if ($errors->has('password'))
                    <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="form-check mr-auto ml-3 mt-3">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                    {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
                  </label>
                </div>
              </div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@push('js')
    <script !src="">
        $('#regions').on('change', function () {
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
                    $('#districts').empty();
                    $.each(response, function (key, value) {
                        $('#districts')
                            .append($("<option></option>")
                                .attr("value",value.id)
                                .text(value.name_uz));
                    })
                }
            })
        })
    </script>
@endpush
@endsection
