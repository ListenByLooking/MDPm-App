<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArtworkController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function create()
   {
    return view('artwork');
   }
   public function store(Request $request)
   { 
      try {
         
         $dpo = DB::table('dpos')->insertGetId([
                                    'user_id'      =>Auth::user()->id,
                                    'title'        => $request->title,
                                    'description'  =>$request->description,
                                    'year'         =>$request->year,
                                    'author'       =>$request->author,
                                    'status'       =>1,
                                    'created_at'   =>date('Y-m-d h:i:s'), 
                                    ]);
         if($dpo)
         {
            return redirect()->route('artwork.add',encrypt($dpo))->with(['status'=>true , 'message'=>'DPO Added successfully']);
         }else{
            return redirect()->back()->with(['status'=>false , 'message'=>'You have some error. please try later']);
         } 
      } catch (\Throwable $th) {
         dd($th->getMessage().$th->getLine());
         return redirect()->back()->with(['status'=>false , 'message'=>'You have some error. please try later']);
      }
   }
   public function add($id)
   {
      $id = decrypt($id);
      $dpo = DB::table('dpos')->where('id',$id)->first();
      return view('artwork-add',compact('dpo','id'));
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
        $totalRecords = DB::table('dpos')->where('user_id',Auth::user()->id)->count(); 
        $totalRecordswithFilter = DB::table('dpos')->where('user_id',Auth::user()->id)
        ->whereRaw("CONCAT_WS(' ', title, author) LIKE ?", ["%{$searchValue}%"])
        ->count();
 

        // Get records, also we have included search filter as well
        $records = DB::table('dpos')->where('user_id',Auth::user()->id)                     
            ->whereRaw("CONCAT_WS(' ', title, author) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder) 
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $data_arr[] = array(
                "id"    => $record->id,
                "title" => $record->title,
                "year"  => $record->year,
                "author"=> $record->author,
                "action"=> '<a href="'.route('artwork.add',encrypt($record->id)).'" class="btn btn-sm btn-success" title="Add DPO"><i class="bx bx-duplicate"></i></a>
                            <a href="'.route('artwork.view',encrypt($record->id)).'" class="btn btn-sm btn-danger" title="View DPO"><i class=" bx bx-list-ul"></i></a>',
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
   public function view()
   {

   }
}
