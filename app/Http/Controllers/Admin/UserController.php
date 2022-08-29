<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator, Exception, Image, URL;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('admin.pages.user.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::get();
        return view('admin.pages.user.create', [
            // 'user' => $user,
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
        if($request->id){
            $user = User::findOrFail($request->id);
        } else {
            $validator = Validator::make($request->all(), [
                'status' => 'required',
                'role' => 'required',
                'file' => 'required',
                'user_name' => 'required | unique:users',
                'phone' => 'required | unique:users',
            ]);
            $attributeNames = array(
                'status' => 'Status',
                'role' => 'level',
                'file' => 'file',
                'user_name' => 'user name',
                'phone' => 'phone',
            );
            $validator->setAttributeNames($attributeNames);
            if($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            $user = new User;
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->user_name = $request->user_name;
        $user->status = $request->status;
        if ($request->has('file')) {
            $path = public_path('uploads/user/');
            if(!file_exists($path)){
                File::makeDirectory($path);
            }
            $file = $request->file;
            $fileName = time().'_'.$file->getClientOriginalName();
            $imgx = Image::make($file->getRealPath());
            $imgx->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path.$fileName);
            $user->avatar = $fileName; 
        };
        $user->save();
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.user.edit', [
            'user' => $user,
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
        $user = User::where('id', $id)->update(['password' => Hash::make($request->password)]);
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
}
