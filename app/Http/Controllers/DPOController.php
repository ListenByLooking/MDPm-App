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
    public function component(Request $request)
    {
        $table = $request->form_name;
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
            case 'original_docs':   
                $data = [  
                            `user_id`           => Auth::user()->id, 
                            `component_id`      =>$component_id, 
                            `dpo_id`            => $request->dpo_id, 
                            `signature`         => $request->signature, 
                            `format`            => $request->format,
                            `original_item`     => $request->originam_item, 
                            `codec`             => '', 
                            `bitrate`           => $request->bitrate, 
                            `bitdepth_audio`    => $request->bitdepth_audio, 
                            `bitdepth_video`    => $request->bitdep_video, 
                            `resolution`        => $request->resolution, 
                            `aspect_ratio`      => $request->aspect_ratio, 
                            `frame_rate`        => $request->frame_ratio, 
                            `sample_frequency`  => $request->sample_frequency, 
                            `acquisition_device`=> $request->acquisition, 
                            `notes`             => $request->notes, 
                            `status`            => 1, 
                            `created_at`        => date('Y-m-d h:i:s')
                    ];
            break;
            case 'original_docs':
                $data = [  
                    `dpo_id`                => $request->dpo_id,
                    `user_id`               => $request->Auth::user()->id,
                    `comonent_id`           => $component_id,
                    `preservation_signature`=> $request->preservation_signature,
                    `original_signature`    => $request->original_signature,
                    `type`                  => $request->type,
                    `format`                => $request->format,
                    `generation`            => $request->generation,
                    `title`                 => $request->title,
                    `author`                => $request->author,
                    `year`                  => $request->year,
                    `support_material`      => $request->support_material,
                    `color_bw`              => $request->color_bw,
                    `sound`                 => $request->sound,
                    `aspect_ratio`          => $request->aspect_ratio,
                    `film_brand`            => $request->film_brand,
                    `carter_brand`          => $request->carter_brand,
                    `carter_material`       => $request->carter_material,
                    `cover_material`        => $request->cover_material,
                    `cement_splices`        => $request->cement_splices,
                    `restored_cs`           => $request->restored_cs,
                    `tape_splices`          => $request->tape_splices,
                    `restored_ts`           => $request->restored_ts,
                    `restored_perforations` => $request->restored_perforations,
                    `restored_frames`       => $request->restored_frames,
                    `notes`                 => $request->notes,
                    `created_at`            => date('Y-m-d h:i:s')
                ];

            break;
            case 'audiocassette':
                $data = [ 
                     `component_id`         => $component_id,
                     `user_id`              => Auth::user()->id,
                     `dpo_id`               => $request->dpo_id,
                     `preservation_signature`=> $request->preservation_signature,
                     `original_signature`   => $request->original_signature,
                     `brand`                => $request->brand,
                     `brand_of_box`         => $request->brand_of_box,
                     `cassette_type`        => $request->cassette_type,
                     `noise_reduction`      => $request->noise_reduction,
                     `notes`                => $request->notes,
                     `status`               => 1,
                     `created_at`           => date('Y-m-d')
                ];

            break;
            case 'dat':
                $data = [
                     `component_id`         => $component_id,
                     `user_id`              => Auth::user()->id,
                     `dpo_id`               => $request->dpo_id,
                     `preservation_signature` => $request->preservation_signature,
                     `original_signature`   => $request->original_signature,
                     `brand`                => $request->brand,
                     `brand_of_box`         => $request->brand_of_box,
                     `samplerate`           => $request->samplerate,
                     `notes`                => $request->notes,
                     `status`               => 1,
                     `created_at`           => date('Y-m-d')
                ];
            break;
            case 'tape_details':
                $data = [
                        `dpo_id`                => $request->id, 
                        `user_id`               => Auth::user()->id, 
                        `comonent_id`           => $component_id, 
                        `preservation_signature`=> $request->preservation_signature, 
                        `original_signature`    => $request->original_signature, 
                        `brand_of_tape`         => $request->brand_of_tape, 
                        `brand_of_box`          => $request->brand_of_box, 
                        `brand_of_carter`       => $request->brand_of_carter, 
                        `material_of_carter`    => $request->material_of_carter, 
                        `diameter_of_carter`    => $request->diameter_of_carter, 
                        `tape_width`            => $request->tape_width, 
                        `num_of_sides`          => $request->num_of_sides, 
                        `num_of_channels_sideA` => $request->num_of_channels_sideA, 
                        `channels_config_sideA` => $request->channels_config_sideA, 
                        `speed_sideA`           => $request->speed_sideA, 
                        `num_of_channels_sideB` => $request->num_of_channels_sideB, 
                        `channels_config_sideB` => $request->channels_config_sideB, 
                        `speed_sideB`           => $request->speed_sideB, 
                        `eq`                    => $request->speed_sideB, 
                        `notes`                 => $request->notes, 
                        `status`                => 1, 
                        `created_at`            => date('Y-m-d h:i:s')
                ];

            break;

            case 'phonographicdisks':
                    $data = [
                                `dpo_id` => $request->dpo_id,
                                `preservation_signature` => $request->preservation_signature,
                                `original_signature`=> $request->original_signature,
                                `brand`=>$request->brand,
                                `brand_of_box`=>$request->brand_of_box,
                                `rpm`=>$request->rpm,
                                `stylus`=>$request->stylus,
                                `eq`=>$request->eq,
                                `type_of_recording`=>$request->notes,
                                `incisions`=>'', 
                                `notes`=>''
                    ];
                break;  
            
            default:
                # code...
                break;
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
}
