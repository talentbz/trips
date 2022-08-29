@extends('admin.layouts.master')
@section('title') User @endsection
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
                            <a href="{{route('admin.user.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD DRIVER</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Name</th>
                                    <th>Level</th>
                                    <th>User Name</th>                               
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->role==1 ? "Admin" : "Editor"}}</td>
                                    <td>{{$row->user_name}}</td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Inactive</span>
                                        @endif    
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('admin.user.edit', ['user' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
                                        <a href="javsciript::void(0)" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Rest Password</button>
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
@endsection