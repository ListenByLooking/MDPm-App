<div class="col-12 components_div_right" id="pdigital_copy">
    <h2 class="text-center p-2 border-bottom" id="title" name="title">Photo Digital Copy</h2>
    <input type="hidden" name="form_name" value="pdigital_copy">
    <input type="hidden" name="artwork_id" value="{{ $id }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="signature">File Name</label>
                    <input type="text" id="signature" name="signature" class="form-control">
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="form-group">
                    <label>ID Original Item</label>
                    <select class="form-control select3" name="originam_item">
                        <option value="option 1">Option 1</option>
                        <option value="option 2">Option 2</option>
                        <option value="option 3">Option 3</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="format">Format</label>
                    <div class="input-group">
                        <select id="format" name="format" class="form-control" required="">
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
                    <label for="abit">Bitdepth</label>
                    <div class="input-group">
                        <select id="abit" name="abit" class="form-control" required="">
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
                    <label for="resolution">Resolution</label>
                    <input type="text" id="resolution" name="resolution" placeholder="1000x1000" pattern="[0-9]+x[0-9]+" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="aratio">Aspect Ratio</label>
                    <div class="input-group">
                        <select id="aratio" name="aratio" class="form-control" required="">
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
                    <label for="device">Acquisition Device</label>
                    <input type="text" id="device" name="device" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="media">Media File</label>
                    <input type="url" id="media" name="media" required class="form-control" />
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes"></textarea>
                </div>
            </div>
        </div>
</div>
