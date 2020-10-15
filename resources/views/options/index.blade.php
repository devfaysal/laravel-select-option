@extends('laravel-admin::layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="card" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block d-flex">
                        <h4 class="title">Options</h4>
                        <a class="btn btn-success btn-oval btn-sm ml-auto" href="{{route('laravelSelectOption.create')}}">Create new</a>
                    </div>
                    <div class="row row-sm">
                        <div class="col-12 col-sm-12">
                            <table id="options-table" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="hide">#</th>
                                        <th>Select</th>
                                        <th>Value</th>
                                        <th>Display</th>
                                        <th>Status</th>
                                        <th class="hide">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
    $('#options-table').DataTable({
        order: [[ 0, "desc" ]],
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{route('laravelSelectOption.datatable')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'select', name: 'select'},
            {data: 'value', name: 'value'},
            {data: 'display', name: 'display'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
@endsection