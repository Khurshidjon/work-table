@extends('layouts.app', ['activePage' => 'data', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, vitae.</p>
          </div>
          <div class="card-body">
              <form action="{{ route('unit-measurement.store') }}" method="post">
                  @csrf
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="card">
                              <div class="card-header card-header-tabs card-header-warning">
                                  <div class="nav-tabs-navigation">
                                      <div class="nav-tabs-wrapper">
                                          <span class="nav-tabs-title">Unit measurement:</span>
                                          <ul class="nav nav-tabs" data-tabs="tabs">
                                              <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" data-toggle="tab">
                                                      <i class="material-icons">code</i> UZB
                                                      <div class="ripple-container"></div>
                                                  </a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" href="#messages" data-toggle="tab">
                                                      <i class="material-icons">code</i> RUS
                                                      <div class="ripple-container"></div>
                                                  </a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" href="#settings" data-toggle="tab">
                                                      <i class="material-icons">code</i> ENG
                                                      <div class="ripple-container"></div>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <br>
                                  <div class="tab-content">
                                      <div class="tab-pane active" id="profile">
                                          <input type="text" class="form-control" placeholder="Section name UZB" name="name_uz" value="{{ old('name_uz') }}">
                                      </div>
                                      <div class="tab-pane" id="messages">
                                          <input type="text" class="form-control" placeholder="Section name RUS" name="name_ru" value="{{ old('name_ru') }}">
                                      </div>
                                      <div class="tab-pane" id="settings">
                                          <input type="text" class="form-control" placeholder="Section name ENG" name="name_en" value="{{ old('name_en') }}">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <div class="form-check">
                                          <div class="form-group">
                                              <label class="form-check-label">
                                                  <input class="form-check-input" type="checkbox" name="status" {{ old('status') == 'on'? 'checked':'' }}>
                                                  Status (published)
                                                  <span class="form-check-sign">
                                                <span class="check"></span>
                                              </span>
                                              </label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Отправить</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
