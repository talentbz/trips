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
                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> BUS NO</label>
                                    <input type="text" class="form-control" name="bus_no" required>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> BUS SIZE</label>
                                    <select class="form-select" name="bus_size" required>
                                        <option value="">Select bus size</option>
                                        @foreach($bus_size as $row)
                                        <option value="{{$row->id}}">{{$row->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> LICENSE NUMBER</label>
                                    <input data-parsley-type="number" type="text" class="form-control" name="license_number" required>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> LICENSE EXPIRY DATE</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="start_date" required>
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> TYPE</label>
                                    <select class="form-select" name="bus_type" required>
                                        <option>Select</option>
                                        @foreach($bus_type as $row)
                                        <option value="{{$row->id}}">{{$row->type_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> MODEL</label>
                                    <select class="form-select" name="bus_model" required>
                                        <option>Select model</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> SELECT MODEL YEAR</label>
                                    <select class="form-select" name="model_year" required>
                                        <option>Select Model Year</option>
                                        @foreach($model_year as $row)
                                        <option value="{{$row}}">{{$row}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> OWNERSHIP</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="ownership"
                                                    id="owned">
                                                <label class="form-check-label" for="owned">
                                                    Owned
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="ownership"
                                                    id="rented">
                                                <label class="form-check-label" for="rented">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_1">
                                                <label class="form-check-label" for="status_1">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_2">
                                                <label class="form-check-label" for="status_2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="{{ URL::asset ('/images/admin/add-bus.png') }}" alt="" width="100%">
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
    <script src="{{ URL::asset('/assets/admin/bus/index.js') }}"></script>
    <script>
        $(document).ready(function(){
            store = "{{route('admin.bus.store')}}";
            list_url = "{{route('admin.bus.index')}}";
            $("select[name='bus_type']").on("change", function (e) { 
                var select_val = $(e.currentTarget).val();
                show_url = "{{route('admin.bus.show', ['bu' => 1])}}";
                alert(show_url);
                $.ajax({
                    url: show_url
                    method: 'get',
                    success: function (res) {
                        // result = res.data;
                        // if(result){
                        //     $("input[name='id']").val(id)
                        //     $("input[name='name_en']").val(result.type_en)   
                        //     $("input[name='name_ar']").val(result.type_ar)
                        //     if(result.status == 1){
                        //         $("input[name='status'][value='1']").prop('checked', true);
                        //     } else {
                        //         $("input[name='status'][value='0']").prop('checked', true);
                        //     }  
                        // }
                    },
                    error: function (res){
                        console.log(res)
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })
        });
    </script>
@endsection