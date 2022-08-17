@extends('admin.layouts.master')
@section('title') Client @endsection
@section('css')
@endsection
@section('content')
    <div class="content-warpper">
        <div class="row">
            <div class="col-12">
                <!--Daily Trip List section -->
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-filter">
                            <div class = "row mb-3">
                                <div class = "col">
                                    <select class="form-select" name="client_filter">
                                        <option>All client</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="origin_filter">
                                        <option>All Origins</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="destinations_filter">
                                        <option>All Destination</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="driver_filter">
                                        <option>All Drivers</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="bus_filter">
                                        <option>All Buses</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="bus_sizes_filter">
                                        <option>All Bus Sizes</option>
                                        <option>city1</option>
                                        <option>city2</option>
                                    </select>
                                </div>
                                <div class = "col">
                                    <select class="form-select" name="status_filter">
                                        <option>All Status</option>
                                        <option>active</option>
                                        <option>inactive</option>
                                    </select>
                                </div>                                
                            </div>
                            <div class = "row">
                                
                                <div class = "col-md-2">
                                    <label for="">START DATE</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="first_trip_date" required>

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class = "col-md-2">
                                    <label for="">END DATE</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker" name="first_trip_date" required>

                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>                                    
                            </div>                             
                            <a href="{{route('admin.daily_trip.create')}}" class="btn btn-outline-warning btn-rounded waves-effect waves-light add-new"><i class="fas fa-plus"></i> ADD DAILY TRIP</a> 
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 datatable .table-fixed">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >TRIP NAME</th>
                                    <th>CLIENT</th>
                                    <th>ORIGIN</th>
                                    <th>DESTINATION</th>
                                    <th>START DATE</th>
                                    <th>END DATE</th>
                                    <th>DRIVER</th>
                                    <th>BUS NO.</th>
                                    <th>BUS SIZE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>                                                         
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>17:00-17:45</td>
                                    <td>pending</td>
                                    <td class="text-center">
                                        <a  class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</a>
                                        <a href=""  class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">EDIT</a>
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">CANCEL TRIP</button>
                                    </td>
                                </tr>
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
