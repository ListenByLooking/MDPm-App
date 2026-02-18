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

    public function addExisting(Request $request)
    {
        //try {
            $request->validate([
                'dpo_id' => 'required|integer',
                'bridge_id' => 'required|integer'
            ]);

            // Prevent duplicates
            $exists = DB::table('dpo_component_bridge')
                ->where('id', $request->bridge_id)
                ->first();

            if (!$exists) {
                return response()->json([
                    "status" => false,
                    "message" => "Original component link not found."
                ]);
            }

            // 2. Prevent duplicates for this DPO
            $alreadyLinked = DB::table('dpo_component_bridge')
                ->where('dpo_id', $request->dpo_id)
                ->where('component_id', $request->component_id)
                ->exists();

            if ($alreadyLinked) {
                return response()->json([
                    "status" => 'warning',
                    "message" => "This component is already linked to this DPO."
                ]);
            }

            // 3. Clone the row (except bridge_id)
            $newRow = [
                'dpo_id' => $request->dpo_id,          // override
                'component_id' => $exists->component_id,
                'component_type' => $exists->component_type,
                //'created_at' => now(),
            ];

            // 4. Insert the cloned row
            $insert = DB::table('dpo_component_bridge')->insert($newRow);

            return response()->json([
                "status" => $insert,
                "message" => $insert ? "Component added successfully!" : "Failed to link component."
            ]);

        /*} catch (\Throwable $th) {
            error_log($th, 0);
        }*/
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
                        'component_type' => 'Documentation -> ' . $value,
                    ];

                    $insert = $insert && DB::table('dpo_component_bridge')->insert($bridge);
                } else {
                    $insert = false;
                }
            }
            //$insert = DB::table('documentation')->insert($data);
            if ($insert) {
                return response()->json(["status" => true, "message" => "Inserted Successfully!"]);
            } else {
                return response()->json(["status" => false, "message" => "You have some Errors"]);
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
                'component_type' => 'Score',
            ];

            $insert = DB::table('dpo_component_bridge')->insert($bridge);
        } else {
            $insert = false;
        }

        //$insert = DB::table('score')->insert($data);
        if ($insert) {
            return response()->json(["status" => true, "message" => "Inserted successfully!"]);
        } else {
            return response()->json(["status" => false, "message" => "You have some Errors"]);
        }

    }

    private function buildComponentPath(Request $request)
    {
        // Friendly name mapping (local to this function)
        $friendly = [
            // Level 1
            'General' => 'General Object',
            'Hardware' => 'Hardware',
            'Software' => 'Software',
            'AudioVisual' => 'Audio/Visual',

            // Level 2
            'Video' => 'Video',
            'Photo' => 'Photograph',
            'Audio' => 'Audio',
            'Film' => 'Film',

            // Level 3
            'Original' => 'Original Item',
            'Digital' => 'Digital Copy',

            // Level 4 (audio originals)
            'audiocassette' => 'Audio Cassette',
            'dat' => 'Digital Audio Tape',
            'openreeltape' => 'Open Reel Tape',
            'phonographicdisk' => 'Phonographic Disk',
            'digitalaudio' => 'Digital Audio',
        ];

        // Helper closure to convert raw → friendly
        $f = fn($v) => $friendly[$v] ?? $v;

        $parts = [];

        // Level 1: Component
        if ($request->component) {
            $parts[] = $f($request->component);
        }

        // Level 2: Audiovisual
        if ($request->audiovisual && $request->component === 'AudioVisual') {
            $parts[] = $f($request->audiovisual);
        }

        // Level 3: Original / Digital
        if ($request->originaldocs) {
            $parts[] = $f($request->originaldocs);
        }

        // Level 4: Subtype (for original items)
        if ($request->originaldocs_sub) {
            $parts[] = $f($request->originaldocs_sub);
        }

        // NEW: Level 4 for AUDIO DIGITAL COPY
        if ($request->form_name === 'digital_copy_audio' && $request->original_type) {
            $parts[] = $f($request->original_type);
        }

        return "Component (" . implode(" -> ", $parts) . ")";
    }

    public function component(Request $request)
    {
        // DD($request->all());
        try {
            $table = $request->form_name;
            if (!empty($table)) {
                /*$this->insertDPO($request->artwork_id, $request->dpo_id);
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
                ]);*/

                //error_log($table, 0);

                switch ($table) {
                    case 'general_object':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'name' => $request->name,
                            'creator' => $request->creator,
                            'year' => $request->year, // must be a DATE field
                            'description' => $request->description,
                            'type' => $request->type,
                            'identifier' => $request->identifier,
                            'brand' => $request->brand,
                            'material' => $request->material,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s')
                        ];
                        break;
                    case 'software':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'name' => $request->name,
                            'developer' => $request->developer,
                            'version' => $request->version,
                            'license' => $request->license,
                            'os' => $request->os,
                            'type' => $request->type,
                            'year' => $request->year,
                            'language' => $request->language,
                            'requirements' => $request->requirements,
                            'link' => $request->link,
                            'library' => $request->library,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'hardware':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'name' => $request->name,
                            'manufacturer' => $request->manufacturer,
                            'model' => $request->model,
                            'serial' => $request->serial,
                            'os' => $request->os,
                            'year' => $request->year,
                            'cpu' => $request->cpu,
                            'ram' => $request->ram,
                            'storage' => $request->storage,
                            'description' => $request->description,
                            'display' => $request->display,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'photo':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->osignature,
                            'type_of_support' => $request->type,
                            'format' => $request->format,
                            'title' => $request->title,
                            'author' => $request->author,
                            'year' => $request->year,
                            'support_material' => $request->support_material,
                            'color' => $request->color,
                            // aspect ratio → ar
                            'ar' => $request->aspect_ratio,
                            'brand' => $request->brand,
                            'dimensions' => $request->dimensions,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'digital_copy_photo':

                        // Convert "__NULL__" to actual null ONLY for original_item
                        $originalItem = $request->original_item === "__NULL__" ? null : $request->original_item;

                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            // FIELD MAPPINGS
                            'filename' => $request->signature,
                            'format' => $request->format,
                            'id_original' => $originalItem,
                            'bitdepth' => $request->abit,
                            'resolution' => $request->resolution,
                            'ar' => $request->aspect_ratio,
                            'filesize' => $request->filesize,
                            'acquisition_device' => $request->acquisition_device,
                            'media' => $request->media,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'video':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'format' => $request->format,
                            'type_of_signal' => $request->type_of_signal,
                            'title' => $request->title,
                            'author' => $request->author,
                            'year' => $request->year,
                            'support_material' => $request->support_material,
                            'color' => $request->color,
                            'sound' => $request->sound,
                            'abitdepth' => $request->abit,
                            'frequency' => $request->fsaudio,
                            'ar' => $request->aspect_ratio,
                            'brand' => $request->brand,
                            'carter_material' => $request->carter_material,
                            'cover_material' => $request->cover_material,
                            'standard' => $request->standard,
                            'fps' => $request->fps,
                            'resolution' => $request->resolution,
                            'vbitdepth' => $request->vbit,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'film':
                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'type_of_support' => $request->type_of_support,
                            'format' => $request->format,
                            'title' => $request->title,
                            'author' => $request->author,
                            'year' => $request->year,
                            'support_material' => $request->support_material,
                            'color' => $request->color,
                            'sound' => $request->sound,
                            'ar' => $request->aspect_ratio,
                            'film_brand' => $request->film_brand,
                            'carter_brand' => $request->carter_brand,
                            'carter_material' => $request->carter_material,
                            'cover_material' => $request->cover_material,
                            'fps' => $request->fps,
                            'cement_splices' => $request->cement_splices,
                            'restored_cs' => $request->restored_cs,
                            'tape_splices' => $request->tape_splices,
                            'restored_ts' => $request->restored_ts,
                            'restored_perforations' => $request->restored_perforations,
                            'restored_frames' => $request->restored_frames,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'digital_copy_vf':

                        // Convert hh:mm:ss → seconds
                        list($h, $m, $s) = explode(':', $request->duration);
                        $durationSeconds = $h * 3600 + $m * 60 + $s;

                        // Convert "__NULL__" to actual null ONLY for original_item
                        $originalItem = $request->original_item === "__NULL__" ? null : $request->original_item;

                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            // BASIC FIELDS
                            'filename' => $request->signature,
                            'format' => $request->format,
                            'id_original' => $originalItem,

                            // ORIGINAL TYPE (Film / Video)
                            'original_type' => $request->audiovisual,

                            // VIDEO DIGITAL FIELDS
                            'codec' => $request->codec,
                            'bitrate' => $request->bitrate,
                            'duration' => $durationSeconds,
                            'abitdepth' => $request->abit,
                            'channel_config' => $request->channel_config,
                            'vbitdepth' => $request->vbit,
                            'resolution' => $request->resolution,
                            'ar' => $request->aspect_ratio,
                            'frame_rate' => $request->frame_rate,
                            'frequency' => $request->fsaudio,
                            'filesize' => $request->filesize,
                            'acquisition_device' => $request->acquisition_device,
                            'media' => $request->media,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    /*case 'original_docs':
                        $data = [
                            //'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            //'component_id' => $component_id,
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
                        break;*/
                    case 'audiocassette':
                        $data = [
                            //'component_id' => $component_id,
                            'user_id' => Auth::user()->id,
                            //'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'cassette_type' => $request->cassette_type,
                            'noise_reduction' => $request->noise_reduction,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'dat':
                        $data = [
                            //'component_id' => $component_id,
                            'user_id' => Auth::user()->id,
                            //'dpo_id' => $request->dpo_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'samplerate' => $request->samplerate,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'tape':
                        $data = [
                            //'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            //'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand_of_tape' => $request->brand_of_tape,
                            'material_of_tape' => $request->material_of_tape,
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
                            'noise_reduction' => $request->noise_reduction,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'phonographicdisk':
                        $data = [
                            //'dpo_id' => $request->dpo_id,
                            'user_id' => Auth::user()->id,
                            //'component_id' => $component_id,
                            'preservation_signature' => $request->preservation_signature,
                            'original_signature' => $request->original_signature,
                            'brand' => $request->brand,
                            'brand_of_box' => $request->brand_of_box,
                            'rpm' => $request->rpm,
                            'stylus' => $request->stylus,
                            'eq' => $request->eq,
                            'type_of_recording' => $request->type_of_recording,
                            'incisions' => $request->incisions,
                            'notes' => $request->notes,
                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'digital_audio':

                        // Convert hh:mm:ss → seconds
                        list($h, $m, $s) = explode(':', $request->duration);
                        $durationSeconds = $h * 3600 + $m * 60 + $s;

                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            'signature' => $request->signature,
                            'container' => $request->container,
                            'encoding' => $request->encoding,
                            'bitrate' => $request->bitrate,
                            'bitdepth' => $request->bitdepth,
                            'duration' => $durationSeconds,
                            'channel_configuration' => $request->channel_configuration,
                            'checksum' => $request->checksum,
                            'frequency' => $request->frequency,
                            'filesize' => $request->filesize,
                            'media' => $request->media,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                    case 'digital_copy_audio':

                        list($h, $m, $s) = explode(':', $request->duration);
                        $durationSeconds = $h * 3600 + $m * 60 + $s;

                        // Convert "__NULL__" to actual null ONLY for original_item
                        $originalItem = $request->original_item === "__NULL__" ? null : $request->original_item;

                        $data = [
                            'user_id' => Auth::id(),
                            //'component_id' => $component_id,
                            //'dpo_id' => $request->dpo_id,

                            'filename' => $request->signature,
                            'container' => $request->container,
                            'encoding' => $request->encoding,
                            'original_type' => $request->original_type,   // NOW CORRECT
                            'id_original' => $originalItem,
                            'bitrate' => $request->bitrate,
                            'bitdepth' => $request->bitdepht,
                            'duration' => $durationSeconds,
                            'channel_config' => $request->channel_config,
                            'checksum' => $request->checksum,
                            'frequency' => $request->frequency,
                            'filesize' => $request->filesize,
                            'acquisition_device' => $request->acquisition_device,
                            'media' => $request->media,
                            'notes' => $request->notes,

                            'status' => 1,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        break;
                }

                $comp_id = DB::table($request->form_name)->insertGetId($data);

                //error_log($comp_id, 0);

                if ($comp_id) {
                    $bridge = [
                        'dpo_id' => $request->dpo_id,
                        'component_id' => $comp_id,
                        'component_type' => $this->buildComponentPath($request),
                    ];

                    $insert = DB::table('dpo_component_bridge')->insert($bridge);
                } else {
                    $insert = false;
                }

                if ($insert) {
                    return response()->json(['status' => true, 'message' => 'Inserted Successfully!']);
                }
            }
            //code...
        } catch (\Throwable $th) {
            //error_log($th, 0);
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
            ->whereRaw("CONCAT_WS(' ', component_type) LIKE ?", ["%{$searchValue}%"])
            ->count();

        //error_log($columnName, 0);

        // Get records, also we have included search filter as well
        $records = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $request->dpo_id])
            ->whereRaw("CONCAT_WS(' ', component_type) LIKE ?", ["%{$searchValue}%"])
            ->orderBy($columnName, $columnSortOrder ?? 'desc')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        //error_log($records, 0);

        $data_arr = array();

        foreach ($records as $record) {

            //error_log(explode(" -> ", $record->component_type, PHP_INT_MAX)[0]);

            $data_arr[] = array(

                "id" => $record->id,
                "component_id" => $record->component_id,
                "component_type" => $record->component_type,
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
        $map = [
            'Audio Cassette' => 'audiocassette',
            'Digital Audio Tape' => 'dat',
            'Open Reel Tape' => 'tape',
            'Phonographic Disk' => 'phonographicdisk',
            'Digital Audio' => 'digital_audio',
            'Digital Copy Audio' => 'digital_copy_audio',
            'Digital Copy Photo' => 'digital_copy_photo',
            'Digital Copy Video' => 'digital_copy_vf',
            'Digital Copy Film' => 'digital_copy_vf',
            'Photo' => 'photo',
            'Video' => 'video',
            'Film' => 'film',
            'General Object' => 'general_object',
            'Hardware' => 'hardware',
            'Software' => 'software',
        ];

        //error_log($request, 0);

        $record = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'id' => decrypt($id)])->first();
        //error_log($record, 0);

        $raw = $record->component_type;

// Case 1: Score
        /*if ($raw === 'Score') {
            $component = 'Score';
        }*/

// Case 2: Documentation
        /*elseif (str_starts_with($raw, 'Documentation')) {
            $component = 'Documentation';
        }*/

// Case 3: Component (...)
        /*else {
            if (preg_match('/Component\s*\((.*)\)/', $raw, $matches)) {
                $chain = $matches[1]; // e.g. "Audio/Visual -> Audio -> Digital Copy -> Audio Cassette"
                $segments = array_map('trim', explode('->', $chain));

                // SPECIAL CASE: Digital Copy of Audio (or any Digital Copy with original_type)
                // Example: [ "Audio/Visual", "Audio", "Digital Copy", "Audio Cassette" ]
                if (in_array('Digital Copy', $segments, true) && count($segments) > 3) {
                    // Use the second-last element → "Digital Copy"
                    $component = $segments[count($segments) - 2];
                } else {
                    // Default: use the last element
                    $component = end($segments);
                }
            } else {
                $component = $raw; // fallback
            }
        }*/

        $component = $this->resolveTableName($raw);

        //error_log($component, 0);

        $component_id = $record->component_id;

        if ($component == 'documentation') {

            $records = DB::table('dpo_component_bridge')->where([/*'user_id'=>Auth::user()->id ,'artwork_id'=>$request->artwork_id , */ 'dpo_id' => $record->dpo_id])
                ->whereRaw("CONCAT_WS(' ', component_type) LIKE ?", ["%{$component}%"])->get();

            $result = array();

            foreach ($records as $record) {

                $result[] = DB::table('documentation')->where(['id' => $record->component_id])->first();
            }

            return view('pdf.documentation', compact('result'));
        } else if ($component == 'score') {
            $result = DB::table('score')->where('id', $component_id)->first();
            //error_log($result, 0);
            return view('pdf.score', compact('result'));
        } else {
            //$cfg = $map[$component] ?? null;

            $data = DB::table($component)->where('id', $component_id)->first();

            error_log(print_r($data, true));

            /*return view('pdf.pdf', [
                'form' => $cfg['form'],
                'data' => $data
            ]);*/

            switch ($component) {
                case 'tape':
                    //$tapedetails = DB::table('tape_details')->where('component_id', $component_id)->first();
                    return view('pdf.tape', compact('data'));
                /*case 'original_docs':
                    $original_docs = DB::table('original_docs')->where('component_id', $component_id)->first();
                    return view('pdf.originaldocs', compact('result', 'original_docs'));*/
                case 'digital_copy_audio':
                    //$digital_copy = DB::table('digital_copy')->where('component_id', $component_id)->first();
                    return view('pdf.digitalcopy_audio', compact('data'));
                case 'digital_audio':
                    return view('pdf.digitalaudio', compact('data'));
                case 'digital_copy_photo':
                    return view('pdf.digitalcopy_photo', compact('data'));
                case 'digital_copy_vf':
                    $type = $data->original_type;
                    return view('pdf.digitalcopy_vf', compact('data', 'type'));
                case 'film':
                    return view('pdf.film', compact('data'));
                case 'hardware':
                    return view('pdf.hardware', compact('data'));
                case 'photo':
                    return view('pdf.photo', compact('data'));
                case 'software':
                    return view('pdf.software', compact('data'));
                case 'video':
                    return view('pdf.video', compact('data'));
                /*case 'score':
                    $score = DB::table('score')->where('id', $component_id)->first();

                    break;
                case 'documentation':
                    $documentation = DB::table('documentation')->where('id', $component_id)->get();

                    return view('pdf.documentation', compact('result', 'documentation'));*/
                case 'dat':
                    //$dat = DB::table('dat')->where('component_id', $component_id)->first();
                    return view('pdf.dat', compact('data'));
                case 'phonographicdisk':
                    //$phonographicdisk = DB::table('phonographicdisk')->where('component_id', $component_id)->first();
                    return view('pdf.phonographic', compact('data'));
                case 'audiocassette':
                    //$audiocassette = DB::table('audiocassette')->where('component_id', $component_id)->first();
                    return view('pdf.audiocassette', compact('data'));
                case 'general_object':
                    //$audiocassette = DB::table('audiocassette')->where('component_id', $component_id)->first();
                    return view('pdf.general', compact('data'));
            }
        }
    }

    public function option(Request $request)
    {
        $request->validate([
            'option' => 'required|string',
            'value'  => 'required|string'
        ]);

        $table = $request->option;
        $value = trim($request->value);

        // Whitelist lookup tables
        $allowedTables = [
            'aspect_ratio',
            'bitdepth',
            'brand',
            'channel_configuration',
            'codec',
            'dimensions',
            'equalization',
            'format_analog',
            'format_digital',
            'material',
            'noise',
            'resolution',
            'sample_frequency',
            'sound_types',
            'speed',
            'standard',
            'stylus',
            'general_type',
            'software_type',
            'type_element',
        ];

        if (!in_array($table, $allowedTables)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid option table.'
            ]);
        }

        // Prevent duplicates
        if (DB::table($table)->where('value', $value)->exists()) {
            return response()->json([
                'status' => false,
                'message' => 'This value already exists.'
            ]);
        }

        // Insert new value
        DB::table($table)->insert(['value' => $value]);

        return response()->json([
            'status' => true,
            'message' => 'Option added successfully.'
        ]);
    }

    public function listOption(Request $request)
    {
        $table = $request->table_name;

        // Whitelist allowed lookup tables
        $allowedTables = [
            'aspect_ratio',
            'bitdepth',
            'brand',
            'channel_configuration',
            'codec',
            'dimensions',
            'equalization',
            'format_analog',
            'format_digital',
            'material',
            'noise',
            'resolution',
            'sample_frequency',
            'sound_types',
            'speed',
            'standard',
            'stylus',
            'general_type',
            'software_type',
            'type_element',
        ];

        if (!in_array($table, $allowedTables)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid lookup table'
            ], 400);
        }

        // Fetch all values from the lookup table
        $rows = DB::table($table)->orderBy('value')->get();

        // Format response
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'value' => $row->value
            ];
        }

        return response()->json($data);
    }

    public function fetchIDs(Request $request)
    {
        //try{
            $tables = $request->get('tables', []);
            $currentDpoId = $request->get('dpo_id');
            $filterOtherDpos = $request->get('filter', false); // true = exclude current DPO

            //error_log(print_r($tables, true));

        /*$usedByType = DB::table('dpo_component_bridge')
            ->whereIn('component_type', $tables)
            ->select('component_type', 'component_id')
            ->get()
            ->groupBy('component_type')
            ->map(function ($group) {
                return $group->pluck('component_id')->toArray();
            });*/

        $map = [
                'documentation' => [
                    'table' => 'documentation',
                    'label' => 'document_type',
                    'type' => 'Documentation',
                    'path_prefix' => 'Documentation'
                ],
                'score' => [
                    'table' => 'score',
                    'label' => 'id',
                    'type' => 'Score',
                    'path_prefix' => 'Score'
                ],
                'general_object' => [
                    'table' => 'general_object',
                    'label' => 'preservation_signature',
                    'type' => 'General Object',
                    'path_prefix' => 'General Object'
                ],
                'hardware' => [
                    'table' => 'hardware',
                    'label' => 'preservation_signature',
                    'type' => 'Hardware',
                    'path_prefix' => 'Hardware'
                ],
                'software' => [
                    'table' => 'software',
                    'label' => 'preservation_signature',
                    'type' => 'Software',
                    'path_prefix' => 'Software'
                ],
                'digital_copy_audio' => [
                    'table' => 'digital_copy_audio',
                    'label' => 'filename',
                    'type' => 'Digital Copy (Audio)',
                    'has_original_type' => true,
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Digital Copy)',
                ],
                'digital_copy_photo' => [
                    'table' => 'digital_copy_photo',
                    'label' => 'filename',
                    'type' => 'Digital Copy (Photograph)',
                    'has_original_type' => false,
                    'path_prefix' => 'Component (Audio/Visual -> Photograph -> Digital Copy)'
                ],
                'digital_copy_vf' => [
                    'table' => 'digital_copy_vf',
                    'label' => 'filename',
                    'type' => 'Digital Copy (Film/Video)',
                    'has_original_type' => true,
                    'path_prefix' => ['Component (Audio/Visual -> Video -> Digital Copy)',
                        'Component (Audio/Visual -> Film -> Digital Copy)',]
                ],
                'audiocassette' => [
                    'table' => 'audiocassette',
                    'label' => 'preservation_signature',
                    'type' => 'Audio Cassette',
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Original Item -> Audio Cassette)'
                ],
                'dat' => [
                    'table' => 'dat',
                    'label' => 'preservation_signature',
                    'type' => 'Digital Audio Tape',
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Original Item -> Digital Audio Tape)'
                ],
                'digital_audio' => [
                    'table' => 'digital_audio',
                    'label' => 'signature',
                    'type' => 'Digital Audio',
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Original Item -> Digital Audio)'
                ],
                'phonographicdisk' => [
                    'table' => 'phonographicdisk',
                    'label' => 'preservation_signature',
                    'type' => 'Phonographic Disk',
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Original Item -> Phonographic Disk)'
                ],
                'tape' => [
                    'table' => 'tape',
                    'label' => 'preservation_signature',
                    'type' => 'Open Reel Tape',
                    'path_prefix' => 'Component (Audio/Visual -> Audio -> Original Item -> Open Reel Tape)'
                ],
                'photo' => [
                    'table' => 'photo',
                    'label' => 'preservation_signature',
                    'type' => 'Photograph',
                    'path_prefix' => 'Component (Audio/Visual -> Photograph -> Original Item)'
                ],
                'video' => [
                    'table' => 'video',
                    'label' => 'preservation_signature',
                    'type' => 'Video',
                    'path_prefix' => 'Component (Audio/Visual -> Video -> Original Item)'
                ],
                'film' => [
                    'table' => 'film',
                    'label' => 'preservation_signature',
                    'type' => 'Film',
                    'path_prefix' => 'Component (Audio/Visual -> Film -> Original Item)'
                ]
        ];

        $result = collect();

        $usedByType = [];

        foreach ($tables as $t) {
            if (!isset($map[$t])) continue;

            $cfg = $map[$t];
            $prefixes = (array) $map[$t]['path_prefix'];

            // 1. Get component_ids already linked to THIS DPO, but only for this component_type family
            $currentDpoComponents = DB::table('dpo_component_bridge')
                ->where('dpo_id', $currentDpoId)
                ->where(function ($q) use ($prefixes) {
                    foreach ($prefixes as $p) {
                        $q->orWhere('component_type', 'LIKE', $p . '%');
                    }
                })
                ->pluck('component_id')
                ->toArray();

            //error_log(print_r($currentDpoComponents, true));

            // 2. Build the main query
            $query = DB::table('dpo_component_bridge')
                ->when($filterOtherDpos, function ($q) use ($currentDpoId) {
                    return $q->where('dpo_id', '!=', $currentDpoId);
                })
                ->where(function ($q) use ($prefixes) {
                    foreach ($prefixes as $p) {
                        $q->orWhere('component_type', 'LIKE', $p . '%');
                    }
                })
                ->when($filterOtherDpos && !empty($currentDpoComponents), function ($q) use ($currentDpoComponents) {
                    // Exclude components already linked to the current DPO
                    return $q->whereNotIn('component_id', $currentDpoComponents);
                });

            //$usedByType[$t] = $query->select('id as bridge_id', 'component_id')->get();

            //error_log(print_r($query->get()->toArray(), true));

            //error_log(print_r($cfg, true));

                // IDs to exclude for THIS table only
                //$include = $usedByType[$t] ?? [];

            $bridgeRows = $query->select('id as bridge_id', 'component_id') ->get();

            //error_log(print_r($bridgeRows, true));

            $bridgeMap = [];

            foreach ($bridgeRows as $br) {
                $bridgeMap[$br->component_id] = $br->bridge_id;
            }

            // Extract component IDs
            $include = $bridgeRows->pluck('component_id')->toArray();

            //error_log(print_r($include, true));

                // DIGITAL CASES
                        if (in_array($t, ['digital_copy_audio', 'digital_copy_photo', 'digital_copy_vf'])) {

                            if ($cfg['has_original_type']) {
                                // Tables WITH original_type column
                                $rows = DB::table($cfg['table'])
                                    ->whereIn('id', $include)
                                    ->select(
                                        'id',
                                        DB::raw("CONCAT(original_type, '/', {$cfg['label']}) AS label"),
                                        DB::raw("'" . $cfg['type'] . "' AS type")
                                    )
                                    ->get();

                                foreach ($rows as $row) {
                                    $row->bridge_id = $bridgeMap[$row->id] ?? null;
                                }
                            } else {
                                // digital_copy_photo → NO original_type column
                                $rows = DB::table($cfg['table'])
                                    ->whereIn('id', $include)
                                    ->select(
                                        'id',
                                        DB::raw("CONCAT('Photograph', '/', {$cfg['label']}) AS label"),
                                        DB::raw("'" . $cfg['type'] . "' AS type")
                                    )
                                    ->get();

                                foreach ($rows as $row) {
                                    $row->bridge_id = $bridgeMap[$row->id] ?? null;
                                }
                            }

                        } else if (in_array($t, ['score'])) {
                            $rows = DB::table($cfg['table'])
                                ->whereIn('id', $include)
                                ->select(
                                    'id',
                                    DB::raw("CONCAT('Score') AS label"),
                                    DB::raw("'" . $cfg['type'] . "' AS type")
                                )
                                ->get();

                            foreach ($rows as $row) {
                                $row->bridge_id = $bridgeMap[$row->id] ?? null;
                            }
                        } else {
                            // NON-DIGITAL CASES
                            $rows = DB::table($cfg['table'])
                                ->whereIn('id', $include)
                                ->select(
                                    'id',
                                    "{$cfg['label']} AS label",
                                    DB::raw("'" . $cfg['type'] . "' AS type")
                                )
                                ->get();

                            foreach ($rows as $row) {
                                $row->bridge_id = $bridgeMap[$row->id] ?? null;
                            }
                        }

                $result = $result->merge($rows);

            //error_log(print_r($result, true));
            }

            return response()->json(['items' => $result]);

        /*} catch (\Throwable $th) {
            error_log($th, 0);
        }*/
    }

    public function pdf(Request $request ,$component_id){
    header("Content-type:application/pdf");
    $result = DB::table('components')->where('id',$component_id)->first();
    return view('pdf.tape');
   }

    // NOTE FOR FUTURE LOCALIZATION:
    // The resolver depends on the *English-friendly labels* generated by buildComponentPath().
    // If the UI is ever localized, you must:
    // 1. Localize buildComponentPath() output
    // 2. Update this resolver to map localized labels back to table names
    // 3. OR replace this resolver with a stable internal code instead of UI labels.

    private function resolveTableName(string $compType): ?string
    {
        // Strip "Component (" and ")"
        $compType = trim($compType);
        $compType = str_replace(['Component (', ')'], '', $compType);

        // Split into parts
        $parts = array_map('trim', explode('->', $compType));
        $parts = array_map('strtolower', $parts);

        $level1 = $parts[0] ?? null;
        $level2 = $parts[1] ?? null;
        $level3 = $parts[2] ?? null;
        $level4 = $parts[3] ?? null;

        //error_log($level1, 0);
        //error_log($level2, 0);
        //error_log($level3, 0);
        //error_log($level4, 0);

        // -------------------------
        // LEVEL 1: SCORE
        // -------------------------
        if ($level1 === 'score') {
            return 'score';
        }

        // -------------------------
        // LEVEL 1: DOCUMENTATION
        // -------------------------
        if ($level1 === 'documentation') {
            return 'documentation';
        }

        // -------------------------
        // LEVEL 1: GENERAL OBJECT
        // -------------------------
        if ($level1 === 'general object') {
            return 'general_object';
        }

        // -------------------------
        // LEVEL 1: HARDWARE
        // -------------------------
        if ($level1 === 'hardware') {
            return 'hardware';
        }

        // -------------------------
        // LEVEL 1: SOFTWARE
        // -------------------------
        if ($level1 === 'software') {
            return 'software';
        }

        // -------------------------
        // LEVEL 1: AUDIOVISUAL
        // -------------------------
        if ($level1 === 'audio/visual') {

            // -------------------------
            // VIDEO
            // -------------------------
            if ($level2 === 'video') {
                if ($level3 === 'original item') return 'video';
                if ($level3 === 'digital copy') return 'digital_copy_vf';
            }

            // -------------------------
            // PHOTO
            // -------------------------
            if ($level2 === 'photograph') {
                if ($level3 === 'original item') return 'photo';
                if ($level3 === 'digital copy') return 'digital_copy_photo';
            }

            // -------------------------
            // FILM
            // -------------------------
            if ($level2 === 'film') {
                if ($level3 === 'original item') return 'film';
                if ($level3 === 'digital copy') return 'digital_copy_vf'; // shared with video
            }

            // -------------------------
            // AUDIO
            // -------------------------
            if ($level2 === 'audio') {

                // ORIGINAL ITEM
                if ($level3 === 'original item') {
                    return match ($level4) {
                        'audio cassette'       => 'audiocassette',
                        'digital audio tape'   => 'dat',
                        'open reel tape'       => 'tape',
                        'phonographic disk'    => 'phonographicdisk',
                        'digital audio'        => 'digital_audio',
                        default                => null,
                    };
                }

                // DIGITAL COPY
                // AUDIO → DIGITAL COPY always maps to digital_copy_audio.
                // Level 4 is only for user readability, not for table resolution.

                if ($level3 === 'digital copy') {
                    return 'digital_copy_audio';
                }
            }
        }

        return null; // TODO: log unexpected component_type for debugging
    }

    public function delete(Request $request)
    {
        $bridgeId = decrypt($request->id);
        $deleteAll = filter_var($request->deleteAll, FILTER_VALIDATE_BOOLEAN);

        $bridge = DB::table('dpo_component_bridge')->where('id', $bridgeId)->first();

        if (!$bridge) {
            return response()->json(['error' => 'Component not found'], 404);
        }

        $componentId = $bridge->component_id;

        $table = $this->resolveTableName($bridge->component_type);

        if (!$table) {
            return response()->json(['error' => 'Unknown component type'], 400);
            //throw new \RuntimeException("Unknown component type: $bridge->component_type");
        }

        if ($deleteAll) { // 🔥 Delete component AND all bridge rows
            $this->deleteComponentByTypeAndId($table, $componentId, $bridge->component_type);
            return response()->json(['success' => true]);
        }

        // 🔥 Delete ONLY this bridge row
        DB::table('dpo_component_bridge')->where('id', $bridgeId)->delete();

        // Check if component is still referenced elsewhere
        $stillUsed = DB::table('dpo_component_bridge')
            ->where('component_id', $componentId)
            ->where('component_type', $bridge->component_type)
            ->exists();

        if (!$stillUsed) {
            // 🔥 Component is orphaned → delete it
            $this->deleteComponentByTypeAndId($table, $componentId, $bridge->component_type);
        }

        return response()->json(['success' => true]);
    }

    public function insertDPO(Request $request)
    {
        try {
            $dpo = DB::table('dpos')->where([
                'artwork_id' => $request->artwork_id,
                'dpo_year'   => $request->dpo_year,
                'dpo_venue'  => $request->dpo_venue,
                'dpo_city'   => $request->dpo_city
            ])->first();

            if ($dpo) {
                return response()->json([
                    'status'  => 'warning',
                    'message' => 'DPO already present'
                ]);
            }

            $insert = DB::table('dpos')->insert([
                'artwork_id' => $request->artwork_id,
                'dpo_year'   => $request->dpo_year,
                'dpo_venue'  => $request->dpo_venue,
                'dpo_city'   => $request->dpo_city,
                'user_id'    => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'status'     => 1
            ]);

            if ($insert) {

                // Get the new DPO ID
                $dpoId = DB::getPdo()->lastInsertId();

                // Compute the sequential number (count_arr logic)
                $allIds = DB::table('dpos')
                    ->where('artwork_id', $request->artwork_id)
                    ->orderBy('id', 'asc')
                    ->pluck('id')
                    ->toArray();

                $count = array_search($dpoId, $allIds) + 1; // +1 because array_search is 0-based

                // Build redirect URL exactly like searchlist()
                $redirectUrl = route('artwork.add', [
                    encrypt($request->artwork_id),
                    encrypt($dpoId),
                    encrypt($count)
                ]);

                return response()->json([
                    'status'   => true,
                    'message'  => 'DPO inserted successfully',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'status'  => false,
                'message' => 'You have some error. Please try later'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => 'You have some error. Please try later'
            ]);
        }
    }

    private function deleteComponentByTypeAndId(String $table, int $componentId, string $component_type)
    {

        DB::transaction(function () use ($table, $componentId, $component_type) {

            // -------------------------------------------------------
            // 1. If this is an ORIGINAL item, update digital copies
            // -------------------------------------------------------
            $originalTables = [
                'audiocassette',
                'dat',
                'tape',
                'phonographicdisk',
                'digital_audio',
                'video',
                'photo',
                'film',
            ];

            if (in_array($table, $originalTables)) {

                // DIGITAL COPY AUDIO
                DB::table('digital_copy_audio')
                    ->where('id_original', $componentId)
                    ->update([
                        'id_original'   => null,
                    ]);

                // DIGITAL COPY PHOTO
                DB::table('digital_copy_photo')
                    ->where('id_original', $componentId)
                    ->update([
                        'id_original' => null
                    ]);

                // DIGITAL COPY VIDEO/FILM — must distinguish original type
                if ($table === 'video') {
                    DB::table('digital_copy_vf')
                        ->where('id_original', $componentId)
                        ->where('original_type', 'video')
                        ->update([
                            'id_original'   => null,
                        ]);
                }

                if ($table === 'film') {
                    DB::table('digital_copy_vf')
                        ->where('id_original', $componentId)
                        ->where('original_type', 'film')
                        ->update([
                            'id_original'   => null,
                        ]);
                }
            }

            // -------------------------------------------------------
            // 2. Delete the component itself
            // -------------------------------------------------------
            DB::table($table)->where('id', $componentId)->delete();

            // -------------------------------------------------------
            // 3. Delete ALL bridge rows referencing this component
            // -------------------------------------------------------
            DB::table('dpo_component_bridge')
                ->where('component_id', $componentId)
                ->where('component_type', $component_type)
                ->delete();
        });
    }

    public function deleteDPO(Request $request)
    {
            $dpoId = decrypt($request->id);

            DB::transaction(function () use ($dpoId) {

                // 1. Get all components linked to this DPO
                $components = DB::table('dpo_component_bridge')
                    ->where('dpo_id', $dpoId)
                    ->get();

                // 2. For each component, check if it is orphaned
                foreach ($components as $comp) {

                    $componentId = $comp->component_id;
                    $compType = $comp->component_type;

                    // Check if this component is referenced in ANY other DPO
                    $stillUsed = DB::table('dpo_component_bridge')
                        ->where('component_id', $componentId)
                        ->where('component_type', $compType)
                        ->where('dpo_id', '!=', $dpoId)
                        ->exists();

                    // If NOT used elsewhere → delete the component
                    if (!$stillUsed) {

                        $table = $this->resolveTableName($compType);

                        //error_log($table, 0);

                        if (!$table) {
                            //return response()->json(['error' => 'Unknown component type'], 400);
                            throw new \RuntimeException("Unknown component type: $compType");
                        }

                        $this->deleteComponentByTypeAndId($table, $componentId, $compType);
                    }
                }

                // 3. Delete all bridge rows for this DPO
                DB::table('dpo_component_bridge')
                    ->where('dpo_id', $dpoId)
                    ->delete();

                // 4. Delete the DPO itself
                DB::table('dpos')->where('id', $dpoId)->delete();

                //error_log("Ciao!", 0);
            });

            return response()->json(['success' => true]);
    }
}
