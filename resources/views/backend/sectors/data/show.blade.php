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
                                <a href="{{ route('data.index') }}" class="btn btn-sm btn-info">{{ __('Вернуться в список') }}</a>
                            </div>
                        </div>
                        <div class="card-body">
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label style="color: black" for="regions">Вилоят</label>
                                                        <p>{{ $dataCollection->region->name_uz }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label style="color: black" for="districts">Туман</label>
                                                        <p>{{ $dataCollection->districts->name_uz }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <br>
                                                <label style="color: black" for="title">Корхона, тадбиркор ёки фермер хўжаликлари номи (ҳомийлар) ва манзили</label>
                                                <p>{{ $dataCollection->title }}</p>
                                                <hr>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <h4 class="text-left my-5"><b>Ҳудуддаги камбағал оилалар, шундан:</b></h4>
                                                        <div class="form-group my-4">
                                                            <label for="unemployed_count">Ишсиз аъзоси бор оилалар</label>
                                                            <p>{{ $dataCollection->updatePoorFamily->unemployed_count }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="disable_people_count">Ногирон ва пенсионерлари бор оилалар</label>
                                                            <p>{{ $dataCollection->updatePoorFamily->disable_people_count }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="low_income_families_count">Кам таъминланган оилалар</label>
                                                            <p>{{ $dataCollection->updatePoorFamily->low_income_families_count }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="large_families_count">Кўп болали оилалар</label>
                                                            <p>{{ $dataCollection->updatePoorFamily->large_families_count }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="lost_breadwinner_count">Боқувчисини йўқотган (бева)лар</label>
                                                            <p>{{ $dataCollection->updatePoorFamily->lost_breadwinner_count }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-2">
                                                        <h4 class="text-left my-5"><b>Таъминот шакли</b></h4>
                                                        <div class="form-group my-4">
                                                            <label for="cash">Нақд пул кўринишида
                                                                (сўм)</label>
                                                            <p>{{ $dataCollection->updateFormOfSupplies->cash }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="money_transfer">Пул ўтказиш йўли билан (сўм)</label>
                                                            <p>{{ $dataCollection->updateFormOfSupplies->money_transfer }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="foods">Тўғридан-тўғри озиқ-овқат маҳсулотлари ёрдамида (сўм)</label>
                                                            <p>{{ $dataCollection->updateFormOfSupplies->foods }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="employment">Иш билан таъминлаш орқали (киши)</label>
                                                            <p>{{ $dataCollection->updateFormOfSupplies->employment }}</p>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="large_horned">Берилган чорва ва парранда бош сони (тури, миқдори)</label>
                                                            <div class="row">
                                                                <div class="col-md-4 my-3">
                                                                    <label for="">Йирик шохли</label>
                                                                    <p>{{ $dataCollection->updateFormOfSupplies->updateLivestockSupply->large_horned }}</p>
                                                                </div>
                                                                <div class="col-md-4 my-3">
                                                                    <label for="">Майда шохли</label>
                                                                    <p>{{ $dataCollection->updateFormOfSupplies->updateLivestockSupply->small_horned }}</p>
                                                                </div>
                                                                <div class="col-md-4 my-3">
                                                                    <label for="">Парранда</label>
                                                                    <p>{{ $dataCollection->updateFormOfSupplies->updateLivestockSupply->birds }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="agro_supplies">Такрорий экин, уруғлик, кўчат ва бошқа деҳқончилик масалалари ёрдамида (қиймати, тури, миқдори)</label>
                                                            <div class="row">
                                                                <div class="col-md-6 my-3">
                                                                    <label for="">сотих</label>
                                                                    <p>{{ $dataCollection->updateFormOfSupplies->updateAgroSupply->sotix }}</p>
                                                                </div>
                                                                <div class="col-md-6 my-3">
                                                                    <label for="">сўм</label>
                                                                    <p>{{ $dataCollection->updateFormOfSupplies->updateAgroSupply->sum }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group my-4">
                                                            <label for="training">Касб-ҳунарга (тил) ўқитиш ёрдамида (киши, тури)</label>
                                                            <div class="row">
                                                                <div class="col-md-6 my-3">
                                                                    <label for="">Ўқитилаётганлар сони</label>
                                                                    <p>{{ json_decode($dataCollection->updateFormOfSupplies->training)[0]->trainees_count }}</p>
                                                                </div>
                                                                <div class="col-md-6 my-3">
                                                                    <label for="">Касб ёки тил</label>
                                                                    <p>{{ json_decode($dataCollection->updateFormOfSupplies->training)[0]->teach_type }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @can('ruhsat berish')
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <form action="{{ route('data.confirm', ['dataCollection' => $dataCollection]) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="unpublished">
                                                                <button type="submit" class="btn btn-primary">Отменить публикацию</button>
                                                            </form>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form action="{{ route('data.confirm', ['dataCollection' => $dataCollection]) }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="published">
                                                                <button type="submit" class="btn btn-primary">Публиковать</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                @endcan
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
