@extends("admin.auth.includes.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div>
                    <div class="card">
                        <div class="card-body p-4">
                            @include("admin.bootstrapHelper.alerts")
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Reset Password</h5>
                                <p class="text-muted">Reset Password with FoodTruck.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <div class="alert alert-border-info text-center mb-4" role="alert">
                                    Enter the code you received in your mail..
                                </div>
                                <form method="post" action="{{route("admin.post.reset")}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Code Sent to you ?</label>
                                        <input type="text" class="form-control" id="code" name="code" value="{{old("code")}}" placeholder="Enter The Code">
                                        <input type="hidden" class="form-control" id="code" name="iscode"  value="{{Session::get("code")}}">
                                    </div>
                                        <input type="hidden" class="form-control" id="email" name="email" value="{{Session::get("email")}}" >
                                    <div class="mb-3">
                                        <label class="form-label" for="email">new password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email">confirm new password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">Remember It ? <a href="{{route("admin.login")}}" class="fw-medium text-primary"> login </a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection
