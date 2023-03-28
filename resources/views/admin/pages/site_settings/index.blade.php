@extends('admin.layouts.app')

@section('title', 'Site Settings')

@push('css')
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/admin/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">New Order List</h4>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-2">
                        <div class="card-header" style="background-color: rgb(46, 149, 162)">
                            <h4 class="text-white">Wesite</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Website Name</label>
                                        <input type="text" class="form-control" name="website_name" value="{{ $setting->website_name ?? '' }}"  placeholder="Website Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Website Url</label>
                                        <input type="text" class="form-control" value="{{ $setting->website_url ?? '' }}" name="website_url" placeholder="Website Url">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Page Title</label>
                                        <input type="text" class="form-control" value="{{ $setting->page_title ?? '' }}" name="page_title" placeholder="Page Title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Meta Keyword</label>
                                        <textarea name="meta_keyword" class="form-control" rows="5" placeholder="Meta Keyword">{{ $setting->meta_keyword ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="5" placeholder="Meta Description">{{ $setting->meta_description ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" style="background-color: rgb(46, 149, 162)">
                            <h4 class="text-white">Wesite Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control" rows="5" placeholder="Address">{{ $setting->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phone 1</label>
                                        <input type="text" class="form-control" value="{{ $setting->phone1 ?? '' }}" name="phone1" placeholder="Phone1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phone 2</label>
                                        <input type="text" class="form-control" value="{{ $setting->phone2 ?? '' }}" name="phone2" placeholder="Phone2">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email 1</label>
                                        <input type="email" class="form-control" value="{{ $setting->email1 ?? '' }}" name="email1" placeholder="Email1">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email 2</label>
                                        <input type="email" class="form-control" value="{{ $setting->email2 ?? '' }}" name="email2" placeholder="Email2">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header" style="background-color: rgb(46, 149, 162)">
                            <h4 class="text-white">Wesite - Social Media</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""> Facebook  (Optional) </label>
                                        <input type="text" class="form-control" value="{{ $setting->facebook ?? '' }}" name="facebook" placeholder="Facebook">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Twitter (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $setting->twitter ?? '' }}"  name="twitter" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Instagram (Optional)</label>
                                        <input type="text" class="form-control" value="{{ $setting->instagram ?? '' }}"  name="instagram" placeholder="Instagram">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Youtube</label>
                                        <input type="text" class="form-control" value="{{ $setting->youtube ?? '' }}"  name="youtube" placeholder="Youtube">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="pb-5">
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </div>
               </form>
            </div>
        </div>

    </div>
@endsection

@push('script')
       <!-- This is data table -->
       <script src="{{ asset('assets/admin/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
       <script src="{{ asset('assets/admin/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
       <!-- start - This is for export functionality only -->
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
       <!-- end - This is for export functionality only -->
       <script>
           $(function () {
               $('#myTable').DataTable();
               var table = $('#example').DataTable({
                   "columnDefs": [{
                       "visible": false,
                       "targets": 2
                   }],
                   "order": [
                       [2, 'asc']
                   ],
                   "displayLength": 25,
                   "drawCallback": function (settings) {
                       var api = this.api();
                       var rows = api.rows({
                           page: 'current'
                       }).nodes();
                       var last = null;
                       api.column(2, {
                           page: 'current'
                       }).data().each(function (group, i) {
                           if (last !== group) {
                               $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                               last = group;
                           }
                       });
                   }
               });
               // Order by the grouping
               $('#example tbody').on('click', 'tr.group', function () {
                   var currentOrder = table.order()[0];
                   if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                       table.order([2, 'desc']).draw();
                   } else {
                       table.order([2, 'asc']).draw();
                   }
               });
               // responsive table
               $('#config-table').DataTable({
                   responsive: true
               });
               $('#example23').DataTable({
                   dom: 'Bfrtip',
                   buttons: [
                       'copy', 'csv', 'excel', 'pdf', 'print'
                   ]
               });
               $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
           });

       </script>
        {{-- <script>
            function deleteProduct(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.preventDefault();
                        document.getElementById('delete-product-'+id).submit();
                    }
                })
            }
        </script> --}}
@endpush



