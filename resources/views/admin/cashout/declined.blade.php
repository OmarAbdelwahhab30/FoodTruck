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
                            <h4 class="mb-0">{{__("admin.Declined Requests")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Declined Requests")}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    class="table table-centered datatable dt-responsive nowrap table-card-list dataTable no-footer dtr-inline"
                                    style="border-collapse: collapse; border-spacing: 0px 12px; width: 100%;"
                                    id="DataTables_Table_0" role="grid"
                                    aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    @if(!empty($declined[0]))
                                    <tr class="bg-transparent" role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 128px;"
                                            aria-label="Order ID: activate to sort column ascending">{{__("admin.Request ID")}}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 139px;"
                                            aria-label="Date: activate to sort column ascending">{{__("admin.Date")}}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 175px;"
                                            aria-label="Billing Name: activate to sort column ascending">{{__("admin.Wallet balance")}}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" style="width: 87px;"
                                            aria-label="Total: activate to sort column ascending">{{__("admin.amount")}}
                                        </th>
                                        <th style="width: 120px;" class="sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-label="Action: activate to sort column ascending">{{__("admin.Action")}}
                                        </th>
                                    </tr>
                                    </thead>
                                    @endif
                                    <tbody>
                                    @forelse($declined as $dec )
                                        <tr role="row" class="odd">
                                            <td><a href="javascript: void(0);" class="text-dark fw-bold">#000{{$dec->id}}</a>
                                            </td>
                                            <td>
                                                {{$dec->created_at}}
                                            </td>
                                            <td>{{$dec->wallet->balance}}</td>

                                            <td>
                                                {{$dec->amount}}
                                            </td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#del"  class="btn btn-soft-danger px-3 text-black text-decoration-none">
                                                    {{__("admin.Delete Request")}}
                                                </button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#return" class="btn btn-soft-success px-3 text-black text-decoration-none">
                                                    {{__("admin.Accept Request")}}
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="dell" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="dell">{{__("admin.Delete request")}}</h5>
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{__("admin.Are you sure to delete the request")}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                        <a type="button" href="{{route("admin.delete.request",$dec->id)}}" class="btn btn-danger">{{__("admin.Delete")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="returnll" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="returnll">{{__("admin.Accept Request")}}</h5>
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{__("admin.Are you sure to accept the request")}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                        <a type="button" href="{{route("admin.accept.cash",[$dec->id,$dec->amount])}}"
                                                           class="btn btn-soft-success">{{__("admin.Accept")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                            <div class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                                                <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                                                <p>{{__("admin.There is no declined requests until now")}}</p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                </button>
                                            </div>
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end table -->
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    </div>
@endsection
