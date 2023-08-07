@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-5">
                                        <div class="product-detail">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <img style="margin-top: 89px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnTe7DBAVX9O7EJoTKsF782pX4rP9I894jew&amp;usqp=CAU" alt="" class="img-fluid mx-auto d-block tab-img rounded responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <div class="mt-4 mt-xl-3 ps-xl-4">
                                            <h5 class="font-size-14"><a href="#" class="text-muted">FoodTruck.</a>
                                            </h5>
                                            <h4 class="font-size-20 mb-3">omar_Truck</h4>

                                            <div class="text-muted">
                                                26 Reviews
                                            </div>

                                            <h5 class="mt-4 pt-2">Delivery Price : <span class="text-danger font-size-14 ms-2">0.00 S.R</span>
                                            </h5>

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mt-3">
                                                            <h5 class="font-size-14">Information :</h5>
                                                            <ul class="list-unstyled product-desc-list text-muted">
                                                                <li>
                                                                    <i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                                    Truck doesn't support delivery
                                                                </li>
                                                                <li>
                                                                    <i class="uil-server-network-alt text-primary me-1 font-size-16"></i>
                                                                    Work-time : 09:00-22:00
                                                                </li>
                                                                <li>
                                                                    <i class="uil-parking-square text-primary me-1 font-size-16"></i>
                                                                    Plate-number : 1456-aaa
                                                                </li>
                                                                <div class="row">
                                                                    <div class="col-lg-7 col-sm-8">
                                                                        <div class="product-desc-color mt-3">
                                                                            <h5 class="font-size-14">Truck Images :</h5>
                                                                            <ul class="list-inline">
                                                                                <li class="list-inline-item">
                                                                                    <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Gray">
                                                                                        <div class="product-color-item">
                                                                                            <img src="https://img.freepik.com/premium-psd/food-truck-mockup_472818-69.jpg" alt="" class="avatar-md">
                                                                                        </div>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="list-inline-item">
                                                                                    <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Gray">
                                                                                        <div class="product-color-item">
                                                                                            <img src="https://img.freepik.com/premium-psd/food-truck-mockup_472818-69.jpg" alt="" class="avatar-md">
                                                                                        </div>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="list-inline-item">
                                                                                    <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Gray">
                                                                                        <div class="product-color-item">
                                                                                            <img src="https://img.freepik.com/premium-psd/food-truck-mockup_472818-69.jpg" alt="" class="avatar-md">
                                                                                        </div>
                                                                                    </a>
                                                                                </li>

                                                                                <li class="list-inline-item">
                                                                                    <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Gray">
                                                                                        <div class="product-color-item">
                                                                                            <img src="https://img.freepik.com/premium-psd/food-truck-mockup_472818-69.jpg" alt="" class="avatar-md">
                                                                                        </div>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">

                                                    <h5 class="font-size-14 mb-3"><i class="uil uil-location-pin-alt font-size-20 text-primary align-middle me-2"></i>
                                                        Truck location</h5>

                                                    <div class="d-inline-flex">

                                                        <div class="input-group mb-3">
                                                            <p>Southern Trinity Joint Unified School District, CA, USA</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mt-3">
                                                            <hr>
                                                            <ul class="list-unstyled product-desc-list text-muted">
                                                                <li>
                                                                    <div class="mt-3">
                                                                        <a href="{{route("admin.preview.requests")}}" type="button"
                                                                           class="btn btn-outline-success btn-sm waves-effect waves-light mb-1 w-50">
                                                                            Accept</a>
                                                                        <a href="{{route("admin.preview.requests")}}" type="button"
                                                                           class="btn btn-outline-danger btn-sm waves-effect waves-light mb-1 w-50">
                                                                            Reject</a>

                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
