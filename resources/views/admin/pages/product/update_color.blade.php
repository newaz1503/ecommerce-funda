@extends('admin.layouts.app')

@section('title', 'Edit Product Color')

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
                <h4 class="text-themecolor">Product Color List</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-danger d-none d-lg-block m-l-15"><i class="fas fa-arrow-left"></i>
                        Back</a>
                </div>
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
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <input type="hidden" value="{{$product->id }}"  id="productId" />
                                <tbody>
                                    @foreach ($product->productColors as $key=>$color)
                                        <tr class="closestTrFromQty">
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                @if ($color->color)
                                                    {{$color->color->name }}
                                                 @else
                                                    No Category Available
                                                @endif
                                            </td>
                                            <td>
                                                <span class="mr-1"> Quantity :</span> <input type="number"min="1" class="form-control" id="updateProductColorQty" value="{{$color->quantity}}" style="width:80px">
                                                <button type="submit" value="{{ $color->id }}" class="btn btn-primary btn-sm" id="updateProductColorQtyBtn">Update</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" id="colordeleteBtn" value="{{ $color->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

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
        //update color quantity
        $(document).ready(function(){
            $(document).on('click', '#updateProductColorQtyBtn', function(e){
               let product_color_id =  $(this).val();
               let product_id = $('#productId').val();
               let colorQty = $(this).closest('.closestTrFromQty').find('#updateProductColorQty').val();

               if(colorQty <= 0){
                    alert('Quantity is required');
                    return false;
               }
               $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            let data = {
                'product_id' : product_id,
                'colorQty' : colorQty
            }
            $.ajax({
                type: "POST",
                url: "/admin/color/product-color/"+product_color_id,
                data: data,
                success: function(res){
                    alert(res.message)
                }
            })

            })
        })
         //delete color quantity
         $(document).ready(function(){
            $(document).on('click', '#colordeleteBtn', function(e){
               let product_color_id =  $(this).val();
              let colorthis = $(this);
               $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                type: "GET",
                url: "/admin/color/product-color-delete/"+product_color_id,
                success: function(res){
                    colorthis.closest('.closestTrFromQty').remove();
                    alert(res.message)
                }
            })

            })
        })


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
        </script>
@endpush



