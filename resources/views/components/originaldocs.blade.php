<div class="col-12 components_div_right" id="original_docs"> 
    <h2 class="text-center p-2 boder-bottom">Preservation Form</h2> 
    <input type="hidden" name="form_name" value="original_docs">
    <input type="hidden" name="dpo_id" value="{{$id}}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="progressive">Progressive</label> 
                    <input type="text" id="progressive" name="progressive" class="form-control"> 
                </div>  
            </div>                                 
            <div class="col-4">
                <div class="form-group">
                <label for="preservation_signature">Preservation Signature</label>
                <input type="text" id="preservation_signature" class="form-control" name="preservation_signature">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="original_signature">Original Signature</label>
                <input type="text" id="original_signature" name="original_signature"  class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="type">Type</label> 
                    <select id="type" name="type" class="form-control select4">
                        <option value="Type1">Type 1</option>
                        <option value="Type2">Type 2</option>
                        <option value="Type3">Type 3</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">                            
                <label for="format">Format</label>
                <select id="format" name="format" class="form-control select4">
                    <option value="Format1">Format 1</option>
                    <option value="Format2">Format 2</option>
                    <option value="Format3">Format 3</option>
                </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">                             
                <label for="generation">Generation</label>
                <select id="generation" name="generation" class="form-control select4">
                    <option value="Generation1">Generation 1</option>
                    <option value="Generation2">Generation 2</option>
                    <option value="Generation3">Generation 3</option>
                </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group"> 
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="support_material">Support Material</label>
                <select id="support_material" name="support_material" class="form-control select4">
                    <option value="Material1">Material 1</option>
                    <option value="Material2">Material 2</option>
                    <option value="Material3">Material 3</option>
                </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="color_bw">Color/BW</label>
                <select id="color_bw" name="color_bw" class="form-control select4">
                    <option value="Color">Color</option>
                    <option value="BW">BW</option>
                </select>
                </div></div>
                <div class="col-4">
                    <div class="form-group">
                <label for="sound">Sound</label>
                <select id="sound" name="sound" class="form-control select4">
                    <option value="Sound1">Sound 1</option>
                    <option value="Sound2">Sound 2</option>
                    <option value="Sound3">Sound 3</option>
                </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="aspect_ratio">Aspect Ratio</label>
                        <select id="aspect_ratio" name="aspect_ratio" class="form-control select4">
                            <option value="Aspect Ratio1">Ratio 1</option>
                            <option value="Aspect Ratio2">Ratio 2</option>
                            <option value="Aspect Ratio3">Ratio 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="film_brand">Film Brand</label>
                        <select id="film_brand" name="film_brand" class="form-control select4">
                            <option value="Film Brand1">Brand 1</option>
                            <option value="Film Brand2">Brand 2</option>
                            <option value="Film Brand3">Brand 3</option>
                        </select>
                    </div></div>
                    <div class="col-4">
                        <div class="form-group">
                
                        <label for="carter_brand">Carter Brand</label>
                        <select id="carter_brand" name="carter_brand" class="form-control select4">
                            <option value="Carter Brand1">Carter 1</option>
                            <option value="Carter Brand2">Carter 2</option>
                            <option value="Carter Brand3">Carter 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="carter_material">Carter Material</label>
                        <select id="carter_material" name="carter_material" class="form-control select4">
                            <option value="Carter Material1">Carter Material 1</option>
                            <option value="Carter Material2">Carter Material 2</option>
                            <option value="Carter Material3">Carter Material 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="cover_material">Cover Material</label>
                        <select id="cover_material" name="cover_material" class="form-control select4" >
                            <option value="Cover Material1">Cover Material 1</option>
                            <option value="Cover Material2">Cover Material 2</option>
                            <option value="Cover Material3">Cover Material 3</option>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="cement_splices">Cement Splices</label>
                        <input type="number" id="cement_splices" name="cement_splices" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="restored_cs">Restored CS</label>
                        <input type="number" id="restored_cs" name="restored_cs" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="tape_splices">Tape Splices</label>
                        <input type="number" id="tape_splices" name="tape_splices" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="restored_ts">Restored TS</label>
                        <input type="number" id="restored_ts" name="restored_ts" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="restored_perforations">Restored Perforations</label>
                        <input type="number" id="restored_perforations" name="restored_perforations" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="restored_frames">Restored Frames</label>
                        <input type="number" id="restored_frames" name="restored_frames" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes" rows="4" class="form-control"></textarea>
                </div>
            </div> 
        </div> 
</div>