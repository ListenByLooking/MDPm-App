<div class="col-12 components_div_right" id="film">
    <h2 class="text-center p-2 border-bottom">Film</h2>
    <input type="hidden" name="form_name" value="film">
    <input type="hidden" name="artwork_id" value="{{$id}}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="psignature">Preservation signature</label>
                    <input type="text" id="psignature" name="psignature" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="osignature">Original signature</label>
                    <input type="text" id="osignature" name="osignature" class="form-control">
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="type">Type</label>
                    <div class="input-group">
                    <select id="type" name="type" class="form-control" required="">
                        <option value="Type1">Type 1</option>
                        <option value="Type2">Type 2</option>
                        <option value="Type3">Type 3</option>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                </div>
            </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="format">Format</label>
                    <div class="input-group">
                <select id="format" name="format" class="form-control" required="">
                    <option value="Format1">Format 1</option>
                    <option value="Format2">Format 2</option>
                    <option value="Format3">Format 3</option>
                </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                </div>
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
                    <input type="number" min="1901" step="1" placeholder="1970" id="year" class="form-control" name="year" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="support_material">Support Material</label>
                    <div class="input-group">
                <select id="support_material" name="support_material" class="form-control" required="">
                    <option value="Material1">Material 1</option>
                    <option value="Material2">Material 2</option>
                    <option value="Material3">Material 3</option>
                </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="color">Color/BW</label>
                    <div class="checkbox-container">
                        <input type="radio" id="col" name="color" value="col" style="height: 2.4rem; width: 1.1rem; border-width: 0px;" required>

                        <div style="display: inline-block; vertical-align: top">
                            <label style="margin-top: 0.6rem;" for="col">Color</label>
                        </div>
                        <input type="radio" id="bw" name="color" value="bw" style="height: 2.4rem; width: 1.1rem; border-width: 0px;" required>
                        <div style="display: inline-block; vertical-align: top">
                            <label style="margin-top: 0.6rem;" for="bw">B/W</label>
                        </div>
                        <input type="radio" id="both" name="color" value="both" style="height: 2.4rem; width: 1.1rem; border-width: 0px;" required>
                        <div style="display: inline-block; vertical-align: top">
                            <label style="margin-top: 0.6rem;" for="both">Both</label>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-4">
                    <div class="form-group">
                <label for="sound">Sound</label>
                        <div class="input-group">
                <select id="sound" name="sound" class="form-control" required="">
                    <option value="Sound1">Sound 1</option>
                    <option value="Sound2">Sound 2</option>
                    <option value="Sound3">Sound 3</option>
                </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="aspect_ratio">Aspect Ratio</label>
                        <div class="input-group">
                        <select id="aspect_ratio" name="aspect_ratio" class="form-control" required="">
                            <option value="Aspect Ratio1">Ratio 1</option>
                            <option value="Aspect Ratio2">Ratio 2</option>
                            <option value="Aspect Ratio3">Ratio 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="film_brand">Film Brand</label>
                        <div class="input-group">
                        <select id="film_brand" name="film_brand" class="form-control" required="">
                            <option value="Film Brand1">Brand 1</option>
                            <option value="Film Brand2">Brand 2</option>
                            <option value="Film Brand3">Brand 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                    </div>
                </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="carter_brand">Carter Brand</label>
                            <div class="input-group">
                        <select id="carter_brand" name="carter_brand" class="form-control" required="">
                            <option value="Carter Brand1">Carter 1</option>
                            <option value="Carter Brand2">Carter 2</option>
                            <option value="Carter Brand3">Carter 3</option>
                        </select>
                            <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                        </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="carter_material">Carter Material</label>
                        <div class="input-group">
                        <select id="carter_material" name="carter_material" class="form-control" required="">
                            <option value="Carter Material1">Carter Material 1</option>
                            <option value="Carter Material2">Carter Material 2</option>
                            <option value="Carter Material3">Carter Material 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="cover_material">Cover Material</label>
                        <div class="input-group">
                        <select id="cover_material" name="cover_material" class="form-control" required="required">
                            <option value="Cover Material1">Cover Material 1</option>
                            <option value="Cover Material2">Cover Material 2</option>
                            <option value="Cover Material3">Cover Material 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="fps">FPS</label>
                        <div class="input-group">
                        <select id="fps" name="fps" class="form-control" required="">
                            <option value="Cover Material1">FPS 1</option>
                            <option value="Cover Material2">FPS 2</option>
                            <option value="Cover Material3">FPS 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
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
