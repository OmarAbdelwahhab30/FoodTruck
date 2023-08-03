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
                                    Enter your Email and new password will be sent to you!
                                </div>
                                <form method="post" action="{{route("admin.post.forget")}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
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
