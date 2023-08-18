@extends("admin.includes.app")
@section("content")
    <?php
        if (\Illuminate\Support\Facades\Session::has("orders")){
            $orders = \Illuminate\Support\Facades\Session::get("orders");
        }

    if (\Illuminate\Support\Facades\Session::has("truck_id")){
        $truck_id = \Illuminate\Support\Facades\Session::get("truck_id");
        }

    if (\Illuminate\Support\Facades\Session::has("date")){
        $date = \Illuminate\Support\Facades\Session::get("date");
        }
        ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Orders")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Orders")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                   style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                <thead>
                                @if(!empty($orders[0]))

                                <tr class="bg-transparent">
                                    <th style="width: 20px;">
                                        <div class="form-check text-center font-size-16">
                                            <label class="form-check-label" for="ordercheck"></label>
                                        </div>
                                    </th>
                                    <th>{{__("admin.Order ID")}}</th>
                                    <th>{{__("admin.Date")}}</th>
                                    <th>{{__("admin.CustomerName")}}</th>
                                    <th>{{__("admin.Total Price")}}</th>
                                    <th>{{__("admin.Orders Status")}}</th>
                                    <th style="width: 120px;">{{__("admin.Action")}}</th>
                                </tr>
                                @else
                                    <div class="h-100 d-flex align-items-center justify-content-center">
                                        <div class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                                            <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                                            <p>{{__("admin.There is no requests until now")}}</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                </thead>
                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                    <td>
                                        <div class="form-check text-center font-size-16">
                                            <label class="form-check-label" for="ordercheck1"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#000{{$order->id}}</a></td>
                                    <td>
                                        {{$order->created_at}}
                                    </td>
                                    <td>{{$order->user->name}}</td>
                                    <td>
                                        {{$order->total_price}} {{__("admin.S.R")}}
                                    </td>
                                    <td>
                                        <div class="badge bg-pill bg-soft-success font-size-12">
                                            {{app()->getLocale() =="en"? $order->status_en:$order->status_ar}}</div>
                                    </td>
                                    <td>
                                        <a href="{{url(LaravelLocalization::getCurrentLocale()."admin/DeleteOrder/".$order->id.'/'.$truck_id)}}"
                                           data-bs-toggle="modal" data-bs-target="#exampleModal"
                                           class="px-3 text-danger"><i
                                                class="uil uil-trash-alt font-size-18"></i></a>
                                    </td>

                                </tr>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__("admin.Delete the order")}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{__("admin.Are you sure to permanently delete the order")}}
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{route("admin.order.delete")}}">
                                                        @csrf
                                                        <input type="hidden" name="order_id" id="order" value="{{$order->id}}">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                        <button type="submit" class="btn btn-danger">{{__("admin.Delete")}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>

                            </table>

                        </div>

                        <!-- end table -->
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
