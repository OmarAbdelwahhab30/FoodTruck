@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                @if(isset($products))
                    <div class="row">
                        <div class="col-xl-12 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <h5>{{__("admin.Showing result for Category")}}</h5>
                                                    <ol class="breadcrumb p-0 bg-transparent mb-2">
                                                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{__("admin.Categories")}}</a>
                                                        </li>
                                                        <li class="breadcrumb-item active">{{$products->type}}</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @forelse($products->products as $product)
                                                <div class="col-xl-4 col-sm-6">
                                                    <div class="product-img pt-4 px-4">
                                                        <img src="{{$product->images->first()->image}}" alt=""
                                                             class="img-fluid mx-auto d-block">
                                                    </div>
                                                    <div class="text-center product-content p-4">

                                                        <h5 class="mb-1"><a href="#"
                                                                            class="text-dark">{{$product->name}}</a>
                                                        </h5>
                                                        <p class="text-muted font-size-13">{{$product->calories}}
                                                            {{__("admin.calories")}}</p>
                                                        <p class="text-muted font-size-13">{{$product->description}}</p>

                                                        <h5 class="mt-3 mb-0"><span class="text-muted me-2"></span>
                                                            {{$product->orderProduct->size->price}} {{__("admin.S.R")}}
                                                        </h5>
                                                        <div>
                                                            <button type="button" class="btn btn-danger mt-4 w-75" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                {{__("admin.Delete")}}
                                                            </button>
                                                        </div>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">{{__("admin.Delete Product")}}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{__("admin.Are you sure to permanently delete the product")}}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form method="post" action="{{route("admin.product.delete")}}">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id" id="product" value="{{$product->id}}">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                                            <button type="submit" class="btn btn-danger">{{__("admin.Delete")}}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                {{__("admin.There is no products to show")}} !!
                                            @endforelse
                                        </div>
                                        <!-- end row -->
                                    </div>
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
