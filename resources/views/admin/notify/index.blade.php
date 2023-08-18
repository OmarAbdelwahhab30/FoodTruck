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
                            <h4 class="mb-0">{{__("admin.Notifications")}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Notifications")}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="outer-repeater" method="post" action="{{route("admin.post.notify")}}">
                                    @csrf
                                    <div data-repeater-list="outer-group" class="outer">
                                        <div data-repeater-item="" class="outer">


                                            <div class="mb-2">
                                                <label class="form-label d-block mb-3">{{__("admin.Send to")}}</label>
                                                <div class="custom-radio form-check form-check-inline">
                                                    <input type="checkbox" id="customRadioInline1"
                                                           name="check[]"
                                                           value="users"
                                                           class="form-check-input">

                                                    <label class="form-check-label"
                                                           for="customRadioInline1">{{__("admin.Users")}}</label>
                                                    @error("check[]")
                                                    <div class="error">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="custom-radio form-check form-check-inline">
                                                    <input type="checkbox" id="customRadioInline2"
                                                           name="check[]"
                                                           value="sellers"
                                                           class="form-check-input">
                                                    <label class="form-check-label"
                                                           for="customRadioInline2">{{__("admin.Sellers")}}</label>
                                                    @error("check")
                                                        <div class="error">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="formmessage">{{__("admin.Notification")}}</label>
                                                <textarea required id="formmessage" name="notification" class="form-control" rows="3"
                                                          placeholder="{{__('admin.Enter your notification')}}"></textarea>
                                                @error("notification")
                                                    <div class="error">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                {{__("admin.Send")}}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{__("admin.Sending a notification")}}</h5>
                                                            <button type="button" class="btn btn-soft-info" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__("admin.Are you sure to send a notification")}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                            <button type="submit" class="btn btn-success">{{__("admin.Send")}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
