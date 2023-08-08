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
                                <h4 class="card-title">Customer Search!</h4>
                                <p class="card-title-desc">Here, You can Search About Certain Customer .</p>
                                <form method="post" action="{{route("admin.customer.search")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <label for="form-sm-input">Enter the phone of the customer.</label>
                                                <input class="form-control form-control-sm" type="tel" name="phone"
                                                       id="form-sm-input"
                                                       placeholder="ex: +2010000058">
                                                <button type="submit"
                                                        class="btn btn-success waves-effect waves-light mt-4 w-100">
                                                    <i class="uil uil-check me-2"></i> Search
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
                                    <h4 class="card-title mb-4">User</h4>

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
                                                <th>user-ID</th>
                                                <th>username</th>
                                                <th>image</th>
                                                <th>Email</th>
                                                <th>phone</th>
                                                <th>Date Of join</th>
                                                <th>Action</th>
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
                                                    <img src="{{asset($user->image)}}" alt="profile Pic" height="50"
                                                         width="50" style="border-radius:50px">
                                                </td>
                                                <td>
                                                    {{isset($user->email)? $user->email:"NO EMAIL FOUND"}}
                                                </td>
                                                <td>
                                                    {{$user->phone}}
                                                </td>
                                                <td>
                                                    {{$user->created_at}}
                                                </td>
                                                <td>
                                                        <?php
                                                        $x = $user->active == 0 ? "success" : "danger";
                                                        ?>
                                                    <button type="button"
                                                            id="active"
                                                            class="btn btn-outline-{{$x}} waves-effect waves-light">
                                                        <a href="{{url("admin/active/".$user->id)}}">
                                                        {{$x == "success"? "Activate":"Deactivate"}}
                                                        </a>
                                                    </button>
                                                    <button type="button" style="width: 100px"
                                                            class="btn btn-danger waves-effect waves-light"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >
                                                        <a href="#">
                                                            Delete
                                                        </a>
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">User Deletion!!</h5>
                                                                    <button type="button" class="btn btn-outline-info" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure to delete this user?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-danger">
                                                                        <a href="{{url("admin/delete/".$user->id)}}">
                                                                            Delete
                                                                        </a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function change() {
                                                            $.ajax({
                                                                url:`{{url("admin/active/".$user->id)}}`,
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
                                                <p> There is no users</p>
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
