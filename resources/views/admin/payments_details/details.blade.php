@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Payment Detail")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__("admin.Payments")}}</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Payment Detail")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
{{--                {{dd($information)}}--}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h4 class="float-start font-size-16"> {{__("admin.Payment id")}} #{{$information[0]->id}}
                                        <span class="badge bg-success font-size-12 ms-2">{{$information[0]->payment_status}}</span>
                                    </h4>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-muted">
                                                <h5 class="font-size-16 mb-3">{{__("admin.Seller information")}} :</h5>
                                                <h5 class="font-size-15 mb-2">{{$information[0]->order->truck->name}}</h5>
                                                <p class="mb-1">{{$information[0]->order->truck->address ?? __("admin.No address available")}}</p>
                                                <p class="mb-1">{{$information[0]->order->truck->user->email ?? __("admin.NO EMAIL FOUND")}}</p>
                                                <p>{{$information[0]->order->truck->user->phone}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-muted">
                                            <h5 class="font-size-16 mb-3">{{__("admin.Customer information")}} :</h5>
                                            <h5 class="font-size-15 mb-2">{{$information[0]->order->user->name}}</h5>
                                            <p class="mb-1">{{$information[0]->order->user->address ?? __("admin.No address available")}}</p>
                                            <p class="mb-1">{{$information[0]->order->user->email ?? __("admin.NO EMAIL FOUND")}}</p>
                                            <p>{{$information[0]->order->user->phone}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-16 mb-1">{{__("admin.Order No")}}:</h5>
                                                <p>##000{{$information[0]->order->id}}</p>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-16 mb-1">{{__("admin.Order Date")}}:</h5>
                                                <p>{{$information[0]->order->created_at}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <h5 class="font-size-15">{{__("admin.Order summary")}}</h5>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap table-centered mb-0">
                                            <thead>
                                            <tr>
                                                <th style="width: 70px;">{{__("admin.No")}}</th>
                                                <th>{{__("admin.Item")}}</th>
                                                <th>{{__("admin.Price")}}</th>
                                                <th>{{__("admin.Quantity")}}</th>
                                                <th class="text-end" style="width: 120px;">{{__("admin.Total Price")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($information[0]->order->products as $product)
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>
                                                        <h5 class="font-size-15 mb-1">{{$product->name}}</h5>
                                                    </td>
                                                    <td>{{$product->orderProduct->size->price}}</td>
                                                    <td>{{$product->orderProduct->count}}</td>
                                                    <td class="text-end">{{$product->orderProduct->count
                                                        *
                                                        $product->orderProduct->size->price}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">{{__("admin.Value Added Tax")}} </th>
                                                <td class="border-0 text-end"><h4 class="m-0">{{$vat}} {{__("admin.S.R")}}</h4></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">{{__("admin.Total Price")}}</th>
                                                <td class="border-0 text-end"><h4 class="m-0">{{$information[0]->order->total_price}} {{__("admin.S.R")}}</h4></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="text-lg-end">
                                            <a href="{{route("pdf.download",$information[0]->id)}}" class="btn btn-success">{{__("admin.Download The Invoice")}}</a>
                                        </div>
                                    </div>
                                </div>
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
