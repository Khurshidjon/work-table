@extends('layouts.app', ['activePage' => 'indicators', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"><a href="{{ route('indicators.create') }}" class="btn btn-outline-warning">Create</a></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Indicator name uz
                    </th>
                    <th>
                        Indicator name ru
                    </th>
                    <th>
                        Indicator name en
                    </th>
                    <th>
                        Parent Id
                    </th>
                    <th>
                        Status
                    </th>
                    <th class="text-center">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @php
                    $id = 1;
                @endphp
                  @forelse($indicators as $item)
                      <tr>
                          <td>
                             {{ $id++ }}
                          </td>
                          <td>
                             {{ $item->name_uz }}
                          </td>
                          <td>
                              {{ $item->name_ru }}
                          </td>
                          <td>
                              {{ $item->name_en }}
                          </td>
                          <td class="text-primary">
                              {{ $item->parent_id }}
                          </td>
                          <td class="text-primary">
                              {{ $item->status }}
                          </td>
                          <td class="text-primary text-center">
                              <a href="{{ route('indicators.edit', [$item]) }}" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                              </a>
                              <a type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                              </a>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="6" class="text-center">
                              No records
                          </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
