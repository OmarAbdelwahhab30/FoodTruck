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
                </div>
                    <p> <a href="{{url(LaravelLocalization::getCurrentLocale().'/admin/searchIndex')}}">
                            {{__("admin.Click Here to search about certain user")}}</a></p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">{{__("admin.Users")}}</h4>
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
                                            <th>{{__("admin.user-ID")}}</th>
                                            <th>{{__("admin.username")}}</th>
                                            <th>{{__("admin.image")}}</th>
                                            <th>{{__("admin.Email")}}</th>
                                            <th>{{__("admin.phone")}}</th>
                                            <th>{{__("admin.Date Of join")}}</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)
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
                                                    {{ $user->email ==null ? __("admin.NO EMAIL FOUND"):$user->email }}
                                                </td>
                                                <td>
                                                    {{$user->phone}}
                                                </td>
                                                <td>
                                                    {{ $user->created_at ==null ? __("admin.NO DATE FOUND"):$user->created_at }}
                                                </td>
                                                <td>
                                                    ..
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{$users->links()}}
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
