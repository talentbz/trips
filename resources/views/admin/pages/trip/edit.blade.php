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
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (EN)</label>
                                    <input type="text" class="form-control" name="name_en" required value="{{$trip->trip_name_en}}">
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>CLIENT</label>
                                    <select class="form-select" name="client">
                                        <option value="">Select Client</option>
                                        @foreach($client as $row)
                                        <option value="{{$row->id}}" {{$trip->client_id == $row->id ? 'selected' :''}}>{{$row->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Details</label>
                                    <div>
                                        <textarea class="form-control" rows="5" name="details" value = "{{ $trip->details}}"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (AR)</label>
                                    <input type="text" class="form-control" name="name_ar" required value="{{$trip->trip_name_ar}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>TRIP TYPE</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="trip_type"
                                                    id="trip_type_1"  value = "1" {{$trip->trip_type == 1 ? 'checked' :''}} >
                                                <label class="form-check-label" for="trip_type_1">
                                                    Periodic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="trip_type"
                                                    id="trip_type_2" value = "0" {{$trip->trip_type == 0 ? 'checked' :''}} >
                                                <label class="form-check-label" for="trip_type_2">
                                                    Non-Periodic
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class = "mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> TRIP FREQUANCY  
                                    <span class = "font-size-10 mb-1" >[ONLY FOR PERIODIC TRIP]</span></label>
                                    <div class = "row border rounded border-secondary">
                                        <div class = "trip-frequency-check">
                                            CHOOSE ONE OR MORE
                                        </div>
                                        <div class = "col-md-4">
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    checked value = "0">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Sunday
                                                </label>
                                            </div>
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                     value = "1">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Monday
                                                </label>
                                            </div>
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    value = "2">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Tuesday
                                                </label>
                                            </div>

                                        </div>
                                        <div class = "col-md-4">
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    value = "3">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Wenesday
                                                </label>
                                            </div>
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    value = "4">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Thursday
                                                </label>
                                            </div>
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    value = "5">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Friday
                                                </label>
                                            </div>
                                        </div>
                                        <div class = "col-md-4">
                                            <div class="form-check form-check-warning">
                                                <input class="form-check-input" type="checkbox" id="formCheckcolor4" name = "trip_frequancy"
                                                    value = "6">
                                                <label class="form-check-label" for="formCheckcolor4">
                                                    Saturday
                                                </label>
                                            </div>                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-12">
                        <div class = "row">
                            <div class = "col-md-6">
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> DATE OF FIRST TRIP</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                            data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="first_trip_date" required value="{{$trip->first_trip_date}}">

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>ORIGIN</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_city">
                                                <option value="">Select City</option>
                                                @foreach($city as $row)
                                                <option value="{{$row->id}}" {{$trip->origin_city == $row->id ? 'selected' :''}} >{{$row->city_name_en}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_area">
                                                <option>Select</option>
                                                @foreach($area as $row)
                                                <option value="{{$row->id}}" {{$trip->origin_area == $row->id ? 'selected' :''}} >{{$row->area_name_en}}</option>
                                                @endforeach
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <label for=""><span class = "custom-val-color">*</span>DEPARTURE TIME</label>
                                    <div class="input-group" id="timepicker-input-group1">
                                        <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "departure_time" value = {{ $trip->departure_time}}>
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>SHOW TRIP IN ADMIN APP</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="show_trip_admin"
                                                    id="status_1" value = "1" {{$trip->admin_show == 1 ? 'checked' :''}}  >
                                                <label class="form-check-label" for="status_1">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="show_trip_admin"
                                                    id="status_2" value = "0" {{$trip->admin_show == 0 ? 'checked' :''}} >
                                                <label class="form-check-label" for="status_2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> DATE OF LAST TRIP</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                            data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="last_trip_date" required value = {{$trip->last_trip_date}}>

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>DESTINATION</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="destination_city">
                                                <option value="">Select City</option>
                                                @foreach($city as $row)
                                                <option value="{{$row->id}}" {{$trip->destination_city == $row->id ? 'selected' :''}} >{{$row->city_name_en}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="destination_area">
                                                <option>Select</option>
                                                @foreach($area as $row)
                                                <option value="{{$row->id}}" {{$trip->destination_area == $row->id ? 'selected' :''}} >{{$row->area_name_en}}</option>
                                                @endforeach
                                                
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <label for=""><span class = "custom-val-color">*</span>ARRIVAL TIME</label>
                                    <div class="input-group" id="timepicker-input-group1">
                                        <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "arrival_time" value = {{ $trip->arrival_time }}>
                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_1" value = "1" {{$trip->status == 1 ? 'checked' :''}}>
                                                <label class="form-check-label" for="status_1">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_2" value = "0" {{$trip->status == 0 ? 'checked' :''}}>
                                                <label class="form-check-label" for="status_2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
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
    <script src="{{ URL::asset('/assets/admin/trip/edit.js') }}"></script>
    <script>
        $(document).ready(function(){
            store = "{{route('admin.trip.update', ['trip' => $trip->id])}}";
            list_url = "{{route('admin.trip.index')}}";
            // $("select[name='origin_city']").on("change", function (e) { 
            //     var select_val = $(e.currentTarget).val();
            //     show_url = "{{-- route('admin.miscellaneous.area.show', ['bu' => 1]) --}}";
            //     show_url = show_url.replace(':bu', select_val);
            //     $.ajax({
            //         url: show_url,
            //         method: 'get',
            //         success: function (res) {
            //             result = res.data;
            //             if(result){
            //                 for(i=0; i<result.length; i++ ){
            //                     $("select[name='origin_area']").append('<option value="'+result[i].id+'">'+result[i].area_name_en+'</option>');
            //                 }
            //             }
            //         },
            //         error: function (res){
            //             console.log(res)
            //         },
            //         cache: false,
            //         contentType: false,
            //         processData: false
            //     })
            // })
            // $("select[name='destination_city']").on("change", function (e) { 
            //     var select_val = $(e.currentTarget).val();
            //     show_url = "{{-- route('admin.miscellaneous.area.show', ['bu' => 1]) --}}";
            //     show_url = show_url.replace(':bu', select_val);
            //     $.ajax({
            //         url: show_url,
            //         method: 'get',
            //         success: function (res) {
            //             result = res.data;
            //             if(result){
            //                 for(i=0; i<result.length; i++ ){
            //                     $("select[name='destination_area']").append('<option value="'+result[i].id+'">'+result[i].area_name_en+'</option>');
            //                 }
            //             }
            //         },
            //         error: function (res){
            //             console.log(res)
            //         },
            //         cache: false,
            //         contentType: false,
            //         processData: false
            //     })
            // })
        });
    </script>
@endsection