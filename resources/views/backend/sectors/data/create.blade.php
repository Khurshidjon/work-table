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
              <form action="{{ route('data.submit', ['type' => $type]) }}" method="post" autocomplete="off">
                  @csrf
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="card">
                              <div class="card-header card-header-tabs card-header-warning">
                                  <div class="nav-tabs-navigation">
                                      <div class="nav-tabs-wrapper">
                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, repudiandae.
                                      </div>
                                  </div>
                              </div>
                              <div class="card-body">
                                  <br>
                                  @if($type == 'sahovat')
                                  <div class="form-group">
                                      <label for="indicator_id">Ko'rsatkichlar nomi</label>
                                      <select name="indicator_id" id="indicator_id" class="form-control">
                                          <option value="">--select indicator--</option>
                                          @foreach($indicators as $indicator)
                                              <option value="{{ $indicator->id }}">{{ $indicator->name_uz }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  @elseif($type == 'region')
                                      <div class="form-group">
                                          <label for="regions">Viloyat</label>
                                          <select name="region_id" id="regions" class="form-control" required aria-required="true">
                                              <option value="">--select region--</option>
                                              @foreach($regions as $region)
                                                  <option value="{{ $region->id }}">{{ $region->name_uz }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label for="districts">Tuman</label>
                                          <select name="district_id" id="districts" class="form-control" required aria-required="true">
                                              <option value="">--select district--</option>
                                          </select>
                                      </div>
                                  @endif
                                  <div class="form-group">
                                      <label for="section">Kerakli ustun</label>
                                      <select name="section_id" class="form-control">
                                          <option value="">--select section--</option>
                                          @foreach($sections as $section)
                                              <option value="{{ $section->id }}">{{ $section->name_uz }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                 <div class="row">
                                     <div class="col-md-6 mt-2">
                                         <div class="form-group">
                                             <br>
                                             <label for="title">Qiymat</label>
                                             <input type="text" id="title" class="form-control" placeholder="Titile" name="title" value="{{ old('title') }}">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="unit_id">O'lchov birligi</label>
                                             <select name="unit_id" id="unit_id" class="form-control">
                                                 <option value="">--select unit--</option>
                                                 @foreach($units as $unit)
                                                     <option value="{{ $unit->id }}" {{ $unit->id == old('unit_id')  ? 'selected' : '' }}>{{ $unit->name_uz }}</option>
                                                 @endforeach
                                             </select>
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
