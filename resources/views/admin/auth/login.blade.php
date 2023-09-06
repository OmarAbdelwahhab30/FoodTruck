@extends("admin.auth.includes.app")
@section("content")
    <?php
    if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == "ar")
    {
        $st = "margin-left: 215px";
    }else{
        $st="";
    }
    ?>
    <div class="container" style="{{$st}}">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        @include("admin.bootstrapHelper.alerts")
                        <h5 class="text-primary">{{__("admin.Welcome Back")}}</h5>
                        <p class="text-muted">{{__("admin.Sign in to continue to Food Truck Dashboard")}}</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form method="post" action="{{route("admin.post.login")}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="username">{{__("admin.Username")}}</label>
                                <input type="text" class="form-control" name="name" value="{{old("name")}}"  id="name" >
                                @error("name")
                                <div class="error"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="{{route("admin.forget")}}" class="">{{__("admin.Forgot password")}}</a>
                                </div>
                                <label class="form-label" for="userpassword">{{__("admin.Password")}}</label>
                                <input type="password" name="password" class="form-control" id="userpassword" value="{{old("password")}}">
                                @error("password")
                                <div class="error"> {{$message}} </div>
                                @enderror
                            </div>

                            <div class="mt-3 text-end">
                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">{{__("admin.login")}}</button>
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
