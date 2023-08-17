@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Cashout requests")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Cashout")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Pending Requests")}}</h4>
                                <p class="card-title-desc">
                                    {{__("admin.Here , you will find the pending requests for cash-out, Click the button to Preview")}}
                                    .</p>
                                <div class="d-grid gap-2">
                                    <a href="{{route("admin.elements.status",'pending')}}" class="btn btn-warning btn-lg waves-effect waves-light mb-1">
                                        {{__("admin.Pending Requests")}}
                                   </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Accepted Requests")}}</h4>
                                <p class="card-title-desc">
                                    {{__("admin.Here , you will find the Accepted requests for cash-out, Click the button for editing")}}
                                    .</p>
                                <div class="d-grid gap-2">
                                    <a href="{{route("admin.accepted.requests")}}" class="btn btn-success btn-lg waves-effect waves-light mb-1">
                                        {{__("admin.Accepted Requests")}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Declined Requests")}}</h4>
                                <p class="card-title-desc">
                                    {{__("admin.Here , you will find the declined requests for cash-out, Click the button for editing")}} .
                                    .</p>
                                <div class="d-grid gap-2">
                                    <a type="button" href="{{route("admin.declined.requests")}}" class="btn btn-danger btn-lg waves-effect waves-light mb-1">
                                        {{__("admin.Declined Requests")}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection
