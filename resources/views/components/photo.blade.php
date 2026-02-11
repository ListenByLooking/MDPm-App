<div class="col-12 components_div_right" id="photo">
    <h2 class="text-center p-2 border-bottom">Photograph</h2>
    <input type="hidden" name="form_name" value="photo">
    <input type="hidden" name="artwork_id" value="{{$id}}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="psignature">Preservation signature</label>
                    <input type="text" id="preservation_signature" name="preservation_signature" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="osignature">Original signature</label>
                    <input type="text" id="osignature" name="osignature" class="form-control" required />
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="type">Type of Support</label>
                    <div class="input-group">
                    <select id="type" name="type" class="type_element form-control" required>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('type_element', this)">+</button>
                </div>
            </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="format">Format</label>
                    <div class="input-group">
                <select id="format" name="format" class="format_analog form-control" required>
                </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('format_analog', this)">+</button>
                </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" required />
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
                <select id="support_material" name="support_material" class="material form-control" required>
                </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material', this)">+</button>
                </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group" style="display: flex; flex-direction: column; height: 100%;">
                    <label for="color">Color/BW</label>
                    <div class="checkbox-container" style="margin-top: 5px; margin-left: 10px; margin-bottom: auto;">
                        <input type="radio" id="color" name="color" value="Color" required />
                        <label for="col" style="margin-right: 10px; font-weight: normal;">Color</label>
                        <input type="radio" id="bw" name="color" value="B/W" required />
                        <label for="bw" style="margin-right: 10px; font-weight: normal;">B/W</label>
                    </div>
                </div>
            </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="aspect_ratio">Aspect Ratio</label>
                        <div class="input-group">
                        <select id="aspect_ratio" name="aspect_ratio" class="aspect_ratio form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('aspect_ratio', this)">+</button>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <div class="input-group">
                        <select id="brand" name="brand" class="brand form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                    </div>
                </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="dimensions">Dimensions [cmxcm]</label>
                    <input type="text" id="dimensions" name="dimensions" placeholder="1000x1000" pattern="[0-9]+x[0-9]+" required class="form-control" />
                </div>
            </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes" rows="3" class="form-control"></textarea>
                </div>
            </div>
        </div>
</div>
