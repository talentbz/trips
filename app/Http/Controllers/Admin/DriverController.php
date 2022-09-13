<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use App\Models\Driver;
use DB, Validator, Exception, Image, URL;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::get();
        return view('admin.pages.driver.index', [
            'driver' => $driver,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.driver.create');
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
            if($request->id){
                $driver = Driver::findOrFail($request->id);
            } else {    
                $driver = new Driver;
                $driver->password = $request->password;
            }
            $driver->name_en = $request->name_en;
            $driver->name_ar = $request->name_ar;
            $driver->age = $request->age;
            $driver->phone = $request->phone;
            $driver->license_number = $request->license_number;
            $driver->address = $request->address;
            $driver->user_name = $request->user_name;
            $driver->license_expiry_date = $request->license_expiry_date;
            $driver->status = $request->status;
            if ($request->has('file')) {
                $path = public_path('uploads/driver/');
                if(!file_exists($path)){
                    File::makeDirectory($path);
                }
                $file = $request->file;
                $fileName = time().'_'.$file->getClientOriginalName();
                $imgx = Image::make($file->getRealPath());
                $imgx->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$fileName);
                $driver->profile_image = $fileName; 
            };
            $driver->save();
            return response()->json(['result' => 'success']);
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
        $driver = Driver::findOrFail($id);
        return view('admin.pages.driver.edit', [
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
        $driver = Driver::where('id', $id)->update(['password' => Hash::make($request->password)]);
        return response()->json(['result' => 'success']);
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
        Driver::where('id', $request->id)->update(['status' => toBoolean($request->status)]);
        return response()->json(['result' => "success"]);
    }
}
