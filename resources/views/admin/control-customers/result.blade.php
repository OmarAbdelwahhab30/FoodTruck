<?php
$z = " | ".__("admin.Control Users");
?>
@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @include("admin.bootstrapHelper.alerts")
                <!-- start page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{__("admin.Customer Search")}}</h4>
                                <p class="card-title-desc">{{__("admin.Here, You can Search About Certain Customer")}}</p>
                                <form method="post" action="{{route("admin.customer.search")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <label for="form-sm-input">{{__("admin.Enter the phone of the customer")}}</label>
                                                <input class="form-control form-control-sm" type="tel" name="phone"
                                                       id="form-sm-input"
                                                       placeholder="{{__('admin.ex: +2010000058')}}">
                                                @error("phone")
                                                <div class="error">{{$message}}</div>
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
                @if( \Illuminate\Support\Facades\Session::get("users") !== null)
                    <?php $users = \Illuminate\Support\Facades\Session::get("users")?>

                    <div class="row">
                        <div class="col-lg-12">


                            <div class="card">

                                <div class="card-body">
                                    <h4 class="card-title mb-4">{{__("admin.User")}}</h4>

                                    <div class="table-responsive">

                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">

                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check font-size-16">
                                                        <input type="hidden" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label"
                                                               for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>{{__("admin.user-ID")}}</th>
                                                <th>{{__("admin.username")}}</th>
                                                <th>{{__("admin.image")}}</th>
                                                <th>{{__("admin.Email")}}</th>
                                                <th>{{__("admin.phone")}}</th>
                                                <th>{{__("admin.Date Of join")}}</th>
                                                <th>{{__("admin.Action")}}</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @forelse($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input type="hidden" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label"
                                                               for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><a href="javascript: void(0);"
                                                       class="text-body fw-bold">#0000{{$user->id}}</a></td>
                                                <td>{{$user->name}}</td>
                                                <td>
                                                    <img src="{{$user->image}}" alt="profile Pic" height="50"
                                                         width="50" style="border-radius:50px">
                                                </td>
                                                <td>
                                                    {{$user->email!=null ? $user->email:__("admin.NO EMAIL FOUND")}}
                                                </td>
                                                <td>
                                                    {{$user->phone}}
                                                </td>
                                                <td>
                                                    {{$user->created_at!=null ? $user->created_at:__('admin.NO DATE FOUND')}}
                                                </td>
                                                <td>
                                                        <?php
                                                        $x = $user->active == 0 ? "success" : "danger";
                                                        ?>
                                                    <button type="button"
                                                            id="active"
                                                            class="btn btn-outline-{{$x}} waves-effect waves-light">
                                                        <a href="{{url(LaravelLocalization::getCurrentLocale().'/admin/active/'.$user->id)}}">
                                                        {{$x == "success"? __("admin.Activate"):__("admin.Deactivate")}}
                                                        </a>
                                                    </button>
                                                    <button type="button" style="width: 100px"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >
                                                        <a href="#">
                                                            {{__("admin.Delete")}}
                                                        </a>
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">{{__("admin.User Deletion")}}</h5>
                                                                    <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{__("admin.Are you sure to delete this user")}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="{{url(LaravelLocalization::getCurrentLocale().'/admin/delete/'.$user->id)}}">
                                                                            {{__("admin.Delete")}}
                                                                        </a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function change() {
                                                            $.ajax({
                                                                url:`{{url(LaravelLocalization::getCurrentLocale().'/admin/active/'.$user->id)}}`,
                                                                dataType:"json",
                                                                cache:false,
                                                                success:function (data, status) {
                                                                       x = document.getElementById("active");
                                                                       if(x.class === "btn btn-outline-success waves-effect waves-light")
                                                                       {
                                                                           x.class = "btn btn-outline-danger waves-effect waves-light"
                                                                       }else if(x.class === "btn btn-outline-danger waves-effect waves-light")
                                                                       {
                                                                           x.class = "btn btn-outline-danger waves-effect waves-light waves-effect waves-light"
                                                                       }
                                                                }
                                                            })
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                            @empty
                                                <p>{{__("admin.There is no users")}}</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->
                @endif
            </div> <!-- container-fluid -->
        </div>
    </div>

@endsection
