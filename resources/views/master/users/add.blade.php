@extends('include.base_layout')

@section('title') Add user @endsection

@section('header') <h1> New user </h1> @endsection

@section('breadcrumbs')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home fa-fw home-icon"></i>
            <a href="{{url('/')}}">Home</a>
        </li>
        <li>
            <i class="ace-icon fa fa-users fa-fw"></i>
            <a href="{{url('master/users')}}">Users</a>
        </li>
        <li class="active">Add user</li>
    </ul>
@endsection

@section('javascripts')
    <script src="{{ asset('assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $('#add-form').validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                ignore: "",
                rules: {
                    first: {
                        required: true
                    },
                    last: {
                        required: true
                    },
                    _username: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },

                messages: {},

                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

                success: function (e) {
                    if (!$(e).closest('.form-group').is('.username-group')) {
                        $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                        $(e).remove();
                    }
                },

                errorPlacement: function (error, element) {
                    if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                        var controls = element.closest('div[class*="col-"]');
                        if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                        else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                    }
                    else if (element.is('.select2')) {
                        error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                    }
                    else if (element.is('.chosen-select')) {
                        error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                    }
                    else error.insertAfter(element.parent());
                },

                submitHandler: function (form) {
                    form[0].submit();
                },
                invalidHandler: function (form) {
                }
            });

            $("#_username").on('keyup', function () {

                if ($(this).val().length < 2) {
                    return;
                }
                var url = '../../master/users/check/' + $(this).val();
                var group = $('.username-group');
                var icon = $('.username-icon');

                $.ajax({
                    url: url,
                    success: function (data) {
                        if (!data.exists) {
                            group.removeClass('has-error');
                            icon.removeClass('fa-exclamation-circle');
                            group.addClass('has-success');
                            icon.addClass('fa-check');
                            $('.btn-submit').prop('disabled', false);
                        } else {
                            group.removeClass('has-success');
                            icon.removeClass('fa-check');
                            group.addClass('has-error');
                            icon.addClass('fa-exclamation-circle');
                            $('.btn-submit').prop('disabled', true);
                        }
                    },
                    error: function (data) {
                        bootbox.alert("Some unexpected error has occurred");
                    }
                });
            });
        });
    </script>
@endsection

@section('body')

    <div class="row">
        <div class="col-xs-12">

            <form id="add-form" name="add-form" class="form-horizontal" role="form" method="post"
                  action="{{url('master/users/addAction')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="first"> First name</label>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" id="first" name="first" placeholder="First" class="width-100">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="last"> Last name</label>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" id="last" name="last" placeholder="Last" class="width-100">
                    </div>
                </div>

                <div class="form-group username-group has-success">
                    <label class="col-sm-3 control-label no-padding-right" for="_username">Username</label>
                    <div class="col-xs-12 col-sm-5">
                    <span class="block input-icon input-icon-right">
                        <input type="text" id="_username" name="_username" title="" class="width-100"
                               placeholder="Username">
                        <i class="ace-icon fa fa-check-circle username-icon"></i>
                    </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" id="email" name="email" placeholder="Email" class="width-100">
                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-success btn-submit" type="submit">
                            <i class="ace-icon fa fa-save fa-fw bigger-110"></i> Save changes
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <a class="btn btn-danger" type="button" href="{{url('master/users')}}">
                            <i class="ace-icon fa fa-times-circle fa-fw bigger-110"></i> Cancel
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection