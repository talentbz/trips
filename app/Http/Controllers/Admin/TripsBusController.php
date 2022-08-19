<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Models\Bus;
use App\Models\BusSize;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\TripBus;

class TripsBusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $trip_bus = TripBus::leftJoin('trips', 'trip_buses.trip_name', '=', 'trips.id')
                  ->leftJoin('buses', 'trip_buses.bus_no', '=', 'buses.id')
                  ->leftJoin('bus_sizes', 'trip_buses.bus_size', '=', 'bus_sizes.id')
                  ->leftJoin('drivers', 'trip_buses.driver_name', '=', 'drivers.id')
                  ->select('trip_buses.*', 'trips.trip_name_en', 'buses.bus_no','bus_sizes.size','drivers.name_en')
                  ->get();
        return view('admin.pages.tripBus.index', [
            "trip_bus" => $trip_bus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trip = Trip::where('status', 1)->get();
        $bus_size = BusSize::where('status', 1)->get();
        $bus_no = Bus::where('status', 1)->get();
        $driver= Driver::where('status',1)->get();
        
        return view('admin.pages.tripBus.create', [
            'trip' => $trip,
            'bus_size' => $bus_size,
            'bus_no' => $bus_no,
            'driver' => $driver,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $trip_bus = new TripBus;
            $trip_bus->trip_name = $request->trip_name;
            $trip_bus->bus_size = $request->bus_size;
            $trip_bus->bus_no = $request->bus_no;
            $trip_bus->driver_name = $request->driver_name;
            $trip_bus->status = $request->status;
            $trip_bus->save();
            return response()->json(['result' => "success"]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TripBus::where('id', $id)->where('status', 1)->get();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip_bus = TripBus::where('id', $id)->first();
        $trip = Trip::where('status', 1)->get();
        $bus_size = BusSize::where('status', 1)->get();
        $bus_no = Bus::where('status', 1)->get();
        $driver= Driver::where('status',1)->get();

        return view('admin.pages.tripBus.edit', [
            'trip_bus' => $trip_bus,
            'trip' => $trip,
            'bus_no' => $bus_no,
            'bus_size' => $bus_size,
            'driver' => $driver,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = [
            'trip_name' => $request->trip_name,
            'bus_size' => $request->bus_size,
            'bus_no' => $request->bus_no,
            'driver_name' => $request->driver_name,
           
        ];
        $trip_bus = TripBus::where('id', $id)->update($content);  
        return response()->json(['result' => "success"]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
