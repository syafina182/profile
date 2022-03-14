@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card" style="margin-top:30px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                    @include('backend.auth.user.includes.header-buttons')
                    <div class="pull-right" style="float: right; margin-right: 2%;">
                        <div>
                            <input type="text" id="searchServer" class="form-control pull-right"
                                placeholder="Search">
                        </div>
                    </div>

            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-striped demo-table-dynamic table-responsive-block dataTable no-footer"
                                id="tableServer">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Mobile Number</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td class="btn-td">@include('backend.auth.user.includes.actions', ['user' => $user])</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
@section('page-js-script')
<style>
    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 768px) {
        .form-control {
            margin-top: 30px !important;
        }

        .ml-1 {
            margin-top: 30px !important;
        }
    }
</style>
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/colReorder.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.dataTables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script>
    var tableServer = $('#tableServer').DataTable({
        "bAutoWidth": false,
		"pageLength": 25,
        colReorder: true,
		dom: 'Brtip',
        responsive: true,
		"order": [[ 1, "asc" ]]
    });
	$('#searchServer').keyup(function () {
		tableServer
		.search($(this).val()).
		draw();
	});

	$(document).ready(function () {
        tableServer.on('order.dt search.dt', function () {
            tableServer.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
            tableServer.cell(cell).invalidate('dom');
            });
        }).draw();
	});

</script>
@stop
