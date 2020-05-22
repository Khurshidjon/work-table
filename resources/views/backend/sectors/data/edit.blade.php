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
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('data.list', [$table]) }}" class="btn btn-sm btn-info">{{ __('Вернуться в список') }}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('data.update', ['dataCollection' => $dataCollection, 'table' => $table]) }}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
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
                                                    <br>
                                                    <label style="color: black" for="title">Корхона, тадбиркор ёки фермер хўжаликлари номи (ҳомийлар) ва манзили</label>
                                                    <input type="text" id="company_name" class="form-control" required placeholder="Номи ва манзилини киритинг" name="company_name" value="{{ old('company_name', $dataCollection->title) }}">
                                                </div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 mt-2">
                                                            <h4 class="text-left my-5"><b>Ҳудуддаги камбағал оилалар, шундан:</b></h4>
                                                            <div class="form-group my-4">
                                                                <label for="unemployed_count">Ишсиз аъзоси бор оилалар</label>
                                                                <input type="text" id="unemployed_count" class="form-control" name="unemployed_count" value="{{ old('unemployed_count', $dataCollection->updatePoorFamily->unemployed_count) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="disable_people_count">Ногирон ва пенсионерлари бор оилалар</label>
                                                                <input type="text" id="disable_people_count" class="form-control" name="disable_people_count" value="{{ old('disable_people_count', $dataCollection->updatePoorFamily->disable_people_count) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="low_income_families_count">Кам таъминланган оилалар</label>
                                                                <input type="text" id="low_income_families_count" class="form-control" name="low_income_families_count" value="{{ old('low_income_families_count', $dataCollection->updatePoorFamily->low_income_families_count) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="large_families_count">Кўп болали оилалар</label>
                                                                <input type="text" id="large_families_count" class="form-control" name="large_families_count" value="{{ old('large_families_count', $dataCollection->updatePoorFamily->large_families_count) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="lost_breadwinner_count">Боқувчисини йўқотган (бева)лар</label>
                                                                <input type="text" id="lost_breadwinner_count" class="form-control" name="lost_breadwinner_count" value="{{ old('lost_breadwinner_count', $dataCollection->updatePoorFamily->lost_breadwinner_count) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <h4 class="text-left my-5"><b>Таъминот шакли</b></h4>
                                                            <div class="form-group my-4">
                                                                <label for="cash">Нақд пул кўринишида
                                                                    (сўм)</label>
                                                                <input type="text" id="cash" class="form-control" name="cash" value="{{ old('cash', $dataCollection->updateFormOfSupplies->cash) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="money_transfer">Пул ўтказиш йўли билан (сўм)</label>
                                                                <input type="text" id="money_transfer" class="form-control" name="money_transfer" value="{{ old('money_transfer', $dataCollection->updateFormOfSupplies->money_transfer) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="foods">Тўғридан-тўғри озиқ-овқат маҳсулотлари ёрдамида (сўм)</label>
                                                                <input type="text" id="foods" class="form-control" name="foods" value="{{ old('foods', $dataCollection->updateFormOfSupplies->foods) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="employment">Иш билан таъминлаш орқали (киши)</label>
                                                                <input type="text" id="employment" class="form-control" name="employment" value="{{ old('employment', $dataCollection->updateFormOfSupplies->employment) }}">
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="large_horned">Берилган чорва ва парранда бош сони (тури, миқдори)</label>
                                                                <div class="row">
                                                                    <div class="col-md-4 my-3">
                                                                        <input type="number" id="large_horned" class="form-control" name="large_horned" placeholder="йирик шохли" value="{{ old('large_horned', $dataCollection->updateFormOfSupplies->updateLivestockSupply->large_horned) }}">
                                                                    </div>
                                                                    <div class="col-md-4 my-3">
                                                                        <input type="number" id="small_horned" class="form-control" name="small_horned" placeholder="майда шохли" value="{{ old('small_horned', $dataCollection->updateFormOfSupplies->updateLivestockSupply->small_horned) }}">
                                                                    </div>
                                                                    <div class="col-md-4 my-3">
                                                                        <input type="number" id="birds" class="form-control" name="birds" placeholder="парранда" value="{{ old('birds', $dataCollection->updateFormOfSupplies->updateLivestockSupply->birds) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="agro_supplies">Такрорий экин, уруғлик, кўчат ва бошқа деҳқончилик масалалари ёрдамида (қиймати, тури, миқдори)</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="number" id="agro_sotix" class="form-control" name="agro_sotix" placeholder="сотих" value="{{ old('agro_sotix', $dataCollection->updateFormOfSupplies->updateAgroSupply->sotix) }}">
                                                                    </div>
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="number" id="agro_sum" class="form-control" name="agro_sum" placeholder="сўм" value="{{ old('agro_sum', $dataCollection->updateFormOfSupplies->updateAgroSupply->sum) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group my-4">
                                                                <label for="trainees_count">Касб-ҳунарга (тил) ўқитиш ёрдамида (киши, тури)</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="number" id="trainees_count" class="form-control" name="trainees_count" placeholder="trainees count" value="{{ old('trainees_count', $dataCollection->updateFormOfSupplies->updateProfession->trainees_count) }}">
                                                                    </div>
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="text" id="teach_type" class="form-control" name="teach_type" placeholder="teach_type" value="{{ old('teach_type', $dataCollection->updateFormOfSupplies->updateProfession->teach_type) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                     {{--       <div class="form-group my-4">
                                                                <label for="training">Касб-ҳунарга (тил) ўқитиш ёрдамида (киши, тури)</label>
                                                                <div class="row">
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="number" id="trainees_count" class="form-control" name="trainees_count" placeholder="Ўқитилаётганлар сони" value="{{ old('trainees_count', json_decode($dataCollection->updateFormOfSupplies->training)[0]->trainees_count) }}">
                                                                    </div>
                                                                    <div class="col-md-6 my-3">
                                                                        <input type="text" id="teach_type" class="form-control" name="teach_type" placeholder="касб ёки тил" value="{{ old('teach_type', json_decode($dataCollection->updateFormOfSupplies->training)[0]->teach_type) }}">
                                                                    </div>
                                                                </div>
                                                            </div>--}}
                                                        </div>
                                                    </div>
                                             {{--       <div class="form-group mt-5">
                                                        <br>
                                                        <label for="help_to_companies">Тадбиркорларга фаолиятини ривожлантириш учун керак бўладиган ресурслар</label>
                                                        <div class="row">
                                                            <div class="col-md-6 my-3">
                                                                <input type="number" id="help_title" class="form-control" name="help_title" placeholder="ресурс миқдори" value="{{ old('help_title') }}">
                                                            </div>
                                                            <div class="col-md-6 my-3">
                                                                <input type="text" id="help_type" class="form-control" name="help_type" placeholder="ресурс тури" value="{{ old('help_type') }}">
                                                            </div>
                                                        </div>
                                                    </div>--}}
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
