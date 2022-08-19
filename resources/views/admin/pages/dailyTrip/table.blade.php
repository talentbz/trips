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
        @foreach($daily_trip as $key=>$row)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$row->trip_name}}</td>
            <td>{{$row->client_name}}</td>
            <td>{{$row->origin_area}} {{$row->origin_city}}</td>
            <td>{{$row->destination_area}} {{$row->destination_city}}</td>
            <td>{{$row->start_date}}</td>
            <td>{{$row->end_date}}</td>
            <td>{{$row->dirver_name}}</td>
            <td>{{$row->bus_no}}</td>
            <td>{{$row->bus_size}}</td>
            <td>
                @switch($row->status)
                    @case(1)
                        <span class="badge badge-pill badge-soft-success font-size-12">Pending</span>
                        @break
                    @case(2)
                        <span class="badge badge-pill badge-soft-success font-size-12">Accepted</span>
                        @break
                    @case(3)
                        <span class="badge badge-pill badge-soft-success font-size-12">Rejected</span>
                        @break
                    @case(4)
                        <span class="badge badge-pill badge-soft-success font-size-12">Started</span>
                        @break
                    @case(5)
                        <span class="badge badge-pill badge-soft-success font-size-12">Started with a delay</span>
                        @break
                    @case(6)
                        <span class="badge badge-pill badge-soft-success font-size-12">Finished</span>
                        @break
                    @case(7)
                        <span class="badge badge-pill badge-soft-success font-size-12">Finished with a delay</span>
                        @break
                    @default
                        <span class="badge badge-pill badge-soft-success font-size-12">Canceled</span>
                @endswitch
            </td>
            <td class="text-center">
                <a  class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-light">VIEW</a>
                <a href="{{route('admin.daily_trip.edit', ['daily_trip' => $row->id])}}"  class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">EDIT</a>
                <button type="button" class="btn btn-outline-warning btn-sm btn-rounded waves-effect waves-lightt">CANCEL TRIP</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>