<?php

namespace App\Http\Controllers\Admin\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use App\Models\BusMaintenanceType;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance = BusMaintenanceType::get();
        return view('admin.pages.miscellaneous.busMaintenance.index', [
            'maintenance' => $maintenance,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        $attributeNames = array(
            'status' => 'Status',
        );
        $validator->setAttributeNames($attributeNames);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        } else {
            $exist_data = BusMaintenanceType::where('type_en', $request->name_en)->orWhere('type_ar', $request->name_ar)->get();
            if($request->id){
                // update date
                $maintenance = BusMaintenanceType::findOrFail($request->id);
                $maintenance->type_en = $request->name_en;
                $maintenance->type_ar = $request->name_ar;
                $maintenance->status = $request->status;
                $maintenance->save();
                return response()->json(['result' => "success"]);
            } else {
                // create date
                if(count($exist_data) > 0){
                    return response()->json(['result' => "faild"]);    
                } else {
                    $maintenance = new BusMaintenanceType;
                    $maintenance->type_en = $request->name_en;
                    $maintenance->type_ar = $request->name_ar;
                    $maintenance->status = $request->status;
                    $maintenance->save();
                    return response()->json(['result' => "success"]);
                }
            }
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
        $data = BusMaintenanceType::where('id', $id)->first();
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
        //
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
