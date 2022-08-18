<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\ContractType;
use DB, Validator, Exception, Image, URL;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_type = ClientType::where('status', 1)->get();
        $contract_type = ContractType::where('status', 1)->get();
        return view('admin.pages.client.create', [
            'client_type' => $client_type,
            'contract_type' => $contract_type,
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
            'client_type' => 'required',
            'contract_type' => 'required',
        ]);
        $attributeNames = array(
            'status' => 'Status',
            'client_type' => 'Client Type',
            'contract_type' => 'Contract Type',
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
            $client = Client::findOrFail($request->id);
        } else {    
            $client = new Client;
        }
        $client->name_en = $request->name_en;
        $client->name_ar = $request->name_ar;
        $client->client_type_id = $request->client_type_id;
        $client->contract_type_id = $request->contract_type_id;
        $client->address = $request->address;
        $client->phone_number = $request->phone;
        $client->email = $request->email;
        $client->website = $request->website;
        $client->fax = $request->fax;
        $client->contract_start_date = $request->start_date;
        $client->contract_end_date = $request->end_date;
        $client->liaison_name = $request->name_liaison;
        $client->liaison_phone = $request->phone_liaison;
        $client->record_number = $request->recorde_number;
        $client->status = $request->status;
        
        $client->save();
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
