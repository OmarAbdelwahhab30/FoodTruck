@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                <!-- start page title -->
                @if(isset($truck))
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
                                                            <p class="align-center">{{__("admin.Plate number")}}</p>
                                                            <img style="margin-top: 89px;" src="{{asset($truck->license)}}" alt="" class="img-fluid mx-auto d-block tab-img rounded responsive">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="mt-4 mt-xl-3 ps-xl-4">
                                                </h5>
                                                <h4 class="font-size-20 mb-3">{{$truck->name}}</h4>
                                                <h5 class="mt-4 pt-2">{{__("admin.Delivery Price")}} : <span class="text-danger font-size-14 ms-2">{{$truck->delivery_price}} {{__("admin.")}}S.R</span>
                                                </h5>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mt-3">
                                                                <h5 class="font-size-14">{{__("admin.Information")}} :</h5>
                                                                <ul class="list-unstyled product-desc-list text-muted">
                                                                    @if($truck->delivery == 1)
                                                                        <li>
                                                                            <i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                                            {{__("admin.Truck supports delivery")}}
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                                            {{__("admin.Truck doesn't support delivery")}}
                                                                        </li>
                                                                    @endif
                                                                    <li>
                                                                        <i class="uil-server-network-alt text-primary me-1 font-size-16"></i>
                                                                        {{__("admin.Work-time")}} : {{$truck->work_time}}
                                                                    </li>
                                                                    <li>
                                                                        <i class="uil-parking-square text-primary me-1 font-size-16"></i>
                                                                        {{__("admin.Plate-number")}} : {{$truck->plate_no}}
                                                                    </li>
                                                                    <div class="row">
                                                                        <div class="col-lg-7 col-sm-8">
                                                                            <div class="product-desc-color mt-3">
                                                                                <h5 class="font-size-14">{{__("admin.Truck Images")}} :</h5>
                                                                                <ul class="list-inline">
                                                                                    @foreach($truck->images as $image)
                                                                                    <li class="list-inline-item">
                                                                                        <a href="#" class="active" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Gray">
                                                                                            <div class="product-color-item">
                                                                                                <img src="{{asset($image->image)}}" alt="" class="avatar-md">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    @endforeach
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
                                                            {{__("admin.Truck location")}}</h5>

                                                        <div class="d-inline-flex">

                                                            <div class="input-group mb-3">
                                                                @if(isset($truck->user->address))
                                                                    <p>{{$truck->user->address}}</p>
                                                                @else
                                                                    <p>{{__("admin.There is no location until now")}}</p>
                                                                @endif
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

                                                                            <button  type="submit"
                                                                                     data-bs-toggle="modal" data-bs-target="#ss"
                                                                                     class="btn btn-outline-success btn-sm waves-effect waves-light mb-1 w-50">
                                                                                {{__("admin.Accept")}}</button>
                                                                        </div>
                                                                        <div class="modal fade" id="ss" tabindex="-1" role="dialog" aria-labelledby="ss" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div>
                                                                                        <form method="post" action="{{route("admin.accept.seller")}}">
                                                                                            @csrf
                                                                                            <div class="modal-body">
                                                                                                <div class="mb-3">
                                                                                                    <label for="message-text" class="col-form-label">{{__("admin.Are you sure to accept the seller")}}</label>
                                                                                                    <input type="hidden" name="seller_id" value="{{$truck->user->id}}">
                                                                                                    <input type="hidden" name="phone" value="{{$truck->user->phone}}">
                                                                                                </div>
                                                                                            </div>

                                                                                                <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                                                                    <button type="submit" class="btn btn-soft-success">{{__("admin.Accept")}}</button>
                                                                                                </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                    <li>
                                                                        <button  type="button"
                                                                                 data-toggle="modal" data-target="#exampleModal"
                                                                                 data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                                 class="btn btn-outline-danger btn-sm waves-effect waves-light mb-1 w-50">
                                                                            {{__("admin.Reject")}}</button>
                                                                    </li>
                                                                </ul>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">{{__("admin.SMS Message")}}</h5>
                                                                                <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <form method="post" action="{{route("admin.reject.seller")}}">                                                                                    <div class="mb-3">
                                                                                        <label for="message-text" class="col-form-label">{{__("admin.Send a reason in a message as SMS to the seller")}}</label>
                                                                                        <textarea class="form-control" name="message"  id="message-text"  style="resize: none;height: 200px"></textarea>
                                                                                    </div>

                                                                            <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                                                @csrf
                                                                                <input type="hidden" name="seller_id" value="{{$truck->user->id}}">
                                                                                <input type="hidden" name="phone" value="{{$truck->user->phone}}">
                                                                                <button type="submit" class="btn btn-soft-danger">{{__("admin.Reject")}}</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                @endif
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
