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
                                <h4 class="card-title">{{__("admin.Add Administrator")}}</h4>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <for class="mt-4">
             <form method="post" action="{{route("admin.post.add")}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-3 border-right">
                                                    <div class="">
                                                        <img style="border-radius: 50% ; height: 250px;width: 250px ;padding: 35px"
                                                             src="{{asset("storage/images/default.png")}}" id="image">
                                                        <span class="font-weight-bold"></span><span
                                                            class="text-black-50"></span><span></span>
                                                        <input type="file" id="uploadBox" style="width: 192px;
                                                            height: 38px;
                                                            margin-top: 48px;
                                                            margin-left: 21px;"
                                                               name="image"
                                                               class="form-control"
                                                               onchange="loadFile(event);loadBtn();">
                                                        <a>
                                                            <script>
                                                                var loadFile = function (event) {
                                                                    let x = 1;
                                                                    var image = document.getElementById('image');
                                                                    image.src = URL.createObjectURL(event.target.files[0]);
                                                                    image.onload = function () {
                                                                        URL.revokeObjectURL(image.src)
                                                                    }
                                                                };
                                                                var loadBtn = function () {
                                                                    document.getElementById('dlt-link').innerHTML =
                                                                        `<button style="width: 192px;
                                                                        height: 38px;
                                                                        display: block;
                                                                        margin-top: 48px;
                                                                        margin-left: 21px;" type="button" onclick="deleteImage()"
                                                                        id="dlt-btn"
                                                                        class="btn btn-outline-danger waves-effect waves-light">
                                                                            {{__("admin.Delete Profile Picture")}}
                                                                        </button>`
                                                                }
                                                                var deleteImage = function () {
                                                                    document.getElementById("image").src = "{{asset("storage/images/default.png")}}";
                                                                    document.getElementById("uploadBox").value = null;
                                                                    document.getElementById("dlt-btn").style.display = "none";
                                                                }
                                                            </script>
                                                            <a id="dlt-link">
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="col-lg-9 ms-lg-auto">
                                        <div class="mt-5 mt-lg-4">

                                            <div class="row mb-4">
                                                <label for="horizontal-Fullname-input"
                                                       class=" col-form-label">{{__("admin.admin-name")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" value="{{old("name")}}"
                                                           class="form-control"
                                                           id="horizontal-Fullname-input"
                                                           placeholder="{{__("admin.Enter your name")}}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-form-label">{{__("admin.Phone Number")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" name="phone" value="{{old("phone")}}"
                                                           class="form-control"
                                                           id="horizontal-email-input"
                                                           placeholder="{{__("admin.Enter your phone number")}}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-form-label">{{__("admin.Email")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" value="{{old("email")}}"
                                                           class="form-control"
                                                           id="horizontal-email-input"
                                                           placeholder="{{__("admin.Enter your email address")}}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-form-label">{{__("admin.Password")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="password" class="form-control"
                                                           id="horizontal-password-input"
                                                           placeholder="{{__("admin.Enter your password")}}">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label class="col-form-label">{{__("admin.Confirm - Password")}}</label>
                                                <div class="col-sm-9">
                                                    <input type="password" name="confirm_password" class="form-control"
                                                           id="horizontal-password-input"
                                                           placeholder="{{__("admin.Confirm your password")}}">
                                                </div>
                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <div class="d-flex flex-wrap gap-3">
                                                        <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light w-md">
                                                            {{__("admin.Submit")}}
                                                        </button>
                                                        <button type="reset"
                                                                class="btn btn-outline-danger waves-effect waves-light w-md">
                                                            {{__("admin.Reset")}}
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
                    </div>
                </div>
                <!-- End Form Layout -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
