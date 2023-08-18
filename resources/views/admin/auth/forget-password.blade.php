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
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div>
                    <div class="card">
                        <div class="card-body p-4">
                            @include("admin.bootstrapHelper.alerts")
                            <div class="text-center mt-2">
                                <h5 class="text-primary">{{__("admin.Reset Password")}}</h5>
                            </div>
                            <div class="p-2 mt-4">
                                <div class="alert alert-border-info text-center mb-4" role="alert">
                                    {{__("admin.Enter your Email and the code will be sent to you")}}
                                </div>
                                <form method="post" action="{{route("admin.post.forget")}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="{{__("admin.Enter email")}}">
                                        @error("email")
                                        {<div class="error"> {{$message}} </div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">{{__("admin.send")}}</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p class="mb-0">{{__("admin.Remember It")}}<a href="{{route("admin.login")}}" class="fw-medium text-primary">{{__("admin.login")}}  </a></p>
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
