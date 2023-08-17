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
                            <h4 class="mb-0">{{__("admin.Accepted Requests")}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Accepted Requests")}}</li>
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
                                    @if(!empty($accepted[0]))
                                    <tr class="bg-transparent" role="row">
                                        <th style="width: 24px;" class="sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label=": activate to sort column descending">
                                            <div class="form-check text-center font-size-16">
                                                <input type="checkbox" class="form-check-input" id="ordercheck">
                                                <label class="form-check-label" for="ordercheck"></label>
                                            </div>
                                        </th>
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
                                    @endif
                                    </thead>
                                    <tbody>
                                    @forelse($accepted as $accept )
                                    <tr role="row" class="odd">
                                        <td class="sorting_1 dtr-control">
                                            <div class="form-check text-center font-size-16">
                                                <input type="checkbox" class="form-check-input"
                                                       id="ordercheck1">
                                                <label class="form-check-label" for="ordercheck1"></label>
                                            </div>
                                        </td>

                                        <td><a href="javascript: void(0);" class="text-dark fw-bold">#000{{$accept->id}}</a>
                                        </td>
                                        <td>
                                            {{$accept->created_at}}
                                        </td>
                                        <td>{{$accept->wallet->balance}}</td>

                                        <td>
                                            {{$accept->amount}}
                                        </td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#del"  class="btn btn-soft-danger px-3 text-black text-decoration-none">
                                                {{__("admin.Delete Request")}}
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#return" class="btn btn-soft-danger px-3 text-black text-decoration-none">
                                                {{__("admin.Return Amount")}}
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
                                                    <a type="button" href="{{route("admin.delete.request",$accept->id)}}" class="btn btn-danger">{{__("admin.Delete")}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="returnll" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="returnll">{{__("admin.Return request")}}</h5>
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{__("admin.Are you sure to return the request")}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                                                    <a type="button" href="{{route("admin.return.request",[$accept->id,$accept->amount])}}"
                                                       class="btn btn-soft-danger">{{__("admin.Return")}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="h-100 d-flex align-items-center justify-content-center">
                                        <div class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                                            <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>
                                            <p>{{__("admin.There is no accepted requests until now")}}</p>
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
