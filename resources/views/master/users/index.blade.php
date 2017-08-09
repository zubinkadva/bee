@extends('include.base_layout')

@section('title') Users @endsection

@section('header') <h1> Users </h1> @endsection

@section('breadcrumbs')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home fa-fw home-icon"></i>
            <a href="{{url('/')}}">Home</a>
        </li>
        <li class="active">User Master</li>
    </ul>
@endsection

@section('stylesheets') @endsection

@section('javascripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootbox.js') }}"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            var body = $('body');
            var myTable =
                $('#user-master-table')
                    .DataTable({
                        bAutoWidth: false,
                        columns: [
                            {orderable: false},
                            {orderable: false},
                            null,
                            null,
                            null,
                            null,
                            {orderable: false}
                        ],
                        order: [],
                        processing: true,
                        serverSide: true,
                        ajax: "{{url('master/users/datatables')}}"
                    });

            $(".group-checkable").click(function () {
                $('.checkboxes').prop('checked', this.checked);
            });

            myTable.on('change', 'input[class="ace ace-switch ace-switch-6"]', function () {
                var user_id = $(this).attr('data-id');
                var url = '{{ url('master/users/toggle/idx') }}';
                url = url.replace('idx', user_id);
                $.ajax({
                    url: url,
                    data: {'id': user_id},
                    success: function (data) {
                        // the active status was toggled successfully
                    },
                    error: function (data) {
                        bootbox.alert("Error changing active status.");
                    }
                });
            });

            body.on('click', '.btn-delete', function (e) {
                var user_id = $(this).attr('data-id');
                var url = '{{ url('master/users/delete/idx') }}';
                url = url.replace('idx', user_id);

                bootbox.confirm("Are you sure?", function (result) {
                    if (result) window.location.href = url;
                });
            });

            body.on('click', '.btn-delete-all', function (e) {
                if ($('.checkboxes').is(':checked')) {
                    bootbox.confirm("Are you sure?", function (result) {
                        if (result) {
                            var dash = $('#dashboard-form');
                            dash.prop('action', "{{url('master/users/deleteAll')}}");
                            dash.submit();
                        }
                    });
                } else {
                    bootbox.alert('Select some records first!!');
                }
            });

        });
    </script>
@endsection

@section('body')
    <p>
        <a href="{{url('master/users/add')}}" class="btn btn-info btn-sm">
            <i class="ace-icon fa fa-plus fa-fw"></i> Add user
        </a>
        <a class="btn btn-danger btn-sm btn-delete-all">
            <i class="ace-icon fa fa-trash-o fa-fw"></i> Delete multiple
        </a>
    </p>

    <form id="dashboard-form" name="dashboard-form" class="form-horizontal" role="form" method="post">
        {{csrf_field()}}
        <table id="user-master-table" class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace group-checkable"/>
                        <span class="lbl"></span>
                    </label>
                </th>
                <th>Avatar</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Active?</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            </tbody>
        </table>
    </form>

@endsection