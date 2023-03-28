@extends('admin.layouts.app')

@section('title', 'Order')

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
            <div class="col-md-7 align-self-center text-right">
                 <a href="{{ route('admin.orders.history') }}" class="btn btn-info">Order History</a>
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
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Filter by date</label>
                                    <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" class="form-control" style="background-color: #fff; color:#000">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Filter by status</label>
                                    <select name="status" id="" class="form-control" style="background-color: #fff; color:#000">
                                        <option value="" selected>Select Status</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="out of delivery" {{ Request::get('status') == 'out of delivery' ? 'selected' : '' }}>Out of Delivery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-primary btn-sm d-block mt-2">Search</button>
                                </div>

                            </div>
                        </div>
                    </form>
                        <div class="table-responsive m-t-40">
                            <table id="example23"
                                class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Username</th>
                                        <th>Order Date</th>
                                        <th>Tracking No</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $key=>$order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->name ?? '' }}</td>
                                            <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                            <td>{{ $order->tracking_no ?? '' }}</td>
                                            <td>{{ $order->total_price ?? '' }}</td>
                                            <td>
                                                @if ($order['status'] == 'completed')
                                                    <span class="label label-success">Completed</span>
                                                @elseif($order['status'] == "in progress")
                                                    <span class="label label-danger">In Progress</span>
                                                @elseif($order['status'] == 'cancelled')
                                                    <span class="label label-danger">Cancelled</span>
                                                @elseif($order['status'] == 'out of delivery')
                                                    <span class="label label-danger">Out of Delivery</span>
                                                @else
                                                   <span class="label label-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.orders.details', $order->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                                {{-- <button class="btn btn-danger btn-sm" onclick="deleteProduct({{$product->id}})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-product-{{$product->id}}" action="{{route('admin.product.destroy', $product->id)}}" method="POST" style="display: none">
                                                    @csrf
                                                    @method('delete')
                                                </form> --}}
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



