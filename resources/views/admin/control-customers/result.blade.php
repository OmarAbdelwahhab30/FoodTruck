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
                                <form method="get" action="{{url("admin/search/")}}">
                                    @csrf
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-sm-6">
                                            <div class="">
                                                <label for="form-sm-input">Enter the phone of the customer.</label>
                                                <input  class="form-control form-control-sm" type="tel" name="phone"
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
                @if( isset($customer))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Customer</h4>
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
