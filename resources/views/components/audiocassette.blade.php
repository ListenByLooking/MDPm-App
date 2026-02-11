<div class="col-12 components_div_right" id="audiocassette">
    <h2 class="text-center p-2 border-bottom">Audio Cassette</h2>
    <input type="hidden" name="form_name" value="audiocassette">
    <input type="hidden" name="artwork_id" value="{{$id}}">
            <div class="row">

                <div class="col-4">
                    <div class="form-group">
                <label for="preservation_signature">Preservation Signature</label>
                <input type="text" id="preservation_signature" class="form-control" name="preservation_signature" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="original_signature">Original Signature</label>
                <input type="text" id="original_signature" class="form-control" name="original_signature" required />
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
                <label for="brand_of_box">Brand of the Box</label>
                <div class="input-group">
                    <select id="brand_of_box" name="brand_of_box" class="brand form-control" required>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cassette_type">Cassette Type</label>
                <div class="input-group">
                    <select id="cassette_type" name="cassette_type" required class="equalization form-control">
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('equalization', this)">+</button>
                </div>
            </div>
        </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="noise_reduction">Noise Reduction</label>
                        <div class="input-group">
                            <select id="noise_reduction" name="noise_reduction" class="noise form-control" required>
                            </select>
                            <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('noise', this)">+</button>
                        </div>
                    </div>
                </div>
        <!--div class="col-4">
            <div class="form-group">
                <label for="noise_reduction">Noise Reduction</label><br>
                <input type="radio" id="noise_reduction1" name="noise_reduction" value="yes">
                <label for="noise_reduction1" class="mx-2">Yes</label>
                <input type="radio" id="noise_reduction2" name="noise_reduction" value="no">
                <label for="noise_reduction2" class="mx-2">No</label>
                <input type="radio" id="noise_reduction3" name="noise_reduction" value="unknown">
                <label for="noise_reduction3" class="mx-2">Unknown</label>
            </div>
        </div-->
        <div class="col-12">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="3" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>
