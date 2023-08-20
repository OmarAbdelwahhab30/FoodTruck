@extends("admin.includes.app")
@section("content")
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @include("admin.bootstrapHelper.alerts")
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">{{__("admin.Dashboard")}}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                <li class="breadcrumb-item active">{{__("admin.Dashboard")}}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="">{{$reviews_count}}</span></h4>
                                <p class="text-muted mb-0">{{__("admin.Total Reviews")}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="">{{$orders_count}}</span></h4>
                                <p class="text-muted mb-0">{{__("admin.Orders")}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="">{{$customers_count}}</span></h4>
                                <p class="text-muted mb-0">{{__("admin.Customers")}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="">{{$trucks_count}}</span></h4>
                                <p class="text-muted mb-0">{{__("admin.Trucks")}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

            </div> <!-- end row-->


            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{__("admin.Latest Customers")}}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check font-size-16">
                                                <input type="hidden" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>{{__("admin.user-ID")}}</th>
                                        <th>{{__("admin.username")}}</th>
                                        <th>{{__("admin.image")}}</th>
                                        <th>{{__("admin.Email")}}</th>
                                        <th>{{__("admin.phone")}}</th>
                                        <th>{{__("admin.Date Of join")}}</th>
                                        <th>..</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input type="hidden" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#0000{{$customer->id}}</a> </td>
                                            <td>{{$customer->name}}</td>
                                            <td>
                                                <img src="{{$customer->image}}" alt="profile Pic" height="50" width="50" style="border-radius:50px">
                                            </td>
                                            <td>
                                                {{isset($customer->email)? $customer->email:__("admin.NO EMAIL FOUND")}}
                                            </td>
                                            <td>
                                                {{$customer->phone}}
                                            </td>
                                            <td>
                                               {{$customer->created_at}}
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{__("admin.Latest Trcuks")}}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check font-size-16">
                                                <input type="hidden" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>{{__("admin.Truck-ID")}}</th>
                                        <th>{{__("admin.Truck-name")}}</th>
                                        <th>{{__("admin.Plate-no")}}</th>
                                        <th>{{__("admin.Delivery-Price")}}</th>
                                        <th>{{__("admin.Work-Time")}}</th>
                                        <th>{{__("admin.Date Of join")}}</th>
                                        <th>..</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trucks as $truck)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input type="hidden" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);" class="text-body fw-bold">#0000{{$truck->id}}</a> </td>
                                            <td>{{$truck->name}}</td>

                                            <td>
                                                {{$truck->plate_no}}
                                            </td>
                                            <td>
                                               {{$truck->delivery_price}}
                                            </td>
                                            <td>
                                                {{$truck->work_time}}
                                            </td>
                                            <td>
                                                {{$truck->created_at}}
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{__("admin.Latest Transactions")}}</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check font-size-16">
                                                <input type="hidden" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>{{__("admin.Id")}}</th>
                                        <th>{{__("admin.Customer")}}</th>
                                        <th>{{__("admin.Payment-ID")}}</th>
                                        <th>{{__("admin.Payment status")}}</th>
                                        <th>{{__("admin.Payment Method")}}</th>
                                        <th>{{__("admin.Date Of transaction")}}</th>
                                        <th>..</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input type="hidden" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#0000{{$transaction->id}}</a> </td>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>
                                            {{$transaction->payment_id}}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-soft-success font-size-12">
                                                {{$transaction->payment_status}}</span>
                                        </td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i>{{$transaction->payment_method}}
                                        </td>
                                        <td>
                                            {{$transaction->created_at}}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © FoodTruck
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
@endsection
