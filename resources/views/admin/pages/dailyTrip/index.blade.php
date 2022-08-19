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
                                        @foreach($city as $key=>$row)
                                            <option value="{{$row->id}}">{{$row->city_name_en}}</option>
                                        @endforeach
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
                        <div class="table-wrapper">
                           @include('admin.pages.dailyTrip.table')
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/admin/dailyTrip/index.js') }}"></script>
    <script>
        url = "{{route('admin.daily.table')}}"
    </script>
@endsection
