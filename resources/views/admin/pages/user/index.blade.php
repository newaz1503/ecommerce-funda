@extends('admin.layouts.app')

@section('title', 'Users')

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
            <div class="col-md-12 align-self-center d-flex justify-content-between">
                <h4 class="text-themecolor">Users</h4>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create User</a>
            </div>
            <div class="col-md-7 align-self-center text-right">

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
                        <div class="table-responsive m-t-40">
                            <table id="example23"
                                class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Email</th>

                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name ?? '' }}</td>
                                            <td>{{ $user->email ?? '' }}</td>
                                            <td>
                                                @if($user->role_as == '1')
                                                    <span class="badge btn-success">Admin</span>
                                                @elseif($user->role_as == '0')
                                                    <span class="badge btn-primary">User</span>
                                                @else
                                                <span class="badge btn-danger">None</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="deleteUser({{$user->id}})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <form id="delete-user-{{$user->id}}" action="{{route('admin.user.destroy', $user->id)}}" method="POST" style="display: none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
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
        <script>
            function deleteUser(id) {
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
                        document.getElementById('delete-user-'+id).submit();
                    }
                })
            }
        </script>
@endpush



