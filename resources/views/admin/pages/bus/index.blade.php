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
                            <a href="{{route('admin.bus.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD CLIENT</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Type</th>
                                    <th>Model</th>
                                    <th>Bus No.</th>           
                                    <th>Bus Size</th>           
                                    <th>Owership</th>                                    
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bus as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->type_en}}</td>
                                    <td>{{$row->model_en}}</td>
                                    <td>{{$row->bus_no}}</td>
                                    <td>{{$row->size}}</td>
                                    <td>
                                        @if($row->owner_ship == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Owered</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Rented</span>
                                        @endif    
                                    </td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Inactive</span>
                                        @endif     
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</button>
                                        <a href="{{route('admin.bus.edit', ['bu' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
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
    <script>
       $(document).ready(function(){
            $(".reset-btn").click(function(){
                $("#custom-form").trigger("reset");
            });
            // $("#custom-form").hide()
            $(".add-new").click(function(){
                $("#custom-form").slideUp(1000);
            });
        });
    </script>
@endsection
