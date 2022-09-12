@extends('admin.layouts.master')
@section('title') Areas @endsection
@section('page-title') Areas @endsection
@section('css')
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <!-- add city section -->
                <div class="card add-new-form">
                    <div class="card-body">
                        <form id="custom-form" class="custom-validation" method= "POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class = "col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (EN)</label>
                                                    <input type="text" class="form-control" name="name_en" required>
                                                    <input type="hidden" name="id">
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span> NAME (AR)</label>
                                                    <input type="text" class="form-control" name="name_ar" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span> CITY</label>
                                                    <select class="form-select select-category" name="city" required>
                                                        <option value="">Select type</option>
                                                        @foreach($city as $row)
                                                            <option value="{{$row->id}}">{{$row->city_name_en}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-12">
                                        <div class = "row">
                                            <div class = "col-md-8">
                                                <div id="gmaps-markers" class="gmaps mb-3" style = "height:150px !important"></div>
                                            </div>
                                            <div class = "col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span>LATITUDE</label>
                                                    <input type="text" class="form-control" name="latitude" required>                                                
                                                </div>
                                            </div>

                                            <div class = "col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span>LONGITUDE</label>
                                                    <input type="text" class="form-control" name="longitude" required>                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-12">
                                        <div class = "row">
                                            <div class = "col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check form-radio-warning mb-3">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    id="status_1" value="1" checked>
                                                                <label class="form-check-label" for="status_1">
                                                                    Active
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-radio-warning">
                                                                <input class="form-check-input" type="radio" name="status"
                                                                    id="status_2" value="0">
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
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-outline-primary waves-effect waves-light reset-btn">Reset</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <a href="javascript: void(0);" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD AREA</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >NAME</th>
                                    <th >CITY</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($area as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->area_name_en}}</td>
                                    <td>{{$row->city_name_en}}</td>
                                    <td class="text-center">
                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light edit" data-id="{{$row->id}}">Edit</button>
                                        <!-- <a href="javascript:void(0);" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light confirm_delete" data-id="1" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">Delete</a> -->
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
    
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
    <script src="{{ URL::asset('/assets/libs/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/gmaps.init.js') }}"></script>
        
    <script src="{{ URL::asset('/assets/admin/miscellaneous/area/index.js') }}"></script>
    <script>
        store = "{{route('admin.miscellaneous.area.store')}}";
        list_url = "{{route('admin.miscellaneous.area.index')}}";
    </script>
@endsection
