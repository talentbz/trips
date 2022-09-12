@extends('admin.layouts.master')
@section('title') Client @endsection
@section('page-title') List of Maintenance Records @endsection
@section('css')
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <a href="{{route('admin.maintenance.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light"><i class="fas fa-plus"></i> ADD CLIENT</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Bus No.</th>
                                    <th >Details</th>
                                    <th >Date</th>
                                    <th >Cost</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bus_maintenace as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->bus_no}}</td>
                                    <td>{{$row->details}}</td>
                                    <td>{{$row->maintanence_date}}</td>
                                    <td>
                                        {{$row->cost}} JOD
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">View</button>
                                        <a href="{{route('admin.maintenance.edit', ['maintenance' => $row->id])}}" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">Edit</button>
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
