@extends("admin.auth.includes.app")
@section("content")
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        @include("admin.bootstrapHelper.alerts")

                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue to Food Truck Dashboard.</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form method="post" action="{{route("admin.post.login")}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" name="name" value="{{old("name")}}"  id="name" >
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                </div>
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" name="password" class="form-control" id="userpassword" value="{{old("password")}}">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="auth-remember-check">
                                <label class="form-check-label"  for="auth-remember-check">Remember me</label>
                            </div>

                            <div class="mt-3 text-end">
                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection
