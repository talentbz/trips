@extends('admin.layouts.master')
@section('title') Client @endsection
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
                            <a href="{{route('admin.super_visor.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD APP SUPERVISOR</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Name</th>
                                    <th>UserName</th>                                                                 
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($supervisor as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->user_name}}</td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Inactive</span>
                                        @endif    
                                    </td>
                                    <td class="text-center">
                                        <!-- <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</button> -->
                                        <a href="{{route('admin.super_visor.edit', ['super_visor' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
                                        <a href="javsciript::void(0)" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light reset-password" data-id="{{$row->id}}" data-src="{{route('admin.super_visor.update', ['super_visor' => $row->id])}}" data-bs-toggle="modal"
                                                data-bs-target="#myModal">Rest Password</button>
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

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">RESET PASSWORD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form class="custom-validation" action="" id="rest-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="mb-3">
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
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light save_button">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/supervisor/index.js') }}"></script>
@endsection
