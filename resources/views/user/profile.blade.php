@extends('include.base_layout')

@section('title') {{$user->first.' '.$user->last}} @endsection

@section('breadcrumbs')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home fa-fw home-icon"></i>
            <a href="{{url('/')}}">Home</a>
        </li>
        <li class="active">Profile</li>
    </ul>
@endsection

@section('header') <h1> {{$user->first.' '.$user->last}} </h1> @endsection

@section('stylesheets')
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.custom.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-colorpicker.min.css') }}"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet"
          id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->

@endsection

@section('javascripts')
    <!--[if lte IE 8]-->
    <script src="{{ asset('assets/js/excanvas.min.js') }}"></script>
    <!--[endif]-->
    <script src="{{ asset('assets/js/jquery-ui.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/spinbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/autosize.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inputlimiter.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-tag.min.js') }}"></script>
    <!-- ace scripts -->
    <script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
    <script src="{{ asset('assets/js/ace.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(function ($) {

            function show() {
                @if(!empty($user->avatar))
                    $('.restore-group').show('fast');
                @endif
            }

            function populate() {
                @if(!empty($user->avatar))
                    avatar.ace_file_input('show_file_list', [
                    {type: 'image', name: '{{decrypt($user->avatar)}}', path: '{{url('file/avatar/small')}}'}
                ]);
                @endif
            }

            var avatar = $('#avatar');

            avatar.ace_file_input({
                style: 'well',
                btn_change: null,
                droppable: true,
                thumbnail: 'small',
                btn_choose: "Drop images here or click to choose",
                no_icon: "ace-icon fa fa-picture-o",
                allowExt: ["jpeg", "jpg", "png", "gif", "bmp"],
                allowMime: ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"],
                before_remove: function () {
                    show();
                    $('#_action').val('removed');
                    return true;
                },
                before_change: function () {
                    show();
                    $('#_action').val('changed');
                    return true;
                }
            }).on('change', function () {
                console.log($(this).data('ace_input_files'));
                console.log($(this).data('ace_input_method'));
            });

            populate();

            $('.restore').click(function () {
                populate();
                $('.restore-group').hide('fast');
                $('#_action').val('nothing');
            });

            $('#profile-form').validate({
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
                var url = 'user/check/' + $(this).val();
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
    <div>
        <div id="user-profile-1" class="user-profile row">
            <div class="col-xs-12 col-sm-3 center">
                <span class="profile-picture">
                    <img class="editable img-responsive" alt="Avatar" src="{{url('file/avatar/large')}}"/>
                </span>
            </div>

            <div class="col-xs-12 col-sm-9">

                <form id="profile-form" name="profile-form" class="form-horizontal" role="form" method="post"
                      enctype="multipart/form-data" action="{{url('user/profileAction')}}">
                    {{csrf_field()}}
                    <input type="hidden" id="_user_id" name="_user_id" value="{{encrypt($user->id)}}">
                    <input type="hidden" id="_old_avatar" name="_old_avatar" value="{{$user->avatar}}">
                    <input type="hidden" id="_action" name="_action" value="nothing">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="first"> First name</label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="text" id="first" name="first" placeholder="First" class="width-100"
                                   value="{{$user->first}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="last"> Last name</label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="text" id="last" name="last" placeholder="Last" class="width-100"
                                   value="{{$user->last}}">
                        </div>
                    </div>

                    <div class="form-group username-group has-success">
                        <label class="col-sm-3 control-label no-padding-right" for="_username">Username</label>
                        <div class="col-xs-12 col-sm-5">
                            <span class="block input-icon input-icon-right">
                                <input type="text" id="_username" name="_username" title="" class="width-100"
                                       value="{{$user->username}}">
                                <i class="ace-icon fa fa-check-circle username-icon"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>
                        <div class="col-xs-12 col-sm-5">
                            <input type="text" id="email" name="email" placeholder="Email" class="width-100"
                                   value="{{$user->email}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="col-sm-3 control-label no-padding-right" for="avatar"> Avatar </label>
                            <div class="col-xs-12 col-sm-5">
                                <input type="file" id="avatar" name="avatar" value="{{$user->avatar}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group restore-group" style="display: none">
                        <div class="col-xs-12">
                            <div class="col-sm-3"></div>
                            <div class="col-xs-12 col-sm-5">
                                <button class="btn btn-white btn-primary btn-round restore" type="button">
                                    <i class="ace-icon fa fa-undo red"></i> Restore avatar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-success btn-submit" type="submit">
                                <i class="ace-icon fa fa-save fa-fw bigger-110"></i> Save changes
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <a class="btn btn-danger" type="button" href="{{url('/')}}">
                                <i class="ace-icon fa fa-times-circle fa-fw bigger-110"></i> Cancel
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection