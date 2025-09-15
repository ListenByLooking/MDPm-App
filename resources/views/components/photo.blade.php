<div class="col-12 components_div_right" id="photo">
    <h2 class="text-center p-2 boder-bottom">Photo</h2>
    <input type="hidden" name="form_name" value="photo">
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
                        <input type="radio" id="col" name="color" value="col">
                        <label for="col">Color</label>
                        <input type="radio" id="bw" name="color" value="bw">
                        <label for="bw">B/W</label>
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
                        <label for="brand">Brand</label>
                        <div class="input-group">
                        <select id="brand" name="brand" class="form-control" required="">
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
                    <label for="dimensions">Dimensions [cmxcm]</label>
                    <input type="text" id="dimensions" name="dimensions" placeholder="1000x1000" pattern="[0-9]+x[0-9]+" required class="form-control" />
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
