@extends('admin.layouts.master')
@section('title') Client @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/admin/driver/style.css')}}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
    <div class="content-warpper">
        <form class="custom-validation" method="post" id="custom-form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$driver->id}}" />
            <div class="row">
                <div class="col-md-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{ isset($driver->profile_image) ? asset('/uploads/driver').'/'.($driver->profile_image):asset('/images/admin/user-profile.jpg') }}" class="picture-src" id="wizardPicturePreview" title="">
                                    <input type="file" id="wizard-picture" name="file" class="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (EN)</label>
                                    <input type="text" class="form-control" name="name_en" value="{{$driver->name_en}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> AGE</label>
                                    <input type="number" class="form-control" name="age" value="{{$driver->age}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> LICENSE NUMBER</label>
                                    <input type="text" class="form-control" name="license_number" value="{{$driver->license_number}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ADDRESS</label>
                                    <div>
                                        <textarea class="form-control" rows="3" name="address">{{$driver->address}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> USER NAME</label>
                                    <input type="text" class="form-control" name="user_name" value="{{$driver->user_name}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (AR)</label>
                                    <input type="text" class="form-control" name="name_ar" value="{{$driver->name_ar}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> PHONE</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+ 962</span>
                                        </div>
                                        <input data-parsley-type="number" type="text" class="form-control" name="phone" value="{{$driver->phone}}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label><span class="custom-val-color">*</span> LICENSE EXPIRY DATE</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                            data-date-format="yyyy-mm-dd" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="license_expiry_date" value="{{$driver->license_expiry_date}}" required>
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div><!-- input-group -->
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> Password</label>
                                    <div>
                                        <input type="password" id="pass2" class="form-control" name="password" value="{{$driver->password}}" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> Confirm Password</label>
                                    <div>
                                        <input type="password" class="form-control" required data-parsley-equalto="#pass2" value="{{$driver->password}}" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_1" value="1" {{$driver->status == 1 ? "checked" : ""}}>
                                                <label class="form-check-label" for="status_1">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_2" value="0" {{$driver->status == 0 ? "checked" : ""}}>
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
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <img src="{{ URL::asset ('/images/admin/driver.png') }}" alt="" width="100%">
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
    <script src="{{ URL::asset('/assets/admin/driver/edit.js') }}"></script>
    <script>
        store = "{{route('admin.driver.store')}}";
        list_url = "{{route('admin.driver.index')}}";
    </script>
@endsection