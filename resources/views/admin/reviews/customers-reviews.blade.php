@extends("admin.includes.app")
@section("addition")
    <!-- jquery-bar-rating css -->
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-1to10.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-horizontal.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-movie.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-pill.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-reversed.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/bars-square.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/css-stars.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/fontawesome-stars-o.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset("assets/libs/jquery-bar-rating/themes/fontawesome-stars.css")}}" rel="stylesheet"
          type="text/css"/>
@endsection
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @forelse($reviews as $review)
                    <h4> {{__("admin.Customer name")}} | {{$review->user->name}}</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-2">
                                        <img height="100px" width="100px" src="{{$review->user->image}}"
                                             alt="Card image" style="border-radius: 50%; margin: 60px">
                                    </div><!-- end col-->
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <div class="br-wrapper br-theme-css-stars">
                                                    {{__("admin.Seller Name")}} | {{$review->toWhom->name}}
                                                    <div class="br-widget">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if ($i < $review->rate)
                                                                <a href="#" data-rating-value="{{$review->rate}}"
                                                                   data-rating-text="{{$review->rate}}"
                                                                   class="br-selected br-current">
                                                                </a>
                                                            @else
                                                                <a href="#" data-rating-value="{{$review->rate}}"
                                                                   data-rating-text="{{$review->rate}}"
                                                                >
                                                                </a>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </h5>
                                            <p class="card-text">{{$review->review}}</p>
                                            <p class="card-text">{{$review->created_at}}
                                            </p>
                                        </div><!-- end card body -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>

                @empty
                    <div
                        class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center"
                        role="alert">
                        <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                        <p>{{__("admin.No reviews to show")}}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endforelse
                {{$reviews->links()}}
            </div>
        </div>
    </div>
@endsection
