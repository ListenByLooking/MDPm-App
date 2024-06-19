<div id="Component_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Components</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="col-12 dpo_parents" id="Component_parent">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group mb-2">
                                <label for="title" class="form-label">Components</label>
                                <select class="form-control select2" id="Component" onchange="activity.component(this)" >
                                    <option value="">Select</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Software">Software</option>
                                    <option value="AudioVisual">AudioVisual</option>
                                    <option value="Varius">Varius</option>
                                </select>
                            </div>
                            <div class="" id="AudioVisual_parent">
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Audiovisual Types</label>
                                    <select class="form-control select2" id="Audiovisual" onchange="activity.audiovisual(this)" >
                                        <option value="">Select</option>
                                        <option value="Video">Video</option>
                                        <option value="Photo">Photo</option>
                                        <option value="Audio">Audio</option>
                                        <option value="Film">Film</option>
                                    </select>
                                </div>
                            </div>
                            <div class="" id="originaldocs_parent">
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Original Docs</label>
                                    <select class="form-control select2" id="originaldocs" onchange="activity.originaldocs(this)" >
                                        <option value="">Select</option>
                                        <option value="Original">Original Docs</option>
                                        <option value="Digital">Digital Copy</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="" id="originaldocs_parent">
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Original Docs</label>
                                    <select class="form-control select2" id="originaldocs1"> 
                                            <option value="">Select</option> 
                                            <option value="audiocassette">Audiocassette</option>
                                            <option value="dat">DAT</option>
                                            <option value="openreeltape">Open Reel Tape</option>
                                            <option value="phonographicdisks">Phonographic Disks</option> 
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-9 border border-left">
                            <div class="col-12  " id="digital_copy">
                                <h2 class="text-center">Digital Copy</h2>
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Signature</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> 
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Format</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Original Item</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Codec</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Bitrate</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> 
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Bitdepth (Audio)</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Bitdepth (Video)</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Resolution</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Aspect Ratio</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Frame Rate</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Sample Frequency</label>
                                            <select class="form- select2">
                                                <option value="option 1">Option 1</option> 
                                                <option value="option 2">Option 2</option> 
                                                <option value="option 3">Option 3</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="form-group">
                                            <label>Acquisition Device</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <textarea class="form-control "></textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-12" id="original_docs"> 
                                <h2 class="text-center">Preservation Form</h2>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="progressive">Progressive:</label> 
                                            <input type="text" id="progressive" name="progressive" class="form-control"> 
                                        </div>  
                                    </div>                                 
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="preservation_signature">Preservation Signature:</label>
                                        <input type="text" id="preservation_signature" class="form-control" name="preservation_signature">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="original_signature">Original Signature:</label>
                                        <input type="text" id="original_signature" name="original_signature"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="type">Type:</label> 
                                            <select id="type" name="type" class="form-control">
                                                <option value="Type1">Type 1</option>
                                                <option value="Type2">Type 2</option>
                                                <option value="Type3">Type 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">                            
                                        <label for="format">Format:</label>
                                        <select id="format" name="format" class="form-control">
                                            <option value="Format1">Format 1</option>
                                            <option value="Format2">Format 2</option>
                                            <option value="Format3">Format 3</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">                             
                                        <label for="generation">Generation:</label>
                                        <select id="generation" name="generation" class="form-control">
                                            <option value="Generation1">Generation 1</option>
                                            <option value="Generation2">Generation 2</option>
                                            <option value="Generation3">Generation 3</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group"> 
                                        <label for="title">Title:</label>
                                        <input type="text" id="title" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="author">Author:</label>
                                        <input type="text" id="author" name="author" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="year">Year:</label>
                                        <input type="number" id="year" name="year" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="support_material">Support Material:</label>
                                        <select id="support_material" name="support_material" class="form-control">
                                            <option value="Material1">Material 1</option>
                                            <option value="Material2">Material 2</option>
                                            <option value="Material3">Material 3</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                        <label for="color_bw">Color/BW:</label>
                                        <select id="color_bw" name="color_bw" class="form-control">
                                            <option value="Color">Color</option>
                                            <option value="BW">BW</option>
                                        </select>
                                        </div></div>
                                        <div class="col-4">
                                            <div class="form-group">
                                    <label for="sound">Sound:</label>
                                    <select id="sound" name="sound" class="form-control">
                                        <option value="Sound1">Sound 1</option>
                                        <option value="Sound2">Sound 2</option>
                                        <option value="Sound3">Sound 3</option>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="aspect_ratio">Aspect Ratio:</label>
                                            <select id="aspect_ratio" name="aspect_ratio" class="form-control">
                                                <option value="Aspect Ratio1">Ratio 1</option>
                                                <option value="Aspect Ratio2">Ratio 2</option>
                                                <option value="Aspect Ratio3">Ratio 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="film_brand">Film Brand:</label>
                                            <select id="film_brand" name="film_brand" class="form-control">
                                                <option value="Film Brand1">Brand 1</option>
                                                <option value="Film Brand2">Brand 2</option>
                                                <option value="Film Brand3">Brand 3</option>
                                            </select>
                                        </div></div>
                                        <div class="col-4">
                                            <div class="form-group">
                                    
                                            <label for="carter_brand">Carter Brand:</label>
                                            <select id="carter_brand" name="carter_brand" class="form-control">
                                                <option value="Carter Brand1">Carter 1</option>
                                                <option value="Carter Brand2">Carter 2</option>
                                                <option value="Carter Brand3">Carter 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="carter_material">Carter Material:</label>
                                            <select id="carter_material" name="carter_material" class="form-control">
                                                <option value="Carter Material1">Carter Material 1</option>
                                                <option value="Carter Material2">Carter Material 2</option>
                                                <option value="Carter Material3">Carter Material 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="cover_material">Cover Material:</label>
                                            <select id="cover_material" name="cover_material" class="form-control">
                                                <option value="Cover Material1">Cover Material 1</option>
                                                <option value="Cover Material2">Cover Material 2</option>
                                                <option value="Cover Material3">Cover Material 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="cement_splices">Cement Splices:</label>
                                            <input type="number" id="cement_splices" name="cement_splices" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="restored_cs">Restored CS:</label>
                                            <input type="number" id="restored_cs" name="restored_cs" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="tape_splices">Tape Splices:</label>
                                            <input type="number" id="tape_splices" name="tape_splices" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="restored_ts">Restored TS:</label>
                                            <input type="number" id="restored_ts" name="restored_ts" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="restored_perforations">Restored Perforations:</label>
                                            <input type="number" id="restored_perforations" name="restored_perforations" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="restored_frames">Restored Frames:</label>
                                            <input type="number" id="restored_frames" name="restored_frames" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="notes">Notes:</label>
                                            <textarea id="notes" name="notes" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-12" id="tape_details">
                                <h2 class="text-center">Open Reel Tape Form</h2>
                                <div class="row">
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="preservation_signature">Preservation Signature:</label>
                                            <input type="text" id="preservation_signature" class="form-control" name="preservation_signature" required="">
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="original_signature">Original Signature:</label>
                                            <input type="text" id="original_signature"  class="form-control" name="original_signature" required="">
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="brand_of_tape">Brand of Tape:</label>
                                            <div class="input-group">
                                                <select id="brand_of_tape" name="brand_of_tape"  class="form-control" required="">
                                                    <option value="Brand1">Brand 1</option>
                                                    <option value="Brand2">Brand 2</option>
                                                    <option value="Brand3">Brand 3</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('brand_of_tape')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="brand_of_box">Brand of Box:</label>
                                            <div class="input-group">
                                                <select id="brand_of_box" name="brand_of_box"  class="form-control" required="">
                                                    <option value="Brand1">Brand 1</option>
                                                    <option value="Brand2">Brand 2</option>
                                                    <option value="Brand3">Brand 3</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('brand_of_box')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="brand_of_carter">Brand of Carter:</label>
                                            <div class="input-group">
                                                <select id="brand_of_carter" name="brand_of_carter"  class="form-control" required="">
                                                    <option value="Brand1">Brand 1</option>
                                                    <option value="Brand2">Brand 2</option>
                                                    <option value="Brand3">Brand 3</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('brand_of_carter')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="material_of_carter">Material of Carter:</label>
                                            <div class="input-group">
                                                <select id="material_of_carter" name="material_of_carter"  class="form-control" required="">
                                                    <option value="Material1">Material 1</option>
                                                    <option value="Material2">Material 2</option>
                                                    <option value="Material3">Material 3</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('material_of_carter')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="diameter_of_carter">Diameter of Carter:</label>
                                            <div class="input-group">
                                                <select id="diameter_of_carter" name="diameter_of_carter"  class="form-control" required="">
                                                    <option value="Diameter1">Diameter 1</option>
                                                    <option value="Diameter2">Diameter 2</option>
                                                    <option value="Diameter3">Diameter 3</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('diameter_of_carter')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="tape_width">Tape Width:</label>
                                            <div class="input-group">
                                                <select id="tape_width" name="tape_width" required=""  class="form-control">
                                                    <option value="2 inch">2 inch</option>
                                                    <option value="1 inch">1 inch</option>
                                                    <option value="½ inch">½ inch</option>
                                                    <option value="¼ inch">¼ inch</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('tape_width')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="num_of_sides">Number of Sides:</label>
                                            <input type="number" id="num_of_sides" name="num_of_sides"  class="form-control" min="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="num_of_channels_sideA">Number of Channels on SideA:</label>
                                            <input type="number" id="num_of_channels_sideA" name="num_of_channels_sideA"  class="form-control" min="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="channels_config_sideA">Channels Configuration (SideA):</label>
                                            <div class="input-group">
                                                <select id="channels_config_sideA" name="channels_config_sideA"  class="form-control" required="">
                                                    <option value="Mono">Mono</option>
                                                    <option value="Stereo">Stereo</option>
                                                    <option value="Dual Mono">Dual Mono</option>
                                                    <option value="Quadriphonic">Quadriphonic</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('channels_config_sideA')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="speed_sideA">Speed (SideA):</label>
                                            <div class="input-group">
                                                <select id="speed_sideA" name="speed_sideA"  class="form-control" required="">
                                                    <option value="2,38 cm/s">2,38 cm/s</option>
                                                    <option value="4,75 cm/s">4,75 cm/s</option>
                                                    <option value="9,5 cm/s">9,5 cm/s</option>
                                                    <option value="19 cm/s">19 cm/s</option>
                                                    <option value="38 cm/s">38 cm/s</option>
                                                    <option value="76 cm/s">76 cm/s</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('speed_sideA')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="num_of_channels_sideB">Number of Channels on SideB:</label>
                                            <input type="number" id="num_of_channels_sideB"  class="form-control" name="num_of_channels_sideB" min="1" required="">
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="channels_config_sideB">Channels Configuration (SideB):</label>
                                            <div class="input-group">
                                                <select id="channels_config_sideB" name="channels_config_sideB"  class="form-control" required="">
                                                    <option value="Mono">Mono</option>
                                                    <option value="Stereo">Stereo</option>
                                                    <option value="Dual Mono">Dual Mono</option>
                                                    <option value="Quadriphonic">Quadriphonic</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('channels_config_sideB')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="speed_sideB">Speed (SideB):</label>
                                            <div class="input-group">
                                                <select id="speed_sideB" name="speed_sideB" required=""  class="form-control">
                                                    <option value="2,38 cm/s">2,38 cm/s</option>
                                                    <option value="4,75 cm/s">4,75 cm/s</option>
                                                    <option value="9,5 cm/s">9,5 cm/s</option>
                                                    <option value="19 cm/s">19 cm/s</option>
                                                    <option value="38 cm/s">38 cm/s</option>
                                                    <option value="76 cm/s">76 cm/s</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('speed_sideB')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="eq">EQ:</label>
                                            <div class="input-group">
                                                <select id="eq" name="eq" required=""  class="form-control">
                                                    <option value="IEC1">IEC1</option>
                                                    <option value="IEC2">IEC2</option>
                                                    <option value="CCIR">CCIR</option>
                                                    <option value="NAB">NAB</option>
                                                    <option value="AES">AES</option>
                                                    <option value="DIN">DIN</option>
                                                </select>
                                                <button type="button" class="add-button btn btn-success" onclick="addOption('eq')">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="form-group">
                                            <label for="notes">Notes:</label>
                                            <textarea id="notes" name="notes" rows="4"  class="form-control" required=""></textarea>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer border border-top">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Save Changes</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->     