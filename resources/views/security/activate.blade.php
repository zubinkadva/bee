@extends('include.login_layout')

@section('title') Activate account @endsection

@section('body')

    <div class="login-box visible widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">
                @if(!empty($user) and $user->reset_token == $token)
                    <h4 class="header green lighter bigger center">
                        <i class="ace-icon fa fa-user-secret red2 fa-fw"></i> Activate your account below
                    </h4>

                    <div class="space-6"></div>

                    <form action="{{url('activateAction')}}" method="post" id="activate-form">
                        {{csrf_field()}}
                        <input type="hidden" value="{{encrypt($user->id)}}" id="_user_id" name="_user_id">
                        <fieldset>
                            <div class="form-group">
                            <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" id="_password" name="_password"
                                       placeholder="Password"/>
                                <i class="ace-icon fa fa-lock fa-fw"></i>
                            </span>
                            </div>

                            <div class="form-group">
                            <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" id="_password_again"
                                       name="_password_again"
                                       placeholder="Confirm Password"/>
                                <i class="ace-icon fa fa-lock fa-fw"></i>
                            </span>
                            </div>

                            <div class="space"></div>

                            <div class="clearfix">
                                <button type="submit" class="btn btn-sm btn-primary width-100">
                                    <i class="ace-icon fa fa-check fa-fw"></i>
                                    <span class="bigger-110">Activate</span>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                @elseif(!empty($activated))
                    <h4 class="header green lighter bigger center">
                        <i class="ace-icon fa fa-check-circle green fa-fw"></i> Account activated successfully
                    </h4>
                    <div class="space-6"></div>
                    <a class="btn btn-sm btn-success width-100" href="{{url('/')}}">
                        <i class="ace-icon fa fa-key fa-fw"></i>
                        <span class="bigger-110">Proceed to login</span>
                    </a>
                @else
                    <h4 class="header red lighter bigger center">
                        <i class="ace-icon fa fa-exclamation-triangle red fa-fw"></i> Invalid token
                    </h4>
                @endif

            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
    </div><!-- /.login-box -->

@endsection

@section('javascripts')
    <script type="text/javascript">
        jQuery(function ($) {

            $('#activate-form').validate({
                errorElement: 'div',
                errorClass: 'help-block',
                focusInvalid: false,
                ignore: "",
                rules: {
                    _password: {
                        required: true
                    },
                    _password_again: {
                        required: true,
                        equalTo: '#_password'
                    }
                },

                messages: {},

                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },

                success: function (e) {
                    $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                    $(e).remove();
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

        });
    </script>
@endsection