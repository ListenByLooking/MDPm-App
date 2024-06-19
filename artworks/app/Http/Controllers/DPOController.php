<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DPOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function documentation(Request $request)
    {
        if($request->document_name)
        {
            $data = [];
            foreach ($request->document_name as $key => $value) {

                $data[] = [
                    'dpo_id' => $request->dpo_id,
                    'user_id' => Auth::user()->id,
                    'document_type' => $value,
                    'document_url' => $request->document_links[$key],
                    'status' => 1,
                    'created_at' => date('Y-m-d h:i:s'),
                ];                
            }
            $insert = DB::table('documentation')->insert($data);

            if($insert)
            {
                return response()->json(["status"=>true , "message"=>"Insert Successfully"]);
            }else{
                return response()->json(["status"=>false , "message"=>"You have some error"]);
            }
        }

    }
    public function score(Request $request)
    { 
            $data = [
                'dpo_id'        => $request->dpo_id,
                'user_id'       => Auth::user()->id,
                'message'       => $request->score, 
                'status'        => 1,
                'created_at'    => date('Y-m-d h:i:s'),
            ];  
            $insert = DB::table('score')->insert($data);
            if($insert)
            {
                return response()->json(["status"=>true , "message"=>"Insert Successfully"]);
            }else{
                return response()->json(["status"=>false , "message"=>"You have some error"]);
            } 

    }
}
