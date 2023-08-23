<?php
$z = " | ".__("admin.Change Configurations");
?>
@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
        @include("admin.bootstrapHelper.alerts")
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Configurations")}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Configurations")}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <!-- end row -->
                @foreach($arr as $key => $value)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">{{$key}}</h4>
                                    @foreach($value as $val)
                                    <form class="outer-repeater" method="get" action="{{route("env.change")}}">
                                        @csrf
                                        <div data-repeater-list="outer-group" class="outer">
                                            <div data-repeater-item="" class="outer">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formname">{{$val}}</label>
                                                        <input type="text" name="value" class="form-control" id="formname"
                                                               placeholder="{{__("admin.Enter the new value")}}">
                                                        <input type="hidden" name="key" value="{{$val}}">
                                                    </div>
                                                    <button type="submit"  class="btn btn-primary mb-4" style="height:40px">{{__("admin.Submit")}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                @endforeach
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
@endsection
