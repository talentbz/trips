<?php

namespace App\Http\Controllers\Admin\Miscellaneous;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use App\Models\ClientType;

class ClientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client_type = ClientType::get();
        return view('admin.pages.miscellaneous.clientType.index', [
            'client_type' => $client_type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        ]);
        $attributeNames = array(
            'status' => 'Status',
        );
        $validator->setAttributeNames($attributeNames);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        /**
         * if id is not exist, then requst data will create.
         * if id is exist, then request data will update
         */ 
        $exist_data = ClientType::where('type_name_en', $request->name_en)->orWhere('type_name_ar', $request->name_ar)->get();
        if($request->id){
            // update date
            $client_type = ClientType::findOrFail($request->id);
        } else {
            // create date
            if(count($exist_data) > 0){
                return response()->json(['result' => "faild"]);    
            } 
            $client_type = new ClientType;
        }
        $client_type->type_name_en = $request->name_en;
        $client_type->type_name_ar = $request->name_ar;
        $client_type->status = $request->status;
        $client_type->save();
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
        $data = ClientType::where('id', $id)->first();
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
