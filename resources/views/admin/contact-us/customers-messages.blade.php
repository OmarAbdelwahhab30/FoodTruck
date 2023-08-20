@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Customers Messages")}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Customers Messages")}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @forelse ($messages as $message)
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{$message->user->image}}" style="border-radius: 50%" width="50" height="50"/>
                                    <h4 class="card-title">{{$message->user->name}}</h4>

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#navtabs-home{{$message->id}}" role="tab">
                                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                <span class="d-none d-sm-block">{{__("admin.Message")}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#navtabs-profile{{$message->id}}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                <span class="d-none d-sm-block">{{__("admin.Profile")}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#navtabs-messages{{$message->id}}" role="tab">
                                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                <span class="d-none d-sm-block">{{__("admin.All-Previous-Messages")}}</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="navtabs-home{{$message->id}}" role="tabpanel">
                                            <p class="mb-0">
                                                {{$message->content}}
                                            </p>
                                        </div>
                                        <div class="tab-pane" id="navtabs-profile{{$message->id}}" role="tabpanel">
                                            <div class="card-body">
                                                <h4 class="card-title">{{__("admin.User Information")}}</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-sm m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{__("admin.First Name")}}</th>
                                                            <th>{{__("admin.email")}}</th>
                                                            <th>{{__("admin.phone")}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{$message->user->name}}</td>
                                                            <td>{{$message->user->email}}</td>
                                                            <td>{{$message->user->phone}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="navtabs-messages{{$message->id}}" role="tabpanel">
                                            @forelse($message->user->contact_us as $con)
                                                <div class="card-body">
                                                    <h5 class="card-title">..</h5>
                                                    <p class="card-text">{{$con->content}}</p>
                                                    <p class="card-text"><small class="text-muted">{{$con->created_at}}</small></p>
                                                </div>
                                            @empty
                                                <div class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                                                    <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                                                    <p>{{__("admin.No Previous messages to show")}}</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                                    </button>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

                @empty
                    <div class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                        <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                        <p>{{__("admin.No messages to show")}}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endforelse
                {{$messages->links()}}
            </div><!-- container-fluid -->
        </div>
        <!-- End Page-content -->
@endsection
