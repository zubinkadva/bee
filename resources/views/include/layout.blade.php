<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title> @yield('title') - {{env('APP_NAME')}} </title>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/4.5.0/css/font-awesome.min.css') }}"/>

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css"/>
    <link rel="stylesheet" href="assets/css/chosen.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/daterangepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css"/>


    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.googleapis.com.css') }}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}" class="ace-main-stylesheet"
          id="main-ace-style"/>

    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-part2.min.css') }}" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-skins.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}"/>

    <!--[if lte IE 9]-->
    <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}"/>
    <!--[endif]-->

    <!-- inline styles related to this page -->

    @yield('stylesheets')

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin-bottom: 0;
            padding: 0;
        }

        .content {
            width: 610px;
        }
        .sidebar {
            width: 260px;
        }
    </style>

</head>

<body class="no-skin {{-- skin-1/2/3 --}}">

<div id="right-menu" class="modal aside" data-body-scroll="false"
     data-placement="right" data-fixed="true" data-backdrop="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Adding a new location
                </div>
            </div>

            <div class="modal-body">

                <form id="add-form" name="add-form" class="form-horizontal" role="form" method="post"
                      enctype="multipart/form-data" action="{{url('addLocation')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="name" name="name" placeholder="Name" class="width-100">
                        </div>
                    </div>

                    <div class="widget-box">
                        <div class="widget-header">
                            <h5 class="widget-title">Position</h5>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="alert alert-info">
                                            <i class="ace-icon fa fa-exclamation-circle fa-fw"></i>
                                            Enter coordinates below or click on the map
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <input type="text" id="lat" name="lat" placeholder="Latitude" class="width-100">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" id="lng" name="lng" placeholder="Longitude"
                                               class="width-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input id="gate" name="gate" type="checkbox" class="ace"
                                           onchange="$('.lock-group').toggle('slow');">
                                    <span class="lbl"> Gate?</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group lock-group" style="display: none">
                        <div class="col-xs-12">
                            <input type="text" id="combination" name="combination" placeholder="Lock combination"
                                   class="width-100">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="control-label no-padding-right" for="pallets"> Pallets</label>
                            <input type="text" id="pallets" name="pallets"
                                   class="spinbox-input form-control text-center">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="owned_by" name="owned_by" placeholder="Owned by" class="width-100">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="flowers" name="flowers" placeholder="Flowers" class="width-100">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="fencing" name="fencing" placeholder="Fencing" class="width-100">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="payments" name="payments" placeholder="Payments" class="width-100">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea type="text" id="notes" name="notes" placeholder="Notes"
                                      class="width-100"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="file" id="image" name="image" multiple class="width-100">
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-3 col-md-9">
                            <button class="btn btn-success btn-submit" type="submit">
                                <i class="ace-icon fa fa-save fa-fw bigger-110"></i> Save changes
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->

        <button class="aside-trigger btn btn-info btn-app btn-xs ace-settings-btn"
                data-target="#right-menu" data-toggle="modal" type="button">
            <i data-icon1="fa-plus" data-icon2="fa-minus"
               class="ace-icon fa fa-plus bigger-110 icon-only"></i>
        </button>
    </div><!-- /.modal-dialog -->
</div>
<input type="submit" id="test-button" name="test-button" style="position: fixed; z-index: 1">
{!! Mapper::render() !!}



<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
<!-- <![endif]-->

<!--[if IE]-->
<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
<!--[endif]-->

<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>
<script src="assets/js/spinbox.min.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/jquery.knob.min.js"></script>
<script src="assets/js/autosize.min.js"></script>
<script src="assets/js/jquery.inputlimiter.min.js"></script>
<script src="assets/js/jquery.maskedinput.min.js"></script>
<script src="assets/js/bootstrap-tag.min.js"></script>

<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

<!-- ace scripts -->
<script src="{{ asset('assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('assets/js/ace.min.js') }}"></script>

<!-- ace settings handler -->
<script src="{{ asset('assets/js/ace-extra.min.js') }}"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]-->
<script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('assets/js/respond.min.js') }}"></script>
<!--[endif]-->

<!-- inline scripts related to this page -->
@yield('javascripts')
<script type="text/javascript">
    jQuery(function ($) {
        $('.modal.aside').ace_aside();

        $('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});

        //$('#top-menu').modal('show')

        $(document).one('ajaxloadstart.page', function (e) {
            //in ajax mode, remove before leaving page
            $('.modal.aside').remove();
            $(window).off('.aside')
        });

        $('#pallets').ace_spinner({
            value: 0,
            min: 0,
            max: 9999,
            step: 1,
            on_sides: true,
            icon_up: 'ace-icon fa fa-plus bigger-110',
            icon_down: 'ace-icon fa fa-minus bigger-110',
            btn_up_class: 'btn-success',
            btn_down_class: 'btn-danger'
        });

        $('#add-form').validate({
            errorElement: 'div',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                name: {
                    required: true
                },
                lat: {
                    required: true,
                    number: true
                },
                lng: {
                    required: true,
                    number: true
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


        //make content sliders resizable using jQuery UI (you should include jquery ui files)
        //$('#right-menu > .modal-dialog').resizable({handles: "w", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});
    })
</script>

</body>
</html>
