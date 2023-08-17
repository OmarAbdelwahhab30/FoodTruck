@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">

                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">{{__("admin.Cashout Request Details")}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">FoodTruck</a></li>
                                    <li class="breadcrumb-item active">{{__("admin.Cashout Request Details")}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16">{{__("admin.")}}Request #0000{{$element->id}} <span
                                            class="badge bg-warning font-size-12 ms-2">{{__("admin.pending")}}</span></h4>
                                    <div class="text-muted">
                                        <p class="mb-1">{{$element->user->address}}</p>
                                        <p class="mb-1"><i
                                                class="uil uil-envelope-alt me-1"></i> {{$element->user->email}}</p>
                                        <p><i class="uil uil-phone me-1"></i> {{$element->user->phone}}</p>
                                    </div>
                                </div>

                                <hr class="text-black">

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="text-black">
                                            <h5 class="font-size-20 mb-2">{{__("admin.Seller name")}} |{{$element->user->name}}</h5>
                                            <hr class="fw-bold font-size-20">
                                            <p class="mb-1"><span
                                                    class="fw-bold font-size-16">{{__("admin.Account name")}} :</span> {{$element->bank_account->account_name}}
                                            </p>
                                            <p class="mb-1"><span
                                                    class="fw-bold font-size-16">{{__("admin.Bank name")}} :</span> {{$element->bank_account->bank_name}}
                                            </p>
                                            <p class="mb-1"><span
                                                    class="fw-bold font-size-16">{{__("admin.Account number")}} :</span> {{$element->bank_account->account_number}}
                                            </p>
                                            <p class="mb-1"><span
                                                    class="fw-bold font-size-16">{{__("admin.iban")}} :</span> {{$element->bank_account->iban}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="py-2">
                                    <h5 class="font-size-15">{{__("admin.Wallet")}}</h5>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0">
                                            <tbody>
                                            <tr>
                                                <th scope="row" colspan="4" class="text-start">{{__("admin.balance")}} :</th>
                                                <td class="text-start"> {{$element->wallet->balance}}{{__("admin.S.R")}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-start">
                                                    {{__("admin.request to cashout")}} :
                                                </th>
                                                <td class="border-0 text-start">{{$element->amount}} {{__("admin.S.R")}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-print-none mt-4">
                                        <div class="float-start">
                                            <a href="#"
                                               data-bs-toggle="modal" data-bs-target="#dec"
                                               class="btn btn-danger w-md waves-effect waves-light">{{__("admin.Decline")}}</a>


                                            <a href="#"
                                               data-bs-toggle="modal" data-bs-target="#accept"
                                               class="btn btn-success w-md waves-effect waves-light">{{__("admin.Accept")}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="acceptlabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="acceptlabel">{{__("admin.Accept Request")}}</h5>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{__("admin.Are you sure to accept request")}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                        <a type="button" href="{{route("admin.accept.cash",[$element->id,$element->amount])}}" class="btn btn-success">{{__("admin.Accept")}}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="dec" tabindex="-1" role="dialog" aria-labelledby="declabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declabel">{{__("admin.")}}Decline request</h5>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{__("admin.Are you sure to decline the request")}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{__("admin.Close")}}</button>
                        <a type="button" href="{{route("admin.decline.cash",$element->id)}}" class="btn btn-danger">{{__("admin.Decline")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
