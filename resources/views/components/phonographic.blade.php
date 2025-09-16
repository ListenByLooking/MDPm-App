<div class="col-12 components_div_right" id="phonographic">
    <h2 class="text-center p-2 border-bottom">Phonographic Disc</h2>
    <input type="hidden" name="form_name" value="phonographicdisks">
    <input type="hidden" name="artwork_id" value="{{$id}}">
        <div class="row">

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
                        <select id="phone_brand" name="brand" required="" class="form-control">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <!-- Repeat the same structure for other dropdowns -->
                    <label for="brand_of_box">Brand of the Box</label>
                    <div class="input-group">
                        <select id="phone_brand_of_box" name="brand_of_box" required="" class="form-control">
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand_of_box')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="rpm">RPM</label>
                    <div class="input-group">
                        <select id="rpm" name="rpm" required="" class="form-control">
                            <option value="33rpm">33 rpm</option>
                            <option value="45rpm">45 rpm</option>
                            <option value="78rpm">78 rpm</option>
                            <option value="80rpm">80 rpm</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('rpm')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="stylus">Stylus</label>
                    <div class="input-group">
                        <select id="stylus" name="stylus" required="" class="form-control">
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('stylus')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="eq">EQ</label>
                    <div class="input-group">
                        <select id="eq" name="eq" required="" class="form-control">
                            <option value="RIAA">RIAA</option>
                            <option value="Other">Other</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('eq')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="type_of_recording">Type of Recording</label>
                    <div class="checkbox-container">
                        <input type="radio" id="mechanical" name="type_of_recording" value="mechanical">
                        <label for="mechanical">Mechanical</label>
                        <input type="radio" id="electrical" name="type_of_recording" value="electrical">
                        <label for="electrical">Electrical</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="incisions">Incisions</label>
                    <div class="checkbox-container">
                        <input type="radio" id="horizontal" name="incisions" value="horizontal">
                        <label for="horizontal">Horizontal</label>
                        <input type="radio" id="vertical" name="incisions" value="vertical">
                        <label for="vertical">Vertical</label>
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
