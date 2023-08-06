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
                            <h4 class="mb-0">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                    <p> <a href="{{url("admin/searchIndex")}}">Click Here to search about certain user !</a></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Customers</h4>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check font-size-16">
                                                    <input type="hidden" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
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

                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input type="hidden" class="form-check-input" id="customCheck2">
                                                        <label class="form-check-label"
                                                               for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td><a href="javascript: void(0);"
                                                       class="text-body fw-bold">#0000{{$customer->id}}</a></td>
                                                <td>{{$customer->name}}</td>
                                                <td>
                                                    <img src="{{asset($customer->image)}}" alt="profile Pic" height="50"
                                                         width="50" style="border-radius:50px">
                                                </td>
                                                <td>
                                                    {{isset($customer->email)? $customer->email:"NO EMAIL FOUND"}}
                                                </td>
                                                <td>
                                                    {{$customer->phone}}
                                                </td>
                                                <td>
                                                    {{$customer->created_at}}
                                                </td>
                                                <td>
                                                    <?php
                                                        $x = $customer->active==0 ? "success":"danger";
                                                    ?>
                                                    <button type="button"
                                                            class="btn btn-outline-{{$x}} waves-effect waves-light">
                                                        {{$x == "success"? "Activate":"Deactivate"}}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$customers->links()}}
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
    </div>

@endsection
