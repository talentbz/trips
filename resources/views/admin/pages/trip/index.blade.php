@extends('admin.layouts.master')
@section('title') List of Trips @endsection
@section('page-title') List of Trips @endsection
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
                            <a href="{{route('admin.trip.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD TRIP</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >NAME</th>
                                    <th>CLIENT</th>
                                    <th>ORIGIN</th>
                                    <th>DESTINATION</th>
                                    <th>PERIOD</th>
                                    <th>DURATION</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>                                                             
                              
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($trip as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->trip_name_en}}</td>
                                    <td>{{$row->client_name}}</td>
                                    <td>{{$row->origin_city_name_en}} {{$row->origin_area_name_en}}</td>
                                    <td>{{$row->destination_city_name_en}} {{$row->destination_area_name_en}}</td>
                                    <td>{{$row->first_trip_date}} - {{$row->last_trip_date}}</td>
                                    <td>{{$row->departure_time}}-{{$row->arrival_time}}</td>
                                    <td>
                                        <div class="form-check form-switch form-switch-lg text-center">
                                            <input class="form-check-input price-status mx-auto" type="checkbox" {{$row->status == 1 ? "checked" :""}} value="{{$row->id}}" >
                                        </div>    
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</button>
                                        <a href="{{route('admin.trip.edit',['trip' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        status_url = "{{route('admin.trip.status')}}"
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
