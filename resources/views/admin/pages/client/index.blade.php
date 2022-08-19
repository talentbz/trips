@extends('admin.layouts.master')
@section('title') Client @endsection
@section('css')
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <a href="{{route('admin.client.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light"><i class="fas fa-plus"></i> ADD CLIENT</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Name</th>
                                    <th >Type</th>
                                    <th >Contract Type</th>
                                    <th >Start Date</th>
                                    <th >End Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($client as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->name_en}}</td>
                                    <td>{{$row->client_type_name_en}}</td>
                                    <td>{{$row->contract_type_name_en}}</td>
                                    <td>{{$row->contract_start_date}}</td>
                                    <td>{{$row->contract_end_date}}</td>
                                    <td class="text-center">
                                        @if($row->status == 1)
                                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Inactive</span>
                                        @endif  
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">View</button>
                                        <a href="{{route('admin.client.edit', ['client' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
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
    <script>
        $(document).ready(function(){
            // $(".datatable").DataTable({
            // })
        })
    </script>
@endsection
