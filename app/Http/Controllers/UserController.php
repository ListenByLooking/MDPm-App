<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile',compact('user'));
    }
    public function update(Request $request)
    {
        try {  
            $imageName  = Auth::user()->image;
            $password   = Auth::user()->image;
            if ($request->file('image')) { 
                $old_Image = $imageName;
                $image      = $request->file('image');
                $imageName  = time().'.'.$image->extension();
                $image->move('public/images', $imageName);
                if(file_exists(public_path('images/'.$old_Image)))
                {
                    unlink(public_path('images/'.$old_Image));
                }
            }
           
            $update = DB::table('users')->where(['id'=>Auth::user()->id])->update([
                'name'          => $request->first_name,
                'last_name'     => $request->last_name,
                'phone_number'  => $request->phone,
                'image'         => $imageName
            ]);
            if(!empty($request->password)){
                DB::table('users')->where(['id'=>Auth::user()->id])->update([ 
                    'password'      => Hash::make($request->password)
                ]);
            }
            return redirect()->back()->with(['status'=>true,'message'=>'Successfully Updated']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with(['status'=>false,'message'=>'Oops']);
        } 
    }
}
