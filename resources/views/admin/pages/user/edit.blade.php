@extends('admin.layouts.master')
@section('title') Edit Users @endsection
@section('page-title') Edit Users @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/admin/user/style.css')}}" rel="stylesheet" type="text/css" >
@endsection
@section('content')
    <div class="content-warpper">
        <form class="custom-validation" action="" id="custom-form">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}" />
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ isset($user->avatar) ? asset('/uploads/user').'/'.($user->avatar):asset('/images/admin/user-profile.jpg') }}" class="picture-src" id="wizardPicturePreview" title="">
                                        <input type="file" id="wizard-picture" name="file" class="">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> NAME</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> PHONE</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+ 962</span>
                                        </div>
                                        <input data-parsley-type="number" type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="role"
                                                    id="level_1" value="1" {{$user->role == 1 ? "checked" : ""}}>
                                                <label class="form-check-label" for="level_1">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="role"
                                                    id="level_2" value="0" {{$user->role == 0 ? "checked" : ""}}>
                                                <label class="form-check-label" for="level_2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> USER NAME</label>
                                    <input type="text" class="form-control" name="user_name" value="{{$user->user_name}}" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> PASSWORD</label>
                                    <div>
                                        <input type="password" id="pass2" class="form-control" name="password" required />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> CONFIRM PASSWORD</label>
                                    <div>
                                        <input type="password" class="form-control" required data-parsley-equalto="#pass2" />
                                    </div>
                                </div> -->
                                <div class="mb-3">
                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning mb-3">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_1" value="1" {{$user->status == 1 ? "checked" : ""}}>
                                                <label class="form-check-label" for="status_1">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-radio-warning">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="status_2" value="0" {{$user->status == 0 ? "checked" : ""}}>
                                                <label class="form-check-label" for="status_2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="button-group">
                <a href="{{ URL::previous()}}" class="btn btn-outline-primary waves-effect waves-light">Back</a>
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
    <script src="{{ URL::asset('/assets/admin/user/index.js') }}"></script>
    <script>
        store = "{{route('admin.user.store')}}";
        list_url = "{{route('admin.user.index')}}";
    </script>
@endsection