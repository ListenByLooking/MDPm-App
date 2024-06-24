<div>
    @if($form == 'phonographicdisks')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Phonographicdisks</span></h2>
    <table class="table table-border">
        <tr>
            <td>Preservation Signature</td>
            <td>{{ $data->preservation_signature}}</td>
            <td>Original Signature</td>
            <td>{{ $data->original_signature}}</td>
        </tr>  
        <tr>
            <td>Brand</td>
            <td>{{ $data->brand}}</td>
            <td>Brand of the Box</td>
            <td>{{ $data->brand_of_box}}</td>
        </tr>
        <tr>
            <td>RPM</td>
            <td>{{ $data->rpm}}</td>
            <td>Stylus</td>
            <td>{{ $data->stylus}}</td>
        </tr> 
        <tr>
            <td>EQ</td>
            <td>{{ $data->eq}}</td>
            <td>Type of Recording</td>
            <td>{{ $data->type_of_recording}}</td>
        </tr> 
        <tr>
            <td>Incisions</td>
            <td>{{ $data->incisions}}</td>
            <td>Notes</td>
            <td>{{ $data->notes}}</td>
        </tr> 
    </table>
    @elseif($form == 'dat')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Dat</span></h2>
    <table class="table table-border">
        <tr>
            <td>Preservation Signature</td>
            <td>{{ $data->preservation_signature }}</td>
            <td>Original Signature</td>
            <td>{{ $data->original_signature }}</td>
        </tr>  
        <tr>
            <td>Brand</td>
            <td>{{ $data->brand }}</td>
            <td>Brand of the Box</td>
            <td>{{ $data->brand_of_box }}</td>
        </tr>
        <tr>
            <td>Samplerate</td>
            <td>{{ $data->samplerate }}</td>
            <td>Notes</td>
            <td>{{ $data->notes }}</td>
        </tr> 
    </table>
    @elseif($form == 'digital_copy')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Digital Copy</span></h2> 
        <table class="table table-border">
            <tr>
                <td>Signature</td>
                <td>{{ $data->signature }}</td>
                <td>Format</td>
                <td>{{ $data->format }}</td>
            </tr> 
            <tr>
                <td>Original Item</td>
                <td>{{ $data->original_item }}</td>           
                <td>Codec</td>
                <td>{{ $data->codec }}</td>
            </tr> 
            <tr>
                <td>Bitrate</td>
                <td>{{ $data->bitrate }}</td> 
                <td>Bitdepth (Audio)</td>
                <td>{{ $data->bitdepth_audio }}</td>
            </tr> 
            <tr>
                <td>Bitdepth (Video)</td>
                <td>{{ $data->bitdepth_video }}</td> 
                <td>Resolution</td>
                <td>{{ $data->resolution }}</td>
            </tr> 
            <tr>
                <td>Aspect Ratio</td>
                <td>{{ $data->aspect_ratio }}</td> 
                <td>Frame Rate</td>
                <td>{{ $data->frame_rate }}</td>
            </tr> 
            <tr>
                <td>Sample Frequency</td>
                <td>{{ $data->sample_frequency }}</td> 
                <td>Acquisition Device</td>
                <td>{{ $data->acquisition_device }}</td>
            </tr> 
            <tr>
                <td>Notes</td>
                <td colspan="3">{{ $data->notes }}</td>
            </tr> 
        </table>
    @elseif($form == 'score')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Score</span></h2>
    <table class="table table-border">
        <tr> 
            <td>{!! $data->message !!}</td> 
        </tr>  
    </table>
    @elseif($form == 'documentation')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Documentation</span></h2>
                      
        <table class="table table-bordered">
            @foreach ($data as $doc )
            <tr><td>{{ $doc->document_type}}</td><td>{{ $doc->document_url}}</td></tr>
            @endforeach
        </table> 
    @elseif($form == 'audiocassette')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Audio Cassette</span></h2>
    <table class="table table-border">
        <tr>
            <td>Preservation Signature</td>
            <td>{{ $data->preservation_signature}}</td>
            <td>Original Signature</td>
            <td>{{ $data->original_signature}}</td>
        </tr>  
        <tr>
            <td>Brand</td>
            <td>{{ $data->brand}}</td>
            <td>Brand of the Box
            </td>
            <td>{{ $data->brand_of_box}}</td>
        </tr> 
        <tr>
            <td>Cassette Type
            </td>
            <td>{{ $data->cassette_type}}</td>
            <td>Noise Reduction
            </td>
            <td>{{ $data->noise_reduction}}</td>
        </tr> 
        <tr>
            <td>Notes</td>
            <td colspan="3">{{ $data->notes}}</td> 
        </tr>  
    </table>
    @elseif($form == 'tape_details')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Open Tape Details</span></h2> 
        <table class="table table-border">
            <tr>
                <td>Preservation Signature</td>
                <td>{{ $data->preservation_signature }}</td>
                <td>Original Signature</td>
               <td>{{ $data->original_signature }}</td>
            </tr> 
            <tr>
                <td>Brand of Tape</td>
               <td>{{ $data->brand_of_tape }}</td>
                <td>Brand of Box</td>
               <td>{{ $data->brand_of_box }}</td>
            </tr>
            <tr>
                <td>Brand of Carter</td>
               <td>{{ $data->brand_of_carter }}</td>
                <td>Material of Carter</td>
               <td>{{ $data->material_of_carter }}</td>
            </tr>
            <tr>
                <td>Diameter of Carter
                </td>
               <td>{{ $data->diameter_of_carter }}</td>
                <td>Tape Width
                </td>
               <td>{{ $data->tape_width }}</td>
            </tr>
            <tr>
                <td>Number of Sides</td>
               <td>{{ $data->num_of_sides }}</td>
                <td>Number of Channels on SideA</td>
               <td>{{ $data->num_of_channels_sideA }}</td>
            </tr>
            <tr>
                <td>Channels Configuration (SideA)
                </td>
               <td>{{ $data->channels_config_sideA }}</td>
                <td>Speed (SideA)
                </td>
               <td>{{ $data->speed_sideA }}</td>
            </tr>
            <tr>
                <td>Number of Channels on SideB</td>
               <td>{{ $data->num_of_channels_sideB }}</td>
                <td>Channels Configuration (SideB)
                </td>
               <td>{{ $data->channels_config_sideB }}</td>
            </tr>
            <tr>
                <td>Speed (SideB)</td>
               <td>{{ $data->speed_sideB }}</td>
                <td>EQ
                </td>
               <td>{{ $data->eq }}</td>
            </tr>
            <tr>
                <td>Notes</td>
               <td colspan="3">{{ $data->notes }}</td> 
            </tr>
        </table>
    @elseif($form == 'original_docs')
    <h2 style="border-bottom:1px solid black; "><span style="background: black; color:white; padding: 2px 20px; border-radius: 0px 25px 0px 0px;">Original Docs</span></h2> 
            <table class="table table-border">
                <tr>
                    <td>Preservation Signature</td>
                    <td>{{ $data->preservation_signature }}</td>
                    <td>Original Signature</td>
                    <td>{{ $data->original_signature }}</td>
                </tr>  
                <tr>
                    <td>Type</td>
                    <td>{{ $data->type }}</td>
                    <td>Format</td>
                    <td>{{ $data->format }}</td>
                </tr>
                <tr>
                    <td>Generation</td>
                    <td>{{ $data->generation }}</td>                 
                    <td>Title</td>
                    <td>{{ $data->title }}</td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>{{ $data->author }}</td> 
                    <td>Year</td>
                    <td>{{ $data->year }}</td>
                </tr>
                <tr>
                    <td>Support Material</td>
                    <td>{{ $data->support_material }}</td> 
                    <td>Color/BW</td>
                    <td>{{ $data->color_bw }}</td>
                </tr>
                <tr>
                    <td>Sound</td>
                    <td>{{ $data->sound }}</td> 
                    <td>Aspect Ratio</td>
                    <td>{{ $data->aspect_ratio }}</td>
                </tr>
                <tr>
                    <td>Film Brand</td>
                    <td>{{ $data->film_brand }}</td> 
                    <td>Carter Brand</td>
                    <td>{{ $data->carter_brand }}</td>
                </tr>
                <tr>
                    <td>Carter Material</td>
                    <td>{{ $data->carter_material }}</td> 
                    <td>Cover Material</td>
                    <td>{{ $data->cover_material }}</td>
                </tr>
                <tr>
                    <td>Cement Splices</td>
                    <td>{{ $data->cement_splices }}</td> 
                    <td>Restored CS</td>
                    <td>{{ $data->restored_cs }}</td>
                </tr>
                <tr>
                    <td>Tape Splices</td>
                    <td>{{ $data->tape_splices }}</td> 
                    <td>Restored TS</td>
                    <td>{{ $data->restored_ts }}</td>
                </tr>
                <tr>
                    <td>Restored Perforations</td>
                    <td>{{ $data->restored_perforations }}</td> 
                    <td>Restored Frames</td>
                    <td>{{ $data->restored_frames }}</td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td colspan="3">{{ $data->notes }}</td>
                </tr> 
            </table>
    @else
    @endif
</div>
 