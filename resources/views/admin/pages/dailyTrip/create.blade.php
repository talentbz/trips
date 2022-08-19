@extends('admin.layouts.master')
@section('title') Client @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection
@section('content')
    <div class="content-warpper">
        <form class="custom-validation" action="" id="custom-form">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>TRIPE NAME</label>
                                    <select class="form-select" name="tripe_name" required>
                                        <option>Select trip</option>
                                        @foreach($trip as $key=>$row)
                                            <option value="{{$row->trip_name_en}}">{{$row->trip_name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>ORIGIN</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_city" required>
                                                <option>Select City</option>
                                                @foreach($city as $key=>$row)
                                                    <option value="{{$row->city_name_en}}" data-id="{{$row->id}}">{{$row->city_name_en}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_area" required>
                                                <option>Select area</option>
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <label><span class="custom-val-color">*</span> START DATE</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                                    data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                                    data-provide="datepicker" name="start_trip_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>                                            
                                        </div>
                                        <div class = "col-md-6">
                                            <label for=""><span class = "custom-val-color">*</span>START TIME</label>
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "start_trip_time">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>BUS SIZE</label>
                                    <select class="form-select" name="bus_size" required>
                                        <option>Select Bus Size</option>
                                        @foreach($bus_size as $key=>$row)
                                            <option value="{{$row->size}}">{{$row->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Details</label>
                                    <div>
                                        <textarea class="form-control" rows="5" name="details"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>TRIP TYPE</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="trip_type"
                                                    id="trip_type_1" value="1">
                                                <label class="form-check-label" for="trip_type_1">
                                                    Periodic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="trip_type"
                                                    id="trip_type_2" value="0">
                                                <label class="form-check-label" for="trip_type_2">
                                                    Non-Periodic
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>SHOW TRIP IN ADMIN APP</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="show_trip_admin"
                                                    id="show_trip_admin_1" value="1">
                                                <label class="form-check-label" for="show_trip_admin_1">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="show_trip_admin"
                                                    id="show_trip_admin_2" value="0">
                                                <label class="form-check-label" for="show_trip_admin_2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>CLIENT</label>
                                    <select class="form-select" name="client" required>
                                        <option>Select Client</option>
                                        @foreach($client as $key=>$row)
                                            <option value="{{$row->name_en}}">{{$row->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>DESTINATION</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="destination_city" required>
                                                <option>Select City</option>
                                                @foreach($city as $key=>$row)
                                                    <option value="{{$row->city_name_en}}" data-id="{{$row->id}}">{{$row->city_name_en}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="destination_area" required>
                                                <option>Select Area</option>
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <label><span class="custom-val-color">*</span> END DATE</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                                    data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                                    data-provide="datepicker" name="end_trip_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>                                            
                                        </div>
                                        <div class = "col-md-6">
                                            <label for=""><span class = "custom-val-color">*</span>END TIME</label>
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "end_trip_time">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>BUS NO.</label>
                                    <select class="form-select" name="bus_no" required>
                                        <option>Select Bus.No</option>
                                        @foreach($bus as $key=>$row)
                                            <option value="{{$row->bus_no}}">{{$row->bus_no}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>DRIVER</label>
                                    <select class="form-select" name="driver" required>
                                        <option>Select Driver</option>
                                        @foreach($driver as $key=>$row)
                                            <option value="{{$row->name_en}}">{{$row->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>STATUS</label>
                                                                          
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_1" value="1">
                                        <label class="form-check-label" for="status_1">
                                            Pending
                                        </label>
                                    </div>                       
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_2" value="2">
                                        <label class="form-check-label" for="status_2">
                                            Accepted
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_3" value="3">
                                        <label class="form-check-label" for="status_3">
                                            Rejected
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_4" value="4">
                                        <label class="form-check-label" for="status_4">
                                            Started
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_5" value="5">
                                        <label class="form-check-label" for="status_5">
                                            Started with a delay
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_6" value="6">
                                        <label class="form-check-label" for="status_6">
                                            Finished
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_7" value="7">
                                        <label class="form-check-label" for="status_7">
                                            Finished with a delay
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="status_8" value="8">
                                        <label class="form-check-label" for="status_8">
                                            Canceled
                                        </label>
                                    </div>    
                                </div>        
                            </div>
                        </div>
                    </div>
                                     
                    
                </div>
                <div class="col-md-5">
                    <img src="{{ URL::asset ('/images/admin/bus.png') }}" alt="" width="100%">
                </div>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light">Back</button>
                <button type="button" class="btn btn-outline-primary waves-effect waves-light reset-btn">Reset</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/dailyTrip/create.js') }}"></script>
    <script>
         $(document).ready(function(){
            store = "{{route('admin.daily_trip.store')}}";
            list_url = "{{route('admin.daily_trip.index')}}";
            origin_area = $("select[name='origin_area']");
            destination_area = $("select[name='destination_area']");
            
            // display area when click origin_city 
            $("select[name='origin_city']").on("change", function (e) { 
                var id = $(this).find(':selected').data('id')
                selectFunction(origin_area, id)
            })
            // display area when click destination_area 
            $("select[name='destination_city']").on("change", function (e) { 
                var id = $(this).find(':selected').data('id')
                selectFunction(destination_area, id)
            })

            function selectFunction(select, id){
                show_url = "{{route('admin.daily_trip.show', ':daily_trip')}}";
                show_url = show_url.replace(':daily_trip', id);
                $.ajax({
                    url: show_url,
                    method: 'get',
                    success: function (res) {
                        result = res.data;
                        if(result){
                            select.empty();
                            select.append("<option>Select area</option>");
                            for(i=0; i<result.length; i++ ){
                                select.append('<option value="'+result[i].area_name_en+'">'+result[i].area_name_en+'</option>');
                            }
                        }
                    },
                    error: function (res){
                        console.log(res)
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            }
        });
    </script>
@endsection