<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->back()->with(['status'=>false,'message'=>'Oops']);
        } 
    }

    public function updates(Request $request)
    { 
        try {   
            $user = DB::table('users')->where('id',$request->id)->first();
            $imageName = '';
            if ($request->file('image')) {  
                $image      = $request->file('image');
                $imageName  = time().'.'.$image->extension();
                $image->move('public/images', $imageName);
                if(file_exists(public_path('images/'.$user->image)))
                {
                    unlink(public_path('images/'.$user->image));
                }
            }
           
            $update = DB::table('users')->where(['id'=>$request->id])->update([
                'name'          => $request->first_name,
                'last_name'     => $request->last_name,
                'phone_number'  => $request->phone,
                'image'         => $imageName
            ]);
            if(!empty($request->password)){
                DB::table('users')->where(['id'=>$request->id])->update([ 
                    'password'      => Hash::make($request->password)
                ]);
            }
            return redirect()->back()->with(['status'=>true,'message'=>'Successfully Updated']);
        } catch (\Throwable $th) { 
            dd($th->getMessage());
            return redirect()->back()->with(['status'=>false,'message'=>'Oops']);
        } 
    }

    public function store(Request $request)
    {
        try {
           
        $validatedData = Validator::make($request->all(),[
            'first_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]); 

        if(!$validatedData->fails())
        {
            $imageName = '';
            if ($request->file('image')) {  
                $image      = $request->file('image');
                $imageName  = time().'.'.$image->extension();
                $image->move('public/images', $imageName); 
            }
            DB::table('users')->insert([
                                        'name'=>$request->first_name,
                                        'last_name'=>$request->last_name,
                                        'phone_number'=>$request->phone,
                                        'image'=>$imageName,
                                        'email'=>$request->email,
                                        'password'=>Hash::make($request->password),
                                        'user_type'=>2,
                                        'created_at'=>date('Y-m-d h:i:s'),
                                    ]);
            return redirect()->back()->with(['status'=>true , 'message' =>'insert Successfully']);                 
        }else{
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
         //code...
        } catch (\Throwable $th) {
            return redirect()->back()->with(['status'=>false , 'message' =>'Something went wrong']);
        }

    }
    public function search(Request $request){
        $draw           = $request->draw;
        $start          = $request->start;
        $rowperpage     = $request->length; // total number of rows per page
        $columnIndex_arr= $request->order;
        $columnName_arr = $request->columns;
        $order_arr      = $request->order;
        $search_arr     = $request->search;
        $columnIndex    = $columnIndex_arr[0]['column']; // Column index
        $columnName     = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder= $order_arr[0]['dir']; // asc or desc
        $searchValue    = $search_arr['value']; // Search value

        // Total records
        $totalRecords = DB::table('users')->where('user_type','!=',1)->count(); 
        $totalRecordswithFilter = DB::table('users')->where('user_type','!=',2)
        ->whereRaw("CONCAT_WS(' ', name, email,phone_number) LIKE ?", ["%{$searchValue}%"])
        ->count();
 

        // Get records, also we have included search filter as well
        $records = DB::table('users')->where('user_type','!=',1)                     
            ->whereRaw("CONCAT_WS(' ', name, email,phone_number) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder) 
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $data_arr[] = array(
                "id"    => $record->id,
                "name" => $record->name,
                "email"  => $record->email,
                "phone"=> $record->phone_number,
                "action"=> '<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#user_modal" onclick="func_edit('.$record->id.')" class="btn btn-sm btn-success" title="View User"><i class="bx fs-5 bxs-pencil"></i></a>
                            <a href="javascript:;" onclick="remove(\''.encrypt($record->id).'\')" class="btn btn-sm btn-danger" title="Delete User"><i class="fs-5 bx bx-trash"></i></a',
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );
        echo json_encode($response);
   } 
    public function edit(Request $request)
    {
        try {
             $user = DB::table('users')->select('name','last_name','phone_number','email')->where('id',$request->id)->first();
             return response()->json(['status'=>true , 'messages'=>'Success', 'user'=>$user]);
        } catch (\Throwable $th) {
            return response()->json(['status'=>true , 'messages'=>'Something went wronmg']);
        }
    }
    public function add(Request $request)
    {
        return view('user');
    }
    public function delete(Request $request)
    {
        try {
            $id = decrypt($request->id);
            $user = DB::table('users')->where('id',$id)->first(); 
            
            if($user)
            {
                DB::table('users')->where('id',$id)->delete(); 
                if(file_exists(public_path('images/'.$user->image)) && is_file(public_path('images/'.$user->image)))
                    {
                        unlink(public_path('images/'.$user->image));
                    }
               
            } 
            return response()->json(['status'=>true , 'message' => 'One Record Deleted']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return response()->json(['status'=>false , 'message' => 'Unable to Delete']);
        }
    }
}
