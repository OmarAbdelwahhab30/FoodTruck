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
                            <h4 class="mb-0">Cashout requests</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Food Truck</a></li>
                                    <li class="breadcrumb-item active">Cashout Requests</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- end row -->

                <div class="row">

                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                            <img src="" class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Truck name |  </a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mt-3">
                                                    <a href="" type="button"
                                                       class="btn btn-primary btn-sm waves-effect waves-light mb-1 w-100">
                                                        Preview</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
