@extends('admin.layouts.master')
@section('title') Client @endsection
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
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class = "mb-3">
                                             <span class = "font-size-16"> ADD CITY</span>   
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="custom-val-color">*</span> NAME (EN)</label>
                                                <input type="text" class="form-control" name="name_en" required>
                                                <input type="hidden" name="id">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"><span class="custom-val-color">*</span> STATUS</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check form-radio-warning mb-3">
                                                            <input class="form-check-input" type="radio" name="status"
                                                                id="status_1" value="1">
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
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label"><span class="custom-val-color">*</span> NAME (AR)</label>
                                                <input type="text" class="form-control" name="name_ar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
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
                        <div class = "mb-3">
                            <span class = "font-size-16">LIST OF CITIES </span>   
                        </div>
                        <div class="table-filter">
                            <a href="javascript: void(0);" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD CITY</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($city as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
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
 <!-- delete modal content -->
 <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel"> Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you delete seleted user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light delete_button">Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/miscellaneous/city/index.js') }}"></script>
    <script>
        store = "{{route('admin.miscellaneous.city.store')}}";
        list_url = "{{route('admin.miscellaneous.city.index')}}";
    </script>
@endsection
