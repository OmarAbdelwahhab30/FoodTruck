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
                            <h4 class="mb-0">Notifications</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Notifications</li>
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
                                                <label class="form-label d-block mb-3">Send to :</label>
                                                <div class="custom-radio form-check form-check-inline">
                                                    <input type="checkbox" id="customRadioInline1"
                                                           name="check[]"
                                                           value="users"
                                                           class="form-check-input">
                                                    <label class="form-check-label"
                                                           for="customRadioInline1">Users</label>
                                                </div>
                                                <div class="custom-radio form-check form-check-inline">
                                                    <input type="checkbox" id="customRadioInline2"
                                                           name="check[]"
                                                           value="sellers"
                                                           class="form-check-input">
                                                    <label class="form-check-label"
                                                           for="customRadioInline2">Sellers</label>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="formmessage">Notiication :</label>
                                                <textarea id="formmessage" name="notification" class="form-control" rows="3"
                                                          placeholder="Enter your notification"></textarea>
                                            </div>
                                            <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Send
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Sending a notification</h5>
                                                            <button type="button" class="btn btn-soft-info" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to send a notification !!
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Send</button>
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
