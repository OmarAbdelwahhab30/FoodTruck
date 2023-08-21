@extends("admin.includes.app")
@section("content")
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0">Invoice List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                    <li class="breadcrumb-item active">Invoice List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <button type="button" class="btn btn-success waves-effect waves-light mb-3"><i class="mdi mdi-plus me-1"></i> Add Invoice</button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="float-end">
                            <div class=" mb-3">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                    <input type="text" class="form-control text-start" placeholder="From" name="From">
                                    <input type="text" class="form-control text-start" placeholder="To" name="To">

                                    <button type="button" class="btn btn-primary"><i class="mdi mdi-filter-variant"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive mb-4">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-centered datatable dt-responsive nowrap table-card-list dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px 12px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr class="bg-transparent" role="row"><th style="width: 24px;" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="




                                                : activate to sort column descending">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                        <label class="form-check-label" for="invoicecheck"></label>
                                                    </div>
                                                </th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-label="Invoice ID: activate to sort column ascending">Invoice ID</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 109px;" aria-label="Date: activate to sort column ascending">Date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Billing Name: activate to sort column ascending">Billing Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 93px;" aria-label="Amount: activate to sort column ascending">Amount</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 79px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Download Pdf: activate to sort column ascending">Download Pdf</th><th style="width: 120px;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
                                            </thead>
                                            <tbody>













                                            <tr role="row" class="odd">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck1">
                                                        <label class="form-check-label" for="invoicecheck1"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0131</a> </td>
                                                <td>
                                                    10 Jul, 2020
                                                </td>
                                                <td>Connie Franco</td>

                                                <td>
                                                    $141
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck2">
                                                        <label class="form-check-label" for="invoicecheck2"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0130</a> </td>
                                                <td>
                                                    09 Jul, 2020
                                                </td>
                                                <td>Paul Reynolds</td>

                                                <td>
                                                    $153
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck3">
                                                        <label class="form-check-label" for="invoicecheck3"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0129</a> </td>
                                                <td>
                                                    09 Jul, 2020
                                                </td>
                                                <td>Ronald Patterson</td>

                                                <td>
                                                    $220
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-warning font-size-12">Pending</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck4">
                                                        <label class="form-check-label" for="invoicecheck4"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0128</a> </td>
                                                <td>
                                                    08 Jul, 2020
                                                </td>
                                                <td>Adella Perez</td>

                                                <td>
                                                    $175
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck5">
                                                        <label class="form-check-label" for="invoicecheck5"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0127</a> </td>
                                                <td>
                                                    07 Jul, 2020
                                                </td>
                                                <td>Theresa Mayers</td>

                                                <td>
                                                    $160
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck6">
                                                        <label class="form-check-label" for="invoicecheck6"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0126</a> </td>
                                                <td>
                                                    06 Jul, 2020
                                                </td>
                                                <td>Michael Wallace</td>

                                                <td>
                                                    $150
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck7">
                                                        <label class="form-check-label" for="invoicecheck7"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0125</a> </td>
                                                <td>
                                                    05 Jul, 2020
                                                </td>
                                                <td>Oliver Gonzales</td>

                                                <td>
                                                    $165
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-warning font-size-12">Pending</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck8">
                                                        <label class="form-check-label" for="invoicecheck8"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0124</a> </td>
                                                <td>
                                                    05 Jul, 2020
                                                </td>
                                                <td>David Burke</td>

                                                <td>
                                                    $170
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="odd">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck9">
                                                        <label class="form-check-label" for="invoicecheck9"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0123</a> </td>
                                                <td>
                                                    04 Jul, 2020
                                                </td>
                                                <td>Willie Verner</td>

                                                <td>
                                                    $140
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-warning font-size-12">Pending</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr><tr role="row" class="even">
                                                <td class="sorting_1 dtr-control">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck10">
                                                        <label class="form-check-label" for="invoicecheck10"></label>
                                                    </div>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-bold">#MN0122</a> </td>
                                                <td>
                                                    03 Jul, 2020
                                                </td>
                                                <td>Felix Perry</td>

                                                <td>
                                                    $155
                                                </td>
                                                <td>
                                                    <div class="badge bg-soft-success font-size-12">Paid</div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-light btn-sm w-xs">Pdf <i class="uil uil-download-alt ms-2"></i></button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0);" class="px-3 text-primary"><i class="uil uil-pen font-size-18"></i></a>
                                                    <a href="javascript:void(0);" class="px-3 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr></tbody>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>2023 © Minible.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/" target="_blank" class="text-reset">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
