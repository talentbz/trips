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
                                    <label><span class="custom-val-color">*</span>CLIENT</label>
                                    <select class="form-select" name="client">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>ORIGIN</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_city">
                                                <option>Select</option>
                                                <option>city1</option>
                                                <option>city2</option>
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_area">
                                                <option>Select</option>
                                                <option>Area 1</option>
                                                <option>Area 2</option>
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <label><span class="custom-val-color">*</span> START DATE</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                                    data-provide="datepicker" name="first_trip_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>                                            
                                        </div>
                                        <div class = "col-md-6">
                                            <label for=""><span class = "custom-val-color">*</span>START TIME</label>
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "arrival_time">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>BUS SIZE</label>
                                    <select class="form-select" name="client">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
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
                                                    id="trip_type_1" checked>
                                                <label class="form-check-label" for="trip_type_1">
                                                    Periodic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="trip_type"
                                                    id="trip_type_2">
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
                                                    id="status_1" checked>
                                                <label class="form-check-label" for="status_1">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="show_trip_admin"
                                                    id="status_2">
                                                <label class="form-check-label" for="status_2">
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
                                    <select class="form-select" name="client">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label><span class="custom-val-color">*</span>DESTINATION</label>
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_city">
                                                <option>Select</option>
                                                <option>city1</option>
                                                <option>city2</option>
                                            </select>  
                                        </div>
                                        <div class = "col-md-6">
                                            <select class="form-select" name="origin_area">
                                                <option>Select</option>
                                                <option>Area 1</option>
                                                <option>Area 2</option>
                                            </select> 
                                        </div>
                                    </div>                                     
                                </div>
                                <div class = "mb-3">
                                    <div class = "row">
                                        <div class = "col-md-6">
                                            <label><span class="custom-val-color">*</span> END DATE</label>
                                            <div class="input-group" id="datepicker1">
                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                                    data-provide="datepicker" name="first_trip_date" required>

                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            </div>                                            
                                        </div>
                                        <div class = "col-md-6">
                                            <label for=""><span class = "custom-val-color">*</span>END TIME</label>
                                            <div class="input-group" id="timepicker-input-group1">
                                                <input id="timepicker" type="text" class="form-control" data-provide="timepicker" name = "arrival_time">
                                                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>BUS NO.</label>
                                    <select class="form-select" name="client">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span>DRIVER</label>
                                    <select class="form-select" name="client">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                                <div class = "mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span>STATUS</label>
                                                                          
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_1" checked>
                                        <label class="form-check-label" for="trip_type_1">
                                            Pending
                                        </label>
                                    </div>                       
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Accepted
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Rejected
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Started
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Started with a delay
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Finished
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
                                            Finished with a delay
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-warning">
                                        <input class="form-check-input" type="radio" name="trip_type"
                                            id="trip_type_2">
                                        <label class="form-check-label" for="trip_type_2">
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
    <script>
        $(document).ready(function(){
            $(".reset-btn").click(function(){
                $("#custom-form").trigger("reset");
            });
        });
    </script>
@endsection