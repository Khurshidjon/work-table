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
                                  <div class="form-group">
                                      <label style="color: black" for="regions">Viloyat</label>
                                      <select name="region_id" id="regions" class="form-control" required aria-required="true">
                                          <option value="">--select region--</option>
                                          @foreach($regions as $region)
                                              <option value="{{ $region->id }}">{{ $region->name_uz }}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label style="color: black" for="districts">Tuman</label>
                                      <select name="district_id" id="districts" class="form-control" required aria-required="true">
                                          <option value="">--select district--</option>
                                      </select>
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <br>
                                      <label style="color: black" for="title">Корхона, тадбиркор ёки фермер хўжаликлари номи (ҳомийлар) ва манзили</label>
                                      <input type="text" id="company_name" class="form-control" placeholder="Номи ва манзилини киритинг" name="company_name" value="{{ old('company_name') }}">
                                  </div>
                                  <div class="container-fluid">
                                      <div class="row">
                                          @foreach($sections as $section)
                                              <div class="col-12">
                                                  <h3><b>{{ $section->name_uz }}</b></h3>
                                              </div>
                                              @foreach($section->hasParent as $item)
                                                  <div class="col-md-12 mt-2">
                                                      <div class="form-group">
                                                          <br>
                                                          <label style="color: black" for="title">{{ $item->name_uz }}</label>
                                                          <input type="hidden" name="section_id" value="{{ $item->id }}">
                                                          <input type="text" id="value" class="form-control" placeholder="Қиймат киритинг" name="value[]" value="{{ old('value') }}">
                                                      </div>
                                                  </div>
                                              @endforeach
                                          @endforeach
                                      </div>
                                  </div>
                                  <div class="form-group mt-5">
                                      <br>
                                      <label style="color: black" for="title">Корхона, тадбиркор ёки фермер хўжаликлари номи (ҳомийлар) ва манзили</label>
                                      <input type="text" id="company_help" class="form-control" placeholder="Тури ва миқдорини киритинг" name="company_help" value="{{ old('company_help') }}">
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
