<?php
$z = " | ".__("admin.About-Us");
?>
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
                            <h4 class="mb-0">{{__("admin.About-Us")}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <p>
                                        @if(isset($about->content))
                                            {{$about->content}}
                                    </p>
                                    <p>
                                        @else
                                            {{__("admin.Add About As to show")}}
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
                            <form method="post" action="{{route("admin.post.about")}}">
                                @csrf
                                <h4 class="card-title">{{__("admin.Update About Us Content")}}</h4>
                                <div class="mb-3">
                                    <div>
                                        <textarea name="content" style="resize: none" required class="form-control" rows="5"></textarea>
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
