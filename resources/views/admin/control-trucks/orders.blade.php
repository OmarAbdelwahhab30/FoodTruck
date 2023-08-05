@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                @include("admin.bootstrapHelper.alerts")
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="height: 500px">
                            <div class="card-body">

                                <h4 class="card-title">Truck Orders Search</h4>
                                <p class="card-title-desc">
                                    Search about orders by certain date .
                                </p>

                                <form method="get" action="{{route("truck.orders.post")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">

                                                <label class="form-label">Search here</label>
                                                <div class="input-group" id="datepicker1">
                                                    <input type="text" autocomplete="off" name="date"
                                                           class="form-control" placeholder="dd M, yyyy"
                                                           data-date-format="dd M, yyyy"
                                                           data-date-container="#datepicker1" data-provide="datepicker">
                                                    <input type="hidden" name="truck_id" value="{{$truck_id}}">
                                                    <span class="input-group-text"><i
                                                            class="mdi mdi-calendar"></i></span>
                                                </div><!-- input-group -->
                                                <button type="submit"
                                                        class="btn btn-success waves-effect waves-light mt-4 w-100">
                                                    <i class="uil uil-check me-2"></i> Search
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
