@extends("admin.includes.app")
@section("content")
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Payments List")}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if(!empty($payments[0]))
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-centered datatable dt-responsive nowrap table-card-list dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px 12px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr class="bg-transparent" role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-label="Invoice ID: activate to sort column ascending">{{__("admin.Payment id")}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 109px;" aria-label="Date: activate to sort column ascending">{{__("admin.Date")}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Billing Name: activate to sort column ascending">{{__("admin.Customer Name")}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 93px;" aria-label="Amount: activate to sort column ascending">{{__("admin.amount")}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 79px;" aria-label="Status: activate to sort column ascending">{{__("admin.Status")}}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Download Pdf: activate to sort column ascending">
                                                    Download Pdf
                                                </th>
                                                <th style="width: 120px;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">{{__("admin.Action")}}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $payment)
                                                <tr role="row" class="even">
                                                    <td><a href="javascript: void(0);" class="text-dark fw-bold">#0000{{$payment->id}}</a>
                                                    </td>
                                                    <td>
                                                        {{$payment->created_at}}
                                                    </td>
                                                    <td>{{$payment->user->name}}</td>
                                                    <td>
                                                        {{$payment->order->total_price}} S.R
                                                    </td>
                                                    <td>
                                                        <div class="badge bg-soft-success font-size-12">{{$payment->status}}</div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route("admin.payments.details.display",$payment->id)}}" class="px-3 text-primary">
                                                            <i class="uil uil-eye font-size-18">
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
                @else
                    <div
                        class="alert alert-border alert-border-info alert-dismissible fade show mt-4 px-4 mb-0 text-center"
                        role="alert">
                        <i class="uil uil-question-circle d-block display-4 mt-2 mb-3 text-info"></i>

                        <p>{{__("admin.There is no payments to show")}}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->
    </div>
@endsection
