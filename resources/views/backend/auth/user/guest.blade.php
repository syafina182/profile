@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card" style="margin-top:30px; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);">
    <div class="card-body">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Guest Management
                </h4>
            </div><!--col-->

            <div class="col-sm-7 search">
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
                            <th>City</th>
                        </tr>
                        </thead>
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
    }
</style>
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script>
    var tableServer = $('#tableServer').DataTable({
        "bAutoWidth": false,
		"pageLength": 25,
        colReorder: true,
		dom: 'Brtip',
		"order": [[ 1, "asc" ]],
        responsive: true,
        "processing": true,
        "ajax": {
                    "url": "https://jsonplaceholder.typicode.com/users",
                    "type": "GET",
                    "dataSrc": "",
                },
        "columns": [
            { "defaultContent": "" },
            { "data": "name" },
            { "data": "username" },
            { "data": "email" },
            { "data": "address.city" },
        ]
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