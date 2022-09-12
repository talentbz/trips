@extends('admin.layouts.master')
@section('title') Trips Report By OwnerShip @endsection
@section('page-title') Trips Report By OwnerShip @endsection
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
                            <div class = "row mb-5">
                                <div class = "col-md-2 mt-4">
                                    <select class="form-select" name="client_filter">
                                        <option>All ownershop </option>
                                            <option value=""></option>
                                       
                                    </select>
                                </div>
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
                                                      
                             
                        </div>
                        <div class="table-wrapper">
                           @include('admin.pages.reports.tripsByOwnerShip.table')
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
