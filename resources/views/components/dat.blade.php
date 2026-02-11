<div class="col-12 components_div_right" id="dat">
    <h2 class="text-center p-2 border-bottom">Digital Audio Tape</h2>
    <input type="hidden" name="form_name" value="dat">
    <input type="hidden" name="artwork_id" value="{{$id}}">
    <div class="row">
                <div class="col-4">
                    <div class="form-group">
                <label for="preservation_signature">Preservation Signature</label>
                <input type="text" id="preservation_signature" name="preservation_signature" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="original_signature">Original Signature</label>
                <input type="text" id="original_signature" name="original_signature" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="brand">Brand</label>
                <div class="input-group">
                    <select id="dat_brand" name="brand" required class=" brand form-control">
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="form-group">
                    <label for="brand_of_box">Brand of the Box</label>
                    <div class="input-group">
                        <select id="dat_brand_of_box" name="brand_of_box" required class="brand form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="samplerate">Sample Frequency</label>
                    <div class="input-group">
                        <select id="samplerate" name="samplerate" required class="sample_frequency form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('sample_frequency', this)" class="form-control">+</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 d-flex flex-column justify-content-end">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="4" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>
