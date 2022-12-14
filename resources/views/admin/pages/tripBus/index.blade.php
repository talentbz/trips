@extends('admin.layouts.master')
@section('title') List of Trip Bus @endsection
@section('page-title') List of Trip Bus @endsection
@section('css')
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <!--Bus List section -->
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <a href="{{route('admin.trip_bus.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD TRIP BUS</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >TRIP NAME</th>
                                    <th>BUS NO.</th>
                                    <th>BUS SIZE</th>
                                    <th>DRIVER</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>                                                             
                              
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($trip_bus as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->trip_name_en}}</td>
                                    <td>{{$row->bus_no}}</td>
                                    <td>{{$row->bus_size}}</td>
                                    <td>{{$row->name_en}}</td>
                                    <td>
                                        <div class="form-check form-switch form-switch-lg text-center">
                                            <input class="form-check-input price-status mx-auto" type="checkbox" {{$row->status == 1 ? "checked" :""}} value="{{$row->id}}" >
                                        </div>    
                                    </td>
                                    <td class="text-center">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</button>
                                        <a href="{{route('admin.trip_bus.edit', ['trip_bu' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
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
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        status_url = "{{route('admin.trip_bus.status')}}"
    </script>
    <script>
       $(document).ready(function(){
            $(".reset-btn").click(function(){
                $("#custom-form").trigger("reset");
            });
            // $("#custom-form").hide()
            $(".add-new").click(function(){
                $("#custom-form").slideUp(1000);
            });
            $('.price-status').change(function(){
                var status= $(this).prop('checked');
                var id=$(this).val();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    dataType:'JSON',
                    url:status_url,
                    data:{status:status, id:id},
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
        });
    </script>
@endsection
