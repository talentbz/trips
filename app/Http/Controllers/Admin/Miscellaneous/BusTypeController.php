<?php

namespace App\Http\Controllers\Admin\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Validator;
use App\Models\BusType;

class BusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus_type = BusType::get();
        return view('admin.pages.miscellaneous.busType.index', [
            'bus_type' => $bus_type,
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
            $exist_data = BusType::where('type_en', $request->name_en)->orWhere('type_ar', $request->name_ar)->get();
            if($request->id){
                // update date
                $bus_type = BusType::findOrFail($request->id);
                $bus_type->type_en = $request->name_en;
                $bus_type->type_ar = $request->name_ar;
                $bus_type->status = $request->status;
                $bus_type->save();
                return response()->json(['result' => "success"]);
            } else {
                // create date
                if(count($exist_data) > 0){
                    return response()->json(['result' => "faild"]);    
                } else {
                    $bus_type = new BusType;
                    $bus_type->type_en = $request->name_en;
                    $bus_type->type_ar = $request->name_ar;
                    $bus_type->status = $request->status;
                    $bus_type->save();
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
        $data = BusType::where('id', $id)->first();
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

    public function status(Request $request)
    {
        BusType::where('id', $request->id)->update(['status' => toBoolean($request->status)]);
        return response()->json(['result' => "success"]);
    }
}
