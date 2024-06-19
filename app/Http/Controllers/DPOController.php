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
            $component_id = DB::table('components')->insertGetId([
                                                                    'dpo_id'        => $request->dpo_id,
                                                                    'user_id'       => Auth::user()->id,
                                                                    'dpo_type'      => 'documentation',
                                                                    'component'     => '',
                                                                    'audio_visual'  => '',
                                                                    'original_docs' => '',
                                                                    'original_docs_sub' => '',
                                                                    'status'        => 1,
                                                                    'created_at'    => date('Y-m-d'),
                                                                ]);

            $data = [];
            foreach ($request->document_name as $key => $value) {
                $data[] = [
                            'component_id'  => $component_id,
                            'dpo_id'        => $request->dpo_id,
                            'user_id'       => Auth::user()->id,
                            'document_type' => $value,
                            'document_url'  => $request->document_links[$key],
                            'status'        => 1,
                            'created_at'    => date('Y-m-d h:i:s'),
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
            $component_id = DB::table('components')->insertGetId([
                                                                'dpo_id'        => $request->dpo_id,
                                                                'user_id'       => Auth::user()->id,
                                                                'dpo_type'      => 'score',
                                                                'component'     => '',
                                                                'audio_visual'  => '',
                                                                'original_docs' => '',
                                                                'original_docs_sub' => '',
                                                                'status'        => 1,
                                                                'created_at'    => date('Y-m-d'),
                                                            ]);
            $data = [
                'component_id'  => $component_id,
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
    public function component(Request $request)
    {
        // DD($request->all());
        try {            
            $table = $request->form_name;
            if(!empty($request->form_name))
            {
            $component_id = DB::table('components')->insertGetId([
                                                                        'dpo_id'        => $request->dpo_id,
                                                                        'user_id'       => Auth::user()->id,
                                                                        'dpo_type'      => 'component',
                                                                        'component'     => $request->component,
                                                                        'audio_visual'  => $request->audiovisual,
                                                                        'original_docs' => $request->originaldocs,
                                                                        'original_docs_sub' => $request->originaldocs1,
                                                                        'status'        => 1,
                                                                        'created_at'    => date('Y-m-d'),
                                                                    ]);

            switch ($request->form_name) {
                case 'digital_copy':   
                    $data = [  
                                'user_id'           => Auth::user()->id, 
                                'component_id'      => $component_id, 
                                'dpo_id'            => $request->dpo_id, 
                                'signature'         => $request->signature, 
                                'format'            => $request->format,
                                'original_item'     => $request->originam_item, 
                                'codec'             => $request->codec, 
                                'bitrate'           => $request->bitrate, 
                                'bitdepth_audio'    => $request->bitdepth_audio, 
                                'bitdepth_video'    => $request->bitdep_video, 
                                'resolution'        => $request->resolution, 
                                'aspect_ratio'      => $request->aspect_ratio, 
                                'frame_rate'        => $request->frame_ratio, 
                                'sample_frequency'  => $request->sample_frequency, 
                                'acquisition_device'=> $request->acquisition, 
                                'notes'             => $request->notes, 
                                'status'            => 1, 
                                'created_at'        => date('Y-m-d h:i:s')
                        ];
                break;
                case 'original_docs':
                    $data = [  
                        'dpo_id'                => $request->dpo_id,
                        'user_id'               => Auth::user()->id,
                        'comonent_id'           => $component_id,
                        'preservation_signature'=> $request->preservation_signature,
                        'original_signature'    => $request->original_signature,
                        'type'                  => $request->type,
                        'format'                => $request->format,
                        'generation'            => $request->generation,
                        'title'                 => $request->title,
                        'author'                => $request->author,
                        'year'                  => $request->year,
                        'support_material'      => $request->support_material,
                        'color_bw'              => $request->color_bw,
                        'sound'                 => $request->sound,
                        'aspect_ratio'          => $request->aspect_ratio,
                        'film_brand'            => $request->film_brand,
                        'carter_brand'          => $request->carter_brand,
                        'carter_material'       => $request->carter_material,
                        'cover_material'        => $request->cover_material,
                        'cement_splices'        => $request->cement_splices,
                        'restored_cs'           => $request->restored_cs,
                        'tape_splices'          => $request->tape_splices,
                        'restored_ts'           => $request->restored_ts,
                        'restored_perforations' => $request->restored_perforations,
                        'restored_frames'       => $request->restored_frames,
                        'notes'                 => $request->notes,
                        'created_at'            => date('Y-m-d h:i:s')
                    ];
                    // dd($data);
                break;
                case 'audiocassette':
                    $data = [ 
                        'component_id'         => $component_id,
                        'user_id'              => Auth::user()->id,
                        'dpo_id'               => $request->dpo_id,
                        'preservation_signature'=> $request->preservation_signature,
                        'original_signature'   => $request->original_signature,
                        'brand'                => $request->brand,
                        'brand_of_box'         => $request->brand_of_box,
                        'cassette_type'        => $request->cassette_type,
                        'noise_reduction'      => $request->noise_reduction,
                        'notes'                => $request->notes,
                        'status'               => 1,
                        'created_at'           => date('Y-m-d')
                    ];

                break;
                case 'dat':
                    $data = [
                        'component_id'         => $component_id,
                        'user_id'              => Auth::user()->id,
                        'dpo_id'               => $request->dpo_id,
                        'preservation_signature' => $request->preservation_signature,
                        'original_signature'   => $request->original_signature,
                        'brand'                => $request->brand,
                        'brand_of_box'         => $request->brand_of_box,
                        'samplerate'           => $request->samplerate,
                        'notes'                => $request->notes,
                        'status'               => 1,
                        'created_at'           => date('Y-m-d')
                    ];
                break;
                case 'tape_details':
                    $data = [
                            'dpo_id'                => $request->dpo_id, 
                            'user_id'               => Auth::user()->id, 
                            'comonent_id'           => $component_id, 
                            'preservation_signature'=> $request->preservation_signature, 
                            'original_signature'    => $request->original_signature, 
                            'brand_of_tape'         => $request->brand_of_tape, 
                            'brand_of_box'          => $request->brand_of_box, 
                            'brand_of_carter'       => $request->brand_of_carter, 
                            'material_of_carter'    => $request->material_of_carter, 
                            'diameter_of_carter'    => $request->diameter_of_carter, 
                            'tape_width'            => $request->tape_width, 
                            'num_of_sides'          => $request->num_of_sides, 
                            'num_of_channels_sideA' => $request->num_of_channels_sideA, 
                            'channels_config_sideA' => $request->channels_config_sideA, 
                            'speed_sideA'           => $request->speed_sideA, 
                            'num_of_channels_sideB' => $request->num_of_channels_sideB, 
                            'channels_config_sideB' => $request->channels_config_sideB, 
                            'speed_sideB'           => $request->speed_sideB, 
                            'eq'                    => $request->speed_sideB, 
                            'notes'                 => $request->notes, 
                            'status'                => 1, 
                            'created_at'            => date('Y-m-d h:i:s')
                    ];

                break;
                case 'phonographicdisks':
                        $data = [
                                    'dpo_id'                => $request->dpo_id,
                                    'preservation_signature'=> $request->preservation_signature,
                                    'original_signature'    => $request->original_signature,
                                    'brand'                 => $request->brand,
                                    'brand_of_box'          => $request->brand_of_box,
                                    'rpm'                   => $request->rpm,
                                    'stylus'                => $request->stylus,
                                    'eq'                    => $request->eq,
                                    'type_of_recording'     => $request->type_of_recording,
                                    'incisions'             => $request->incisions, 
                                    'notes'                 => $request->notes
                        ];
                    break;   
                }

              
            $insert = DB::table($request->form_name)->insert($data);
            if($insert)
                {
                    return response()->json(['status'=>true , 'message' => 'insert Successfully']);
                }
            }
            //code...
        } catch (\Throwable $th) {
            return response()->json(['status'=>false , 'message' => 'You have some error please try later.']);
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
        $totalRecords = DB::table('components')->where('user_id',Auth::user()->id)->count(); 
        $totalRecordswithFilter = DB::table('components')->where('user_id',Auth::user()->id)
        ->whereRaw("CONCAT_WS(' ', dpo_type, component,audio_visual,original_docs,original_docs_sub) LIKE ?", ["%{$searchValue}%"])
        ->count();
 

        // Get records, also we have included search filter as well
        $records = DB::table('components')->where('user_id',Auth::user()->id)                     
            ->whereRaw("CONCAT_WS(' ', dpo_type, component,audio_visual,original_docs,original_docs_sub) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder??'desc') 
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {

            $data_arr[] = array(
                "id"            => $record->id,
                "dpo_type"      => $record->dpo_type,
                "component"     => $record->component??'-',
                "audio_visual"  => $record->audio_visual??'-',
                "original_docs" => $record->original_docs??'-',
                "original_docs_sub"  => $record->original_docs_sub??'-',
                "action"        => '<a href="'.route('dpo.view',encrypt($record->id)).'" class="btn btn-danger btn-sm" title="View DPO"><i class="fs-5 bx bxs-eye"></i>&nbsp;View</a>
                                    <a href="'.route('dpo.pdf',encrypt($record->id)).'" class="btn btn-success btn-sm" title="View PDF"><i class="fs-5 bx bxs-file-pdf"></i>&nbsp;View PDF</a>',
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
   public function view(Request $request , $component_id){
        $component_id = decrypt($component_id);
        $result = DB::table('components')->where('id',$component_id)->first();

        return view('pdf.tapedetails');


   }
   public function pdf(Request $request ,$component_id){
    $result = DB::table('components')->where('id',$component_id)->first();
    return view('pdf.tapedetails');
   }
}
