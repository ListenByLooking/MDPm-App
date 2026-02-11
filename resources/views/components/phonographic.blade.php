<div class="col-12 components_div_right" id="phonographicdisk">
    <h2 class="text-center p-2 border-bottom">Phonographic Disc</h2>
    <input type="hidden" name="form_name" value="phonographicdisk">
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
                        <select id="phone_brand" name="brand" required class="brand form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <!-- Repeat the same structure for other dropdowns -->
                    <label for="brand_of_box">Brand of the Box</label>
                    <div class="input-group">
                        <select id="phone_brand_of_box" name="brand_of_box" required class="brand form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="rpm">RPM</label>
                    <div class="input-group">
                        <select id="rpm" name="rpm" required class="speed form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="stylus">Stylus</label>
                    <div class="input-group">
                        <select id="stylus" name="stylus" required class="stylus form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('stylus', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="eq">EQ</label>
                    <div class="input-group">
                        <select id="eq" name="eq" required class="equalization form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('equalization', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group" style="display: flex; flex-direction: column; height: 100%;">
                    <label for="type_of_recording">Type of Recording</label>
                    <div class="checkbox-container" style="margin-top: 5px; margin-left: 10px; margin-bottom: auto;">
                        <input type="radio" id="mechanical" name="type_of_recording" value="mechanical" required />
                        <label for="mechanical" style="margin-right: 10px; font-weight: normal;">Mechanical</label>
                        <input type="radio" id="electrical" name="type_of_recording" value="electrical" required />
                        <label for="electrical" style="margin-right: 10px; font-weight: normal;">Electrical</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group" style="display: flex; flex-direction: column; height: 100%;">
                    <label for="incisions">Incisions</label>
                    <div class="checkbox-container" style="margin-top: 5px; margin-left: 10px; margin-bottom: auto;">
                        <input type="radio" id="horizontal" name="incisions" value="horizontal" required />
                        <label for="horizontal" style="margin-right: 10px; font-weight: normal;">Horizontal</label>
                        <input type="radio" id="vertical" name="incisions" value="vertical" required />
                        <label for="vertical" style="margin-right: 10px; font-weight: normal;">Vertical</label>
                    </div>
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
