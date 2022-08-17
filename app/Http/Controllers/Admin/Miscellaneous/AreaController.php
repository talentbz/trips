<?php

namespace App\Http\Controllers\Admin\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Validator;
use App\Models\Area;
use App\Models\City;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::where('status', 1)->get();
        $area = Area::leftJoin('cities',  'areas.city_id', '=', 'cities.id')
                               ->select('areas.*', 'cities.city_name_en')->get();
        return view('admin.pages.miscellaneous.area.index', [
            'city' => $city,
            'area' => $area,
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
            $exist_data = Area::where('area_name_en', $request->name_en)->orWhere('area_name_ar', $request->name_ar)->get();
            if($request->id){
                // update data
                $area = Area::findOrFail($request->id);
                $area->area_name_en = $request->name_en;
                $area->area_name_ar = $request->name_ar;
                $area->status = $request->status;
                $area->city_id = $request->city;
                $area->location_latitude = $request->latitude;
                $area->location_longitude = $request->longitude;
                $area->save();
                return response()->json(['result' => "success"]);
            } else {
                // create data
                if(count($exist_data) > 0){
                    return response()->json(['result' => "faild"]);    
                } else {
                    $area = new Area;
                    $area->area_name_en = $request->name_en;
                    $area->area_name_ar = $request->name_ar;
                    $area->status = $request->status;
                    $area->city_id = $request->city;
                    $area->location_latitude = $request->latitude;
                    $area->location_longitude = $request->longitude;
                    $area->save();
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
        $data = Area::where('id', $id)->first();
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
