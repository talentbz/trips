<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Models\SuperVisor;
use DB, Validator, Exception, Image, URL;
use Illuminate\Support\Facades\Hash;

class SuperVisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $super_visor = SuperVisor::get();
        return view('admin.pages.supervisor.index', [
            'supervisor' => $super_visor,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.supervisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->id){
            $supervisor = SuperVisor::findOrFail($request->id);
        } else {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
            
                'phone' => 'required | unique:super_visors',
          
                'user_name'=>'required | unique:super_visors',
                'file' => 'required'
             
    
    
            ]);
            $attributeNames = array(
                'status' => 'Status',           
                'phone' => 'Phone Number',            
                'user_name'=>'User Name',
                'file'=> 'Profile image'
                
                
    
            );
            $validator->setAttributeNames($attributeNames);
            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            $supervisor = new SuperVisor;
            $supervisor->password = Hash::make($request->password);
        }

        $supervisor->name = $request->name_en;
        $supervisor->phone = $request->phone;
        $supervisor->address = $request->address;
        $supervisor->user_name = $request->user_name;
        $supervisor->birthday = $request->birthday;
        $supervisor->status = $request->status;
        if ($request->has('file')) {
            $path = public_path('uploads/supervisor/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = time().'_'.$file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $supervisor->profile_image = $fileName; 
        };        
        $supervisor->save();
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
        $supervisor = SuperVisor::findOrFail($id);
        return view('admin.pages.supervisor.edit', [
            'supervisor' => $supervisor,
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
        $supervisor = SuperVisor::where('id', $id)->update(['password' => Hash::make($request->password)]);
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
        SuperVisor::where('id', $request->id)->update(['status' => toBoolean($request->status)]);
        return response()->json(['result' => "success"]);
    }
}
