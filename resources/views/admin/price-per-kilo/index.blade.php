<?php
$z = " | ".__("admin.Delivery Price");
?>
@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                @include("admin.bootstrapHelper.alerts")
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Price Per Kilo")}}</h4>
                                <p class="card-title-desc">{{__("admin.Here, You can update price per kilo for delivery")}}</p>
                                <form method="post" action="{{route("admin.kilo.price")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <label for="form-sm-input"></label>
                                                <input  class="form-control form-control-lg" type="number" min="0.1" step="0.1" name="value"
                                                                                          id="form-sm-input"
                                                                                          placeholder="{{__("admin.ex: 15 S.R")}}">
                                                @error('value')
                                                <div class="error">{{ $message }}</div>
                                                @enderror
                                                <button type="submit"
                                                        class="btn btn-success waves-effect waves-light mt-4 w-100">
                                                    <i class="uil uil-check me-2"></i> {{__("admin.Update")}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{asset("assets/libs/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/libs/metismenu/metisMenu.min.js")}}"></script>
    <script src="{{asset("assets/libs/simplebar/simplebar.min.js")}}"></script>
    <script src="{{asset("assets/libs/node-waves/waves.min.js")}}"></script>
    <script src="{{asset("assets/libs/waypoints/lib/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("assets/libs/jquery.counterup/jquery.counterup.min.js")}}"></script>

    <!-- plugins -->
    <script src="{{asset("assets/libs/select2/js/select2.min.js")}}"></script>
    <script src="{{asset("assets/libs/spectrum-colorpicker2/spectrum.min.js")}}"></script>
    <script src="{{asset("assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js")}}"></script>
    <script src="{{asset("assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js")}}"></script>
    <script src="{{asset("assets/libs/@chenfengyuan/datepicker/datepicker.min.js")}}"></script>

    <!-- datepicker js -->
    <script src="{{asset("assets/libs/flatpickr/flatpickr.min.js")}}"></script>

    <!-- init js -->
    <script src="{{asset("assets/js/pages/form-advanced.init.js")}}"></script>

    <!-- App js -->
    <script src="{{asset("assets/js/app.js")}}"></script>

@endsection
