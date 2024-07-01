<?php

namespace App\Http\Controllers;

use PDF;
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
         
         $dpo = DB::table('artwork')->insertGetId([
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
            return redirect()->route('artwork.view',encrypt($dpo))->with(['status'=>true , 'message'=>'DPO Added successfully']);
         }else{
            return redirect()->back()->with(['status'=>false , 'message'=>'You have some error. please try later']);
         } 
      } catch (\Throwable $th) { 
         return redirect()->back()->with(['status'=>false , 'message'=>'You have some error. please try later']);
      }
   }
   public function view($id)
   {
      $id = decrypt($id);
      $artwork = DB::table('artwork')->where('id',$id)->where('user_id',Auth::user()->id)->first();
      $dpos    = DB::table('dpos')->where(['user_id' => Auth::user()->id ,'artwork_id' => $id ])->orderBy('id','DESC')->first();
      if(!$dpos)
      {
         $dpo_id = 1;
      }else{
         $dpo_id =  $dpos->dpo_id+1;
      }
      return view('artwork-add',compact('artwork','id','dpo_id'));
   }

   public function add($id,$dpo_id)
   { 
      $id      = decrypt($id);
      $dpo_id  = decrypt($dpo_id); 
      $artwork = DB::table('artwork')->where('id',$id)->where('user_id',Auth::user()->id)->first(); 
      return view('add-artwork',compact('artwork','id','dpo_id'));
   }
   public function pdf($id)
   { 
      $id         = decrypt($id);
      $artwork        = DB::table('artwork')->where('id',$id)->where('user_id',Auth::user()->id)->first();
      $components = DB::table('components')->select('id')->where('artwork_id',$id)->where('user_id',Auth::user()->id)->get(); 
        //return view('pdf',compact('components','id'));

         $pdf = PDF::loadView('pdf', compact('components','id'));
        
         return $pdf->download(str_replace([',','_','-',''],'-',$artwork->title??'Sample').'.pdf');
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
        $totalRecords = DB::table('artwork')->where('user_id',Auth::user()->id)->count(); 
        $totalRecordswithFilter = DB::table('artwork')->where('user_id',Auth::user()->id)
        ->whereRaw("CONCAT_WS(' ', title, author) LIKE ?", ["%{$searchValue}%"])
        ->count();
 

        // Get records, also we have included search filter as well
        $records = DB::table('artwork')->where('user_id',Auth::user()->id)                     
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
                "action"=> '<a href="'.route('artwork.view',encrypt($record->id)).'" class="btn btn-sm btn-success" title="View Artworks"><i class="bx fs-5 bxs-book-open"></i></a>
                            <a href="javascript:;" onclick="remove(\''.encrypt($record->id).'\')" class="btn btn-sm btn-danger" title="Delete Artworks"><i class="fs-5 bx bx-trash"></i></a>
                            <a href="'.route('artwork.pdf',encrypt($record->id)).'" class="btn btn-primary btn-sm" title="View PDF"><i class="fs-5 bx bxs-file-pdf"></i></a>',
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

   public function delete(Request $request)
   { 
      $id            = $request->id; 
      $dpo           = DB::table('artwork')->where('id',decrypt($id))->delete();
      $components    = DB::table('components')->where('artwork_id',decrypt($id))->first();
      $componemt_id  = $components->id;
                     DB::table('audiocassette')->where('component_id',$componemt_id)->delete();
                     DB::table('dat')->where('component_id',$componemt_id)->delete();
                     DB::table('digital_copy')->where('component_id',$componemt_id)->delete();
                     DB::table('documentation')->where('component_id',$componemt_id)->delete();
                     DB::table('original_docs')->where('component_id',$componemt_id)->delete();
                     DB::table('phonographicdisks')->where('component_id',$componemt_id)->delete();
                     DB::table('score')->where('component_id',$componemt_id)->delete();
                     DB::table('tape_details')->where('component_id',$componemt_id)->delete(); 
   } 
}
