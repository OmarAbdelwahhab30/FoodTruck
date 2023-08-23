<?php
$z = " | ".__("admin.Control Trucks");
?>
@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Searching")}} !</h4>
                                <p class="card-title-desc">{{__("admin.Here, You can search about truck by its seller phone")}} .</p>
                                <form method="post" action="{{route("admin.truck.search")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <input class="form-control form-control-lg" type="text" name="search"
                                                       id="form-lg-input"
                                                       placeholder="{{__("admin.Search Here")}}.">
                                                @error('search')
                                                  <div class="error">{{ $message }}</div>
                                                @enderror
                                                <button type="submit"
                                                        class="btn btn-success waves-effect waves-light mt-4 w-100">
                                                    <i class="uil uil-check me-2"></i> {{__("admin.Search")}}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
    </div>
    <!-- End Page-content -->

@endsection
