@extends('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Table List')])

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
                            <form action="{{ route('sections.update', [$item]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header card-header-tabs card-header-warning">
                                                <div class="nav-tabs-navigation">
                                                    <div class="nav-tabs-wrapper">
                                                        <span class="nav-tabs-title">Tables:</span>
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
                                                        <input type="text" class="form-control" placeholder="Section name UZB" name="name_uz" value="{{ old('name_uz', $item->name_uz) }}">
                                                    </div>
                                                    <div class="tab-pane" id="messages">
                                                        <input type="text" class="form-control" placeholder="Section name RUS" name="name_ru" value="{{ old('name_ru', $item->name_ru) }}">
                                                    </div>
                                                    <div class="tab-pane" id="settings">
                                                        <input type="text" class="form-control" placeholder="Section name ENG" name="name_en" value="{{ old('name_en', $item->name_en) }}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Colspan" name="colspan" value="{{ old('colspan', $item->colspan) }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Rowspan" name="rowspan" value="{{ old('rowspan', $item->rowspan) }}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Order" name="order" value="{{ old('order', $item->order) }}">
                                                </div>
                                                <div class="form-group">
                                                    <select name="table_id" class="form-control">
                                                        <option value="">--select table--</option>
                                                        @forelse($tables as $table)
                                                            <option value="{{ $table->id }}" {{ $item->table_id == $table->id ? 'selected':'' }}>{{ $table->name_uz }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="parent_id" class="form-control">
                                                        <option value="">--select parent--</option>
                                                        @forelse($sections as $section)
                                                            <option value="{{ $section->id }}" {{ $item->parent_id == $section->id ? 'selected':'' }}>{{ $section->name_uz }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="head_style" class="form-control">
                                                        <option value="">--select style--</option>
                                                        <option value="vertical" {{ $item->head_style=='vertical'?'selected':'' }}>Vertical</option>
                                                        <option value="horizontal" {{ $item->head_style=='horizontal'?'selected':'' }}>Horizontal</option>
                                                    </select>
                                                </div>
                                                <div class="form-check">
                                                    <div class="form-group">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="status" {{ $item->status == 1 ? 'checked' : '' }}>
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
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
