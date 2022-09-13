<?php

namespace App\Http\Controllers\Admin\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Validator;
use App\Models\BusType;
use App\Models\BusModel;

class BusModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus_type = BusType::where('status', 1)->get();
        $bus_model = BusModel::leftJoin('bus_types',  'bus_models.bus_type_id', '=', 'bus_types.id')
                               ->select('bus_models.*', 'bus_types.type_en')->get();
        return view('admin.pages.miscellaneous.busModel.index', [
            'bus_type' => $bus_type,
            'bus_model' => $bus_model,
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
            $exist_data = BusModel::where('model_en', $request->model_en)->orWhere('model_ar', $request->model_ar)->get();
            if($request->id){
                // update date
                $bus_model = BusModel::findOrFail($request->id);
                $bus_model->model_en = $request->model_en;
                $bus_model->model_ar = $request->model_ar;
                $bus_model->bus_type_id = $request->bus_type;
                $bus_model->status = $request->status;
                $bus_model->save();
                return response()->json(['result' => "success"]);
            } else {
                // create date
                if(count($exist_data) > 0){
                    return response()->json(['result' => "faild"]);    
                } else {
                    $bus_model = new BusModel;
                    $bus_model->model_en = $request->model_en;
                    $bus_model->model_ar = $request->model_ar;
                    $bus_model->bus_type_id = $request->bus_type;
                    $bus_model->status = $request->status;
                    $bus_model->save();
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
        $data = BusModel::where('id', $id)->first();
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
        BusModel::where('id', $request->id)->update(['status' => toBoolean($request->status)]);
        return response()->json(['result' => "success"]);
    }
}
