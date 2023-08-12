@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Cashout requests</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">Cashout</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pending Requests</h4>
                                <p class="card-title-desc">Here , you will find the pending requests for cash-out, Click the button to Preview .
                                    .</p>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-warning btn-lg waves-effect waves-light mb-1">
                                        Pending Requests
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Accepted Requests</h4>
                                <p class="card-title-desc">Here , you will find the Accepted requests for cash-out, Click the button for editing .
                                    .</p>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success btn-lg waves-effect waves-light mb-1">
                                        Accepted Requests
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Declined Requests</h4>
                                <p class="card-title-desc">Here , you will find the pending requests for cash-out, Click the button for editing .
                                    .</p>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-danger btn-lg waves-effect waves-light mb-1">
                                        Declined Requests
                                    </button>
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
