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
        <form id="custom-form" class="custom-validation" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> BUS NO</label>
                                    <select class="form-select" name="bus_no" required>
                                        <option value="">Select Bus No. </option>
                                        @foreach($bus as $row)
                                        <option value="{{$row->id}}" {{$bus_maintenace->bus_no == $row->id ? "selected" : ""}}>{{$row->bus_no}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> TYPE</label>
                                    <select class="form-select" name="maintenace_type" required>
                                        <option value="">Select Tyepe</option>
                                        @foreach($bus_maintenace_type as $row)
                                        <option value="{{$row->id}}" {{$bus_maintenace->maintanence_type_id == $row->id ? "selected" : ""}}>{{$row->type_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> DETAILS</label>
                                    <div>
                                        <textarea class="form-control" rows="3" name="details">{{$bus_maintenace->details}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> DATE</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                            data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="date" value="{{$bus_maintenace->maintanence_date}}" required>
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> COST</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="cost" value="{{$bus_maintenace->cost}}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">JOD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ URL::asset ('/images/admin/add-bus.png') }}" alt="" width="100%">
                </div>
                <div class="col-md-2"></div>
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
    <script src="{{ URL::asset('/assets/admin/busMaintenance/edit.js') }}"></script>
    <script>
        store = "{{route('admin.maintenance.update', ['maintenance' => 1])}}";
        list_url = "{{route('admin.maintenance.index')}}";
    </script>
@endsection