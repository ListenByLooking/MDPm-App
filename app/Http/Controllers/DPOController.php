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
        if ($request->document_name) {
            //error_log($request, 0);

            //$this->insertDPO($request->artwork_id , $request->dpo_id);
            /*$component_id = DB::table('components')->insertGetId([
                                                                    'artwork_id'    => $request->artwork_id,
                                                                    'dpo_id'        => $request->dpo_id,
                                                                    'user_id'       => Auth::user()->id,
                                                                    'dpo_type'      => 'documentation',
                                                                    'component'     => '',
                                                                    'audio_visual'  => '',
                                                                    'original_docs' => '',
                                                                    'original_docs_sub' => '',
                                                                    'form_name'     => 'documentation',
                                                                    'status'        => 1,
                                                                    'created_at'    => date('Y-m-d'),
                                                                /]);*/
            $insert = true;
            foreach ($request->document_name as $key => $value) {
                $data = [
                    //'component_id'  => $component_id,
                    //'dpo_id'        => $request->dpo_id,
                    'user_id' => Auth::user()->id,
                    'document_type' => $value,
                    'document_url' => $request->document_links[$key],
                    'status' => 1,
                    'created_at' => date('Y-m-d h:i:s'),
                ];
                $comp_id = DB::table('documentation')->insertGetId($data);

                if ($comp_id) {
                    $bridge = [
                        'dpo_id' => $request->dpo_id,
                        'component_id' => $comp_id,
                        'comp_type' => 'Documentation -> ' . $value,
                    ];

                    $insert = $insert && DB::table('dpo_component_bridge')->insert($bridge);
                } else {
                    $insert = false;
                }
            }
            //$insert = DB::table('documentation')->insert($data);
            if ($insert) {
                return response()->json(["status" => true, "message" => "Insert Successfully"]);
            } else {
                return response()->json(["status" => false, "message" => "You have some error"]);
            }
        }
    }

    public function score(Request $request)
    {
        //$this->insertDPO($request->artwork_id , $request->dpo_id);
        /*$component_id = DB::table('components')->insertGetId([
                                                                'artwork_id'    => $request->artwork_id,
                                                                'dpo_id'        => $request->dpo_id,
                                                                'user_id'       => Auth::user()->id,
                                                                'dpo_type'      => 'score',
                                                                'component'     => '',
                                                                'audio_visual'  => '',
                                                                'original_docs' => '',
                                                                'original_docs_sub' => '',
                                                                'form_name'     => 'score',
                                                                'status'        => 1,
                                                                'created_at'    => date('Y-m-d'),
                                                            ]);*/
        $data = [
            //'component_id'  => $component_id,
            //'dpo_id'        => $request->dpo_id,
            'user_id' => Auth::user()->id,
            'message' => $request->score,
            'status' => 1,
            'created_at' => date('Y-m-d h:i:s'),
        ];

        $comp_id = DB::table('score')->insertGetId($data);

        if ($comp_id) {
            $bridge = [
                'dpo_id' => $request->dpo_id,
                'component_id' => $comp_id,
                'comp_type' => 'Score',
            ];

            $insert = DB::table('dpo_component_bridge')->insert($bridge);
        } else {
            $insert = false;
        }

        //$insert = DB::table('score')->insert($data);
        if ($insert) {
            return response()->json(["status" => true, "message" => "Insert Successfully"]);
        } else {
            return response()->json(["status" => false, "message" => "You have some error"]);
        }

    }

    public function component(Request $request)
    {
        // DD($request->all());
        try {
            $table = $request->form_name;
            if (!empty($request->form_name)) {
                $this->insertDPO($request->artwork_id, $request->dpo_id);
                $component_id = DB::table('components')->insertGetId([
                    'artwork_id' => $request->artwork_id,
                    'dpo_id' => $request->dpo_id,
                    'user_id' => Auth::user()->id,
                    'dpo_type' => 'component',
                    'component' => $request->component,
                    'audio_visual' => $request->audiovisual,
                    'original_docs' => $request->originaldocs,
                    'original_docs_sub' => $request->originaldocs1,
                    'form_name' => $request->form_name,
                    'status' => 1,
                    'created_at' => date('Y-m-d'),
                ]);

                switch ($request->form_name) {
                    case 'digital_copy':
                        $data = [
                            'user_id' => Auth::user()->id,
                            'component_id' => $component_id,
                            'dpo_id' => $request->dpo_id,
                            'signature' => $request->signature,
                            'format' => $request->format,
                            'original_item' => $request->originam_item,
                            'codec' => $request->codec,
                            'bitrate' => $request->bitrate,
                            'bitdepth_audio' => $request->bitdepth_audio,
                            'bitdepth_video' => $request->bitdep_video,
                            'resolution' => $request->resolution,
                            'aspect_ratio' => $request->aspect_ratio,
                            'frame_rate' => $request->frame_ratio,
                            'sample_frequency' => $request->sample_frequency,
                            'acquisition_device' => $request->acquisition,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d h:i:s')
                        ];
                        break;
                    case 'original_docs':
                        $data = [
                            'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'type' => $request->type,
                            'format' => $request->format,
                            'generation' => $request->generation,
                            'title' => $request->title,
                            'author' => $request->author,
                            'year' => $request->year,
                            'support_material' => $request->support_material,
                            'color_bw' => $request->color_bw,
                            'sound' => $request->sound,
                            'aspect_ratio' => $request->aspect_ratio,
                            'film_brand' => $request->film_brand,
                            'carter_brand' => $request->carter_brand,
                            'carter_material' => $request->carter_material,
                            'cover_material' => $request->cover_material,
                            'cement_splices' => $request->cement_splices,
                            'restored_cs' => $request->restored_cs,
                            'tape_splices' => $request->tape_splices,
                            'restored_ts' => $request->restored_ts,
                            'restored_perforations' => $request->restored_perforations,
                            'restored_frames' => $request->restored_frames,
                            'notes' => $request->notes,
                            'created_at' => date('Y-m-d h:i:s')
                        ];
                        // dd($data);
                        break;
                    case 'audiocassette':
                        $data = [
                            'component_id' => $component_id,
                            'user_id' => Auth::user()->id,
                            'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'cassette_type' => $request->cassette_type,
                            'noise_reduction' => $request->noise_reduction,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d')
                        ];

                        break;
                    case 'dat':
                        $data = [
                            'component_id' => $component_id,
                            'user_id' => Auth::user()->id,
                            'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'samplerate' => $request->samplerate,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d')
                        ];
                        break;
                    case 'tape_details':
                        $data = [
                            'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand_of_tape' => $request->brand_of_tape,
                            'brand_of_box' => $request->brand_of_box,
                            'brand_of_carter' => $request->brand_of_carter,
                            'material_of_carter' => $request->material_of_carter,
                            'diameter_of_carter' => $request->diameter_of_carter,
                            'tape_width' => $request->tape_width,
                            'num_of_sides' => $request->num_of_sides,
                            'num_of_channels_sideA' => $request->num_of_channels_sideA,
                            'channels_config_sideA' => $request->channels_config_sideA,
                            'speed_sideA' => $request->speed_sideA,
                            'num_of_channels_sideB' => $request->num_of_channels_sideB,
                            'channels_config_sideB' => $request->channels_config_sideB,
                            'speed_sideB' => $request->speed_sideB,
                            'eq' => $request->speed_sideB,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d h:i:s')
                        ];

                        break;
                    case 'phonographicdisks':
                        $data = [
                            'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'rpm' => $request->rpm,
                            'stylus' => $request->stylus,
                            'eq' => $request->eq,
                            'type_of_recording' => $request->type_of_recording,
                            'incisions' => $request->incisions,
                            'notes' => $request->notes
                        ];
                        break;
                }


                $insert = DB::table($request->form_name)->insert($data);
                if ($insert) {
                    return response()->json(['status' => true, 'message' => 'insert Successfully']);
                }
            }
            //code...
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'You have some error please try later.']);
        }
    }

    public function search(Request $request)
    {

        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length; // total number of rows per page
        $columnIndex_arr = $request->order;
        $columnName_arr = $request->columns;
        $order_arr = $request->order;
        $search_arr = $request->search;
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $request->dpo_id])->count();
        $totalRecordswithFilter = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $request->dpo_id])
            ->whereRaw("CONCAT_WS(' ', comp_type) LIKE ?", ["%{$searchValue}%"])
            ->count();

        //error_log($columnName, 0);

        // Get records, also we have included search filter as well
        $records = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $request->dpo_id])
            ->whereRaw("CONCAT_WS(' ', comp_type) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder ?? 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        //error_log($records, 0);

        $data_arr = array();

        foreach ($records as $record) {

            //error_log(explode(" -> ", $record->comp_type, PHP_INT_MAX)[0]);

            $data_arr[] = array(

                "id" => $record->id,
                "component_id" => $record->component_id,
                "comp_type" => $record->comp_type,
                /*"component"     => $record->component??'-',
                "audio_visual"  => $record->audio_visual??'-',
                "original_docs" => $record->original_docs??'-',
                "original_docs_sub"  => $record->original_docs_sub??'-',*/
                "action" => '<a href="' . route('dpo.view', encrypt($record->id)) . '" class="btn btn-success btn-sm" title="View Component"><i class="fs-5 bx bxs-eye"></i>&nbsp;View</a>
                                    <a href="javascript:;" onclick="remove(\'' . encrypt($record->id) . '\')" class="btn btn-sm btn-danger" title="Delete DPO"><i class="fs-5 bx bx-trash"></i></a>',
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

    public function searchlist(Request $request)
    {

        //error_log("Ciao", 0);

        $draw = $request->draw;
        $start = $request->start;
        $rowperpage = $request->length; // total number of rows per page
        $columnIndex_arr = $request->order;
        $columnName_arr = $request->columns;
        $order_arr = $request->order;
        $search_arr = $request->search;
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = DB::table('dpos')->where([/*'user_id'=>Auth::user()->id ,*/ 'artwork_id' => $request->artwork_id])->count();
        $totalRecordswithFilter = DB::table('dpos')->where([/*'user_id'=>Auth::user()->id ,*/ 'artwork_id' => $request->artwork_id])
            ->whereRaw("CONCAT_WS(' ', dpo_year, dpo_venue, dpo_city) LIKE ?", ["%{$searchValue}%"])
            ->count();

        //error_log($totalRecords, 0);

        // Get records, also we have included search filter as well
        $records = DB::table('dpos')->where([/*'user_id'=>Auth::user()->id ,*/ 'artwork_id' => $request->artwork_id])
            ->whereRaw("CONCAT_WS(' ', dpo_year, dpo_venue, dpo_city) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder ?? 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $count = 0;
        $num_arr = array();
        $count_arr = array();

        foreach ($records as $record) {
            $num_arr[] = $record->id;
        }

        asort($num_arr);

        foreach ($num_arr as $num) {
            $count++;
            $count_arr[$num] = $count;
        }

        //error_log($records, 0);

        $data_arr = array();

        foreach ($records as $record) {

            $data_arr[] = array(
                "id" => 'DPO' . $count_arr[$record->id],
                "dpo_year" => $record->dpo_year,
                "dpo_venue" => $record->dpo_venue,
                "dpo_city" => $record->dpo_city,
                "action" => '<!--a href="\'.route(\'dpo.view\',encrypt($record->id)).\'" class="btn btn-success btn-sm" title="View DPO"><i class="fs-5 bx bxs-eye"></i>&nbsp;View</a-->
                                <a href="' . route('artwork.add', [encrypt($request->artwork_id), encrypt($record->id), encrypt($count_arr[$record->id])]) . '" class="btn btn-primary btn-sm" title="View DPO"><i class="fs-5 bx bxs-eye"></i>&nbsp;View DPO</a>
                                <a href="javascript:;" onclick="remove(\'' . encrypt($record->id) . '\')" class="btn btn-sm btn-danger" title="Delete DPO"><i class="fs-5 bx bx-trash"></i></a>',
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

    public function view(Request $request, $id)
    {

        //error_log($request, 0);

        $record = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'id' => decrypt($id)])->first();
        //error_log($record, 0);
        $component_type = explode(" -> ", $record->comp_type, PHP_INT_MAX)[0];
        $component_id = $record->component_id;

        if ($component_type == 'Documentation') {

            $records = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $record->dpo_id])
                ->whereRaw("CONCAT_WS(' ', comp_type) LIKE ?", ["%{$component_type}%"])->get();

            $result = array();

            foreach ($records as $record) {

                $result[] = DB::table('documentation')->where(['id' => $record->component_id])->first();
            }

            return view('pdf.documentation', compact('result'));
        } else if ($component_type == 'Score') {
            $result = DB::table('score')->where('id', $component_id)->first();
            //error_log($result, 0);
            return view('pdf.score', compact('result'));
        } else {
            $component = explode(" -> ", decrypt($component_type), PHP_INT_MAX)[-1];
            //$result = DB::table('documentation')->where('id', $component_id)->first();
            // dd($result->form_name);
            switch ($component) {
                case 'tape_details':
                    $tapedetails = DB::table('tape_details')->where('component_id', $component_id)->first();
                    return view('pdf.tapedetails', compact('result', 'tapedetails'));
                    break;
                case 'original_docs':
                    $original_docs = DB::table('original_docs')->where('component_id', $component_id)->first();
                    return view('pdf.originaldocs', compact('result', 'original_docs'));
                    break;
                case 'digital_copy':
                    $digital_copy = DB::table('digital_copy')->where('component_id', $component_id)->first();
                    return view('pdf.digitalcopy', compact('result', 'digital_copy'));
                    break;
                case 'score':
                    $score = DB::table('score')->where('id', $component_id)->first();

                    break;
                case 'documentation':
                    $documentation = DB::table('documentation')->where('id', $component_id)->get();

                    return view('pdf.documentation', compact('result', 'documentation'));
                    break;
                case 'dat':
                    $dat = DB::table('dat')->where('component_id', $component_id)->first();
                    return view('pdf.dat', compact('result', 'dat'));
                    break;
                case 'phonographicdisks':
                    $phonographicdisks = DB::table('phonographicdisks')->where('component_id', $component_id)->first();
                    return view('pdf.phonographic', compact('result', 'phonographicdisks'));
                case 'audiocassette':
                    $audiocassette = DB::table('audiocassette')->where('component_id', $component_id)->first();
                    return view('pdf.audiocassette', compact('result', 'audiocassette'));
                    break;
            }
        }
    }

    public function option(Request $request)
    {
        $result = DB::table('component_config')->where(['key_name' => $request->option, 'key_value' => $request->value/*, 'user_id' => Auth::user()->id*/])->first();
        if ($result) {
            return ['status' => false, 'message' => 'Given Name Already exists'];
        } else {
            DB::table('component_config')->insert([
                //'user_id' => Auth::user()->id ,
                'key_name' => $request->option,
                'key_value' => $request->value
            ]);
            return ['status' => true, 'message' => 'insert Successfully'];
        }
    }

    public function listOption(Request $request)
    {
     $response =  DB::table($request->table_name)/*->where('user_id',Auth::user()->id)->pluck('key_value','key_name')*/->get();

     $data_arr = array();

     foreach ($response as $item) {

         $data_arr[] = array(
             "table_id" => $request->table_name,
             "index"            => $item->id,
             "value"      => $item->title,
         );
     }
        /*foreach ( $data_arr as $var ) {
            error_log(implode(", ", $var), 0);
        }*/
     return response()->json($data_arr);
   }
   public function pdf(Request $request ,$component_id){
    header("Content-type:application/pdf");
    $result = DB::table('components')->where('id',$component_id)->first();
    return view('pdf.tapedetails');
   }

   public function delete(Request $request)
   {
    $id            = $request->id;
    $component    = DB::table('dpo_component_bridge')->where('id',decrypt($id))->first();
    $component_id = $component->component_id;
    $component_type = explode(" -> ", $component->comp_type, PHP_INT_MAX)[0];

    switch ($component_type) {
        case 'audiocassette':
            DB::table('audiocassette')->where('component_id',$componemt_id)->delete();
        break;
        case 'dat':
            DB::table('dat')->where('component_id',$componemt_id)->delete();
        break;
        case 'digital_copy':
            DB::table('digital_copy')->where('component_id',$componemt_id)->delete();
        break;
        case 'Documentation':
            DB::table('documentation')->where('id',$component_id)->delete();
        break;
        case 'original_docs':
            DB::table('original_docs')->where('component_id',$componemt_id)->delete();
        break;
        case 'phonographicdisks':
            DB::table('phonographicdisks')->where('component_id',$componemt_id)->delete();
        break;
        case 'Score':
            DB::table('score')->where('id',$component_id)->delete();
        break;
        case 'tape_details':
            DB::table('tape_details')->where('component_id',$componemt_id)->delete();
        break;

    }

    //error_log($component_id, 0);

    DB::table('dpo_component_bridge')->where('component_id',$component_id)->delete();

   }

    public function insertDPO(Request $request)
   {
    // dd(['artwork_id'=>$artwork , 'dpo_id' => $id , 'user_id' => Auth::user()->id]);
       try{

        $dpo = DB::table('dpos')->where(['artwork_id'=>$request->artwork_id, 'dpo_year'=>$request->dpo_year, 'dpo_venue'=>$request->dpo_venue, 'dpo_city'=>$request->dpo_city /*, 'id' => $id , 'user_id' => Auth::user()->id*/])->first();
        if(!$dpo) {
            $insert = DB::table('dpos')->insert(['artwork_id' => $request->artwork_id, 'dpo_year' => $request->dpo_year, 'dpo_venue' => $request->dpo_venue, 'dpo_city' => $request->dpo_city, 'user_id' => Auth::user()->id, 'created_at' => date('Y-m-d h:i:s'), 'status' => 1 /*, 'dpo_id' => $id */]);
            if ($insert) {
                return redirect()->route('artwork.view',encrypt($request->artwork_id))->with(['status'=>true , 'message'=>'DPO inserted successfully']);
            } else {
                return redirect()->route('artwork.view',encrypt($request->artwork_id))->with(['status'=>false , 'message'=>'You have some error. please try later']);
            }
        }

           return redirect()->route('artwork.view',encrypt($request->artwork_id))->with(['status'=>false , 'message'=>'DPO already present']);

       } catch (\Throwable $th) {
           return redirect()->route('artwork.view',encrypt($request->artwork_id))->with(['status'=>false , 'message'=>'You have some error. please try later']);
       }

   }

    public function deleteDPO(Request $request)
    {
        $id            = $request->id;
        DB::table('dpos')->where('id',decrypt($id))->delete();
    }
}
