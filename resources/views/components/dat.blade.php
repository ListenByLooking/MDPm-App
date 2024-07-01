<div class="col-12 components_div_right" id="dat">
    <h2 class="text-center">DAT</h2> 
    <input type="hidden" name="form_name" value="dat">
    <input type="hidden" name="artwork_id" value="{{$id}}"> 
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" required="" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                <label for="preservation_signature">Preservation Signature</label>
                <input type="text" id="preservation_signature" name="preservation_signature" required="" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="original_signature">Original Signature</label>
                <input type="text" id="original_signature" name="original_signature" required="" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="brand">Brand</label>
                <div class="input-group">
                    <select id="dat_brand" name="brand" required="" class="form-control">
                        <option value="">Select...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('dat_brand')">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="brand_of_box">Brand of the Box</label>
                <div class="input-group">
                    <select id="dat_brand_of_box" name="brand_of_box" required="" class="form-control">
                        <option value="">Select...</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('dat_brand_of_box')">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="samplerate">Samplerate</label>
                <div class="input-group">
                    <select id="samplerate" name="samplerate" required="" class="form-control">
                        <option value="">Select...</option>
                        <option value="24000hz">24000 Hz</option>
                        <option value="44100hz">44100 Hz</option>
                        <option value="48000hz">48000 Hz</option>
                        <option value="88200hz">88200 Hz</option>
                        <option value="96000hz">96000 Hz</option>
                        <option value="192000hz">192000 Hz</option>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('samplerate')" class="form-control">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="3" class="form-control"></textarea>
            </div>
        </div>
    </div> 
</div>