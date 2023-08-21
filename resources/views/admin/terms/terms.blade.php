@extends("admin.includes.app")

@section("content")

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                @include("admin.bootstrapHelper.alerts")
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Terms and Conditions")}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">{{__("admin.Terms and Conditions")}} </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h5 class="header-title">{{__("admin.Terms and Conditions")}}</h5>

                                <div>
                                    <p>
                                        @if(isset($terms->content))
                                            {{$terms->content}}
                                    </p>
                                    <p>
                                        @else
                                            {{__("admin.Add Terms and conditions to show")}}.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <form method="post" action="{{route("admin.post.terms")}}">
                                @csrf
                                <h4 class="card-title">{{__("admin.Update Terms and Conditions Content")}}</h4>
                                <div class="mb-3">
                                    <div>
                                        <textarea name="content" style="resize: none" required class="form-control" rows="5" cols="10"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            {{__("admin.Submit")}}
                                        </button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                        </div>
                    </div>
            </div> <!-- container-fluid -->
        </div>
            <!-- End Page-content -->
    </div>

@endsection
