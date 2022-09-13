@extends('admin.layouts.master')
@section('title') List of Client @endsection
@section('page-title') List of Clients @endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <a href="{{route('admin.client.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light"><i class="fas fa-plus"></i> ADD CLIENT</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Name</th>
                                    <th >Type</th>
                                    <th >Contract Type</th>
                                    <th >Start Date</th>
                                    <th >End Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name_en}}</td>
                                    <td>{{$row->client_type_name_en}}</td>
                                    <td>{{$row->contract_type_name_en}}</td>
                                    <td>{{$row->contract_start_date}}</td>
                                    <td>{{$row->contract_end_date}}</td>
                                    <td class="text-center">
                                        <!-- <input type="checkbox" id="switch8" switch="warning" {{$row->status == 1 ? "checked" :""}} value="{{$row->id}}" />
                                        <label for="switch8" data-on-label="Yes" data-off-label="No"></label> -->
                                        <div class="form-check form-switch form-switch-lg text-center">
                                            <input class="form-check-input price-status mx-auto" type="checkbox" {{$row->status == 1 ? "checked" :""}} value="{{$row->id}}" >
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">View</button>
                                        <a href="{{route('admin.client.edit', ['client' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        $(document).ready(function(){
            $('.price-status').change(function(){
                var status= $(this).prop('checked');
                var id=$(this).val();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'PUT',
                    dataType:'JSON',
                    url:"{{route('admin.client.index')}}" + "/" + id,
                    data:{status:status},
                    success:function(res){
                        if(res.result == "success" ){
                            toastr["success"]("Success!!!");
                        }
                    }
                })
            })
            if ( $.fn.dataTable.isDataTable( '#datatable' ) ) {
                table = $('#datatable').DataTable({
	                bDestroy: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf'
                    ]
                });
            }
            else {
                table = $('#datatable').DataTable( {
                    paging: false
                } );
            }
        });
    </script>
@endsection
