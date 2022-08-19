<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\City;
use App\Models\Trip;
use App\Models\Area;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip = Trip::leftJoin('clients', 'trips.client_id', '=', 'clients.id')
                  ->leftJoin('cities as c1', 'trips.origin_city', '=', 'c1.id')
                  ->leftJoin('cities as c2', 'trips.destination_city', '=', 'c2.id')
                  ->leftJoin('areas as a1','trips.origin_area', '=', 'a1.id')
                  ->leftJoin('areas as a2','trips.destination_area', '=', 'a1.id')
                  ->select('trips.*', 'clients.name_en as client_name', 'c1.city_name_en as origin_city_name','c2.city_name_en as destination_city_name_en','a1.area_name_en as origin_area_name_en' , 'a2.area_name_en as destination_area_name_en')
                  ->get();
        return view('admin.pages.trip.index', [
            "trip" => $trip,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $client = Client::get();
        $city = City::where('status', 1)->get();
        return view('admin.pages.trip.create', [
            'client' => $client,
            'city' => $city,           
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
        $exist_data = Trip::where('trip_name_en', $request->name_en)->get();
        if(count($exist_data) > 0){
            return response()->json(['result' => "exist"]);    
        } else {
            $trip = new Trip;
            $trip->trip_name_en = $request->name_en;
            $trip->trip_name_ar = $request->name_ar;
            $trip->client_id = $request->client;
            $trip->trip_type = $request->trip_type;
            $trip->details = $request->details;
            $trip->trip_frequancy = $request->trip_frequancy;
            $trip->first_trip_date = $request->first_trip_date;
            $trip->last_trip_date = $request->last_trip_date;
            $trip->origin_city = $request->origin_city;
            $trip->origin_area = $request->origin_area;
            $trip->destination_city = $request->destination_city;
            $trip->destination_area = $request->destination_area;
            $trip->departure_time = $request->departure_time;
            $trip->arrival_time = $request->arrival_time;
            $trip->admin_show = $request->show_trip_admin;
            $trip->status = $request->status;
            $trip->save();
            return response()->json(['result' => "success"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Trip::where('id', $id)->where('status', 1)->get();
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
        $trip = Trip::where('id', $id)->first();
        $client = Client::get();
        $city = City::where('status', 1)->get();
        $area = Area::where('status',1)->get();

        return view('admin.pages.trip.edit', [
            'trip' => $trip,
            'client' => $client,
            'city' => $city,
            'area' => $area,            
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
            'trip_name_en' => $request->name_en,
            'trip_name_ar' => $request->name_ar,
            'client_id' => $request->client,
            'trip_type' => $request->trip_type,
            'details' => $request->details,
            'trip_frequancy' => $request->trip_frequancy,
            'first_trip_date' => $request->first_trip_date,
            'last_trip_date' => $request->last_trip_date,
            'origin_city' => $request->origin_city,
            'origin_area' => $request->origin_area,
            'destination_city' => $request->destination_city,
            'destination_area' => $request->destination_area,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'admin_show' => $request->show_trip_admin,
            'status' => $request->status,            
        ];
      
        $trip = Trip::where('id', $id)->update($content);  
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
