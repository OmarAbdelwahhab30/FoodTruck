@extends("admin.includes.app")
@section("content")

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Requests</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Food Truck</a></li>
                                    <li class="breadcrumb-item active">Seller Requests</li>
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
                                                    <span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">
                                                        M
                                                    </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Truck name | </a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Seller Name
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mt-3">
                                                    <a href="{{route("admin.preview.requests")}}" type="button"
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
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-warning text-warning font-size-16 rounded-circle">
                                                        B
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Brendle's</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Karl Early
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">62</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$7,952</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-success text-success font-size-16 rounded-circle">
                                                        T
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Tech Hifi</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Marion Glaze
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">40</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$6,265</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-danger text-danger font-size-16 rounded-circle">
                                                        L
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Lafayette</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Brent Johnson
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">51</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$7,235</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-info text-info font-size-16 rounded-circle">
                                                        M
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Micro Design</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Kimberly Martinez
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">34</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$4,223</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-dark text-dark font-size-16 rounded-circle">
                                                        S
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Sportmart</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Sarah Stewart
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">43</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$5,632</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-success text-success font-size-16 rounded-circle">
                                                        T
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Tech Hifi</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Lauren Doyle
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">40</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$5,268</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle">
                                                        B
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Brendle's</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Elaina Torres
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">31</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$3,965</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-sm">
                                                    <span class="avatar-title bg-soft-warning text-warning font-size-16 rounded-circle">
                                                        S
                                                    </span>
                                        </div>
                                    </div>

                                    <div class="flex-grow-1 align-self-center">
                                        <div class="border-bottom pb-1">
                                            <h5 class="text-truncate font-size-16 mb-1"><a href="#" class="text-dark">Standard Sales</a></h5>
                                            <p class="text-muted">
                                                <i class="mdi mdi-account me-1"></i> Willie Farber
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Products</p>
                                                    <h5 class="font-size-16 mb-0">60</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-3">
                                                    <p class="text-muted mb-2">Wallet Balance</p>
                                                    <h5 class="font-size-16 mb-0">$7,425</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-center my-3">
                            <a href="javascript:void(0);" class="text-primary"><i class="mdi mdi-loading mdi-spin font-size-20 align-middle me-2"></i> Load more </a>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>2023 © Minible.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/" target="_blank" class="text-reset">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
