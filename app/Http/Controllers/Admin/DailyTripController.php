<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\BusSize;
use App\Models\Client;
use App\Models\City;
use App\Models\Area;
use App\Models\Trip;
use App\Models\DailyTripDetail;

class DailyTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daily_trip = DailyTripDetail::get();
        $client = Client::where('status', 1)->get();
        $city = City::where('status', 1)->get();
        $bus = Bus::where('status', 1)->get();
        $bus_size = BusSize::where('status', 1)->get();
        $driver = Driver::where('status', 1)->get();
        $trip = Trip::where('status', 1)->get();
        return view('admin.pages.dailyTrip.index', [
            'daily_trip' => $daily_trip,
            'client' => $client,
            'city' => $city,
            'bus' => $bus,
            'bus_size' => $bus_size,
            'driver' => $driver,
            'trip' => $trip,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::where('status', 1)->get();
        $city = City::where('status', 1)->get();
        $bus = Bus::where('status', 1)->get();
        $bus_size = BusSize::where('status', 1)->get();
        $driver = Driver::where('status', 1)->get();
        $trip = Trip::where('status', 1)->get();
        return view('admin.pages.dailyTrip.create', [
            'client' => $client,
            'city' => $city,
            'bus' => $bus,
            'bus_size' => $bus_size,
            'driver' => $driver,
            'trip' => $trip,
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
         /**
         * check the status validate.
         */ 
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'trip_type' => 'required',
            'show_trip_admin' => 'required',
        ]);
        $attributeNames = array(
            'status' => 'Status',
            'trip_type' => 'Trip Type',
            'show_trip_admin' => 'Show Trip Admin',
        );
        $validator->setAttributeNames($attributeNames);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        /**
         * if id is not exist, then requst data will create.
         * if id is exist, then request data will update
         */ 
        if($request->id){
            $daily_trip = DailyTripDetail::findOrFail($request->id);
        } else {    
            $daily_trip = new DailyTripDetail;
        }
        $daily_trip->trip_name = $request->tripe_name;
        $daily_trip->client_name = $request->client;
        $daily_trip->origin_city = $request->origin_city;
        $daily_trip->origin_area = $request->origin_area;
        $daily_trip->destination_area = $request->destination_area;
        $daily_trip->destination_city = $request->destination_city;
        $daily_trip->start_date = $request->start_trip_date;
        $daily_trip->start_time = $request->start_trip_time;
        $daily_trip->end_date = $request->end_trip_date;
        $daily_trip->end_time = $request->end_trip_time;
        $daily_trip->bus_size = $request->bus_size;
        $daily_trip->bus_no = $request->bus_no;
        $daily_trip->details = $request->details;
        $daily_trip->dirver_name = $request->driver;
        $daily_trip->trip_type = $request->trip_type;
        $daily_trip->show_admin_status = $request->show_trip_admin;
        $daily_trip->status = $request->status;
        
        $daily_trip->save();
        return response()->json(['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Area::where('city_id', $id)->where('status', 1)->get();
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
        $client = Client::where('status', 1)->get();
        $city = City::where('status', 1)->get();
        $bus = Bus::where('status', 1)->get();
        $bus_size = BusSize::where('status', 1)->get();
        $driver = Driver::where('status', 1)->get();
        $trip = Trip::where('status', 1)->get();
        $daily_trip = DailyTripDetail::findOrFail($id);
        return view('admin.pages.dailyTrip.edit', [
            'client' => $client,
            'city' => $city,
            'bus' => $bus,
            'bus_size' => $bus_size,
            'driver' => $driver,
            'trip' => $trip,
            'daily_trip' => $daily_trip,
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
        //
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
