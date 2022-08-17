<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Bus;
use App\Models\BusMaintenanceType;
use App\Models\BusMaintenance;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus_maintenace = BusMaintenance::get();
        return view('admin.pages.maintenance.index', [
            'bus_maintenace' => $bus_maintenace,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = Bus::where('status', 1)->get();
        $bus_maintenace_type = BusMaintenanceType::where('status', 1)->get();
        return view('admin.pages.maintenance.create', [
            'bus' => $bus,
            'bus_maintenace_type' => $bus_maintenace_type,
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
        // create
        $bus_maintenace = new BusMaintenance;
        $bus_maintenace->bus_no = $request->bus_no;
        $bus_maintenace->maintanence_type_id = $request->maintenace_type;
        $bus_maintenace->details = $request->details;
        $bus_maintenace->maintanence_date = $request->date;
        $bus_maintenace->cost = $request->cost;
        $bus_maintenace->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::where('status', 1)->get();
        $bus_maintenace_type = BusMaintenanceType::where('status', 1)->get();
        $bus_maintenace = BusMaintenance::where('id', $id)->first();
        return view('admin.pages.maintenance.edit', [
            'bus' => $bus,
            'bus_maintenace_type' => $bus_maintenace_type,
            'bus_maintenace' => $bus_maintenace,
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
        // update
        $content = [
            'bus_no' => $request->bus_no,
            'maintanence_type_id' => $request->maintenace_type,
            'details' => $request->details,
            'maintanence_date' => $request->date,
            'cost' => $request->cost,
        ];
        $bus_maintenace = BusMaintenance::where('id', $id)->update($content);  
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
