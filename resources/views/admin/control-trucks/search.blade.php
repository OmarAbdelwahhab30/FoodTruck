@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Searching !</h4>
                                <p class="card-title-desc">Here, You can search about truck by its seller phone .</p>
                                <form method="post" action="{{route("admin.truck.search")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <input class="form-control form-control-lg" type="text" name="search"
                                                       id="form-lg-input"
                                                       placeholder="Search Here.">
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
                @if(isset($truck))
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Truck Detail</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                        <li class="breadcrumb-item active">Truck Detail</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="product-detail">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                             role="tablist" aria-orientation="vertical">
                                                            <img style="margin-top: 89px;"
                                                                 src="{{asset($truck->license)}}" alt=""
                                                                 class="img-fluid mx-auto d-block tab-img rounded responsive">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="mt-4 mt-xl-3 ps-xl-4">
                                                <h5 class="font-size-14"><a href="#" class="text-muted">FoodTruck.</a>
                                                </h5>
                                                <h4 class="font-size-20 mb-3">{{$truck->name}}</h4>

                                                <div class="text-muted">
                                                    {{$reviews_count}} Reviews
                                                </div>

                                                <h5 class="mt-4 pt-2">Delivery Price : <span
                                                        class="text-danger font-size-14 ms-2">{{$truck->delivery_price}} R.S</span>
                                                </h5>

                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mt-3">
                                                                <h5 class="font-size-14">Information :</h5>
                                                                <ul class="list-unstyled product-desc-list text-muted">
                                                                    @if($truck->delivery == 1)
                                                                        <li>
                                                                            <i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                                            Truck supports delivery
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                                            Truck doesn't support delivery
                                                                        </li>
                                                                    @endif
                                                                    <li>
                                                                        <i class="uil-server-network-alt text-primary me-1 font-size-16"></i>
                                                                        Work-time : {{$truck->work_time}}
                                                                    </li>
                                                                    <li>
                                                                        <i class="uil-parking-square text-primary me-1 font-size-16"></i>
                                                                        Plate-number : {{$truck->plate_no}}
                                                                    </li>
                                                                    <li>
                                                                        <i class="uil-constructor text-primary me-1 font-size-16"></i>
                                                                        Status : <span class="badge bg-success">Activated</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">

                                                        <h5 class="font-size-14 mb-3"><i
                                                                class="uil uil-location-pin-alt font-size-20 text-primary align-middle me-2"></i>
                                                            Truck location</h5>

                                                        <div class="d-inline-flex">

                                                            <div class="input-group mb-3">
                                                                <p>{{$truck->user->address}}</p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-7 col-sm-8">
                                                            <div class="product-desc-color mt-3">
                                                                <h5 class="font-size-14">Truck Images :</h5>
                                                                <ul class="list-inline">
                                                                    @forelse($truck_images as  $image)
                                                                        <li class="list-inline-item">
                                                                            <a href="#" class="active"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="top"
                                                                               aria-label="Gray">
                                                                                <div class="product-color-item">
                                                                                    <img
                                                                                        src="{{asset($image->image)}}"
                                                                                        alt="" class="avatar-md">
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    @empty
                                                                        There is no images to show !
                                                                    @endforelse
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="mt-0">
                                        <div class="product-desc">
                                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="specifi-tab" data-bs-toggle="tab"
                                                       role="tab"
                                                       aria-selected="true">Truck Food Sections</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content border border-top-0 p-4">
                                                <div class="tab-pane fade show active" role="tabpanel"
                                                     aria-labelledby="#specifi-tab">
                                                    <div class="table-responsive">
                                                        <ul class="list-unstyled categories-list m-lg-5">
                                                            @forelse($sections as $section)
                                                                <li>
                                                                    <a href="{{url("admin/getProductsInsideEachSection/".$section->id)}}"><i
                                                                            class="mdi mdi-circle-medium me-1 text-info">{{$section->type}}</i>
                                                                    </a></li>
                                                            @empty
                                                                {{"There is no sections to show"}}
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($reviews))
                                        <div class="mt-4">
                                            <h5 class="font-size-14 mb-3">Reviews : </h5>
                                            <div class="text-muted mb-3">
                                                {{$reviews_count}} Reviews
                                            </div>
                                            <div class="border p-4 rounded">
                                                @foreach($reviews as $review)
                                                    <div class="border-bottom pb-3">
                                                        <p class="float-sm-end text-muted font-size-13">{{$review->created_at}}</p>
                                                        <div class="badge bg-success mb-2"><i
                                                                class="mdi mdi-star"></i> {{$review->rate}}</div>
                                                        <p class="text-muted mb-4">{{$review->review}}</p>
                                                        <div class="d-flex align-items-start">
                                                            <div class="flex-grow-1">
                                                                <h5 class="font-size-15 mb-0"></h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        @endif

    </div>
    <!-- End Page-content -->

@endsection
