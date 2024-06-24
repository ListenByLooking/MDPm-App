<div class="col-12 components_div_right" id="tape_details">
    <h2 class="text-center">Open Reel Tape Form</h2> 
    <input type="hidden" name="form_name" value="tape_details">
    <input type="hidden" name="dpo_id" value="{{$id}}">
        <div class="row">
            <div class="col-4"> 
                <div class="form-group">
                    <label for="preservation_signature">Preservation Signature</label>
                    <input type="text" id="preservation_signature" class="form-control" name="preservation_signature" required="">
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="original_signature">Original Signature</label>
                    <input type="text" id="original_signature"  class="form-control" name="original_signature" required="">
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="brand_of_tape">Brand of Tape</label>
                    <div class="input-group">
                        <select id="brand_of_tape" name="brand_of_tape"  class="form-control select4" required="">
                            <option value="Brand1">Brand 1</option>
                            <option value="Brand2">Brand 2</option>
                            <option value="Brand3">Brand 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand_of_tape')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="brand_of_box">Brand of Box</label>
                    <div class="input-group">
                        <select id="tape_brand_of_box" name="brand_of_box"  class="form-control select4" required="">
                            <option value="Brand1">Brand 1</option>
                            <option value="Brand2">Brand 2</option>
                            <option value="Brand3">Brand 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('tape_brand_of_box')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="brand_of_carter">Brand of Carter</label>
                    <div class="input-group">
                        <select id="brand_of_carter" name="brand_of_carter"  class="form-control select4" required="">
                            <option value="Brand1">Brand 1</option>
                            <option value="Brand2">Brand 2</option>
                            <option value="Brand3">Brand 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand_of_carter')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="material_of_carter">Material of Carter</label>
                    <div class="input-group">
                        <select id="material_of_carter" name="material_of_carter"  class="form-control select4" required="">
                            <option value="Material1">Material 1</option>
                            <option value="Material2">Material 2</option>
                            <option value="Material3">Material 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material_of_carter')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="diameter_of_carter">Diameter of Carter</label>
                    <div class="input-group">
                        <select id="diameter_of_carter" name="diameter_of_carter"  class="form-control select4" required="">
                            <option value="Diameter1">Diameter 1</option>
                            <option value="Diameter2">Diameter 2</option>
                            <option value="Diameter3">Diameter 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('diameter_of_carter')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="tape_width">Tape Width</label>
                    <div class="input-group">
                        <select id="tape_width" name="tape_width" required=""  class="form-control select4">
                            <option value="2 inch">2 inch</option>
                            <option value="1 inch">1 inch</option>
                            <option value="½ inch">½ inch</option>
                            <option value="¼ inch">¼ inch</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('tape_width')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="num_of_sides">Number of Sides</label>
                    <input type="number" id="num_of_sides" name="num_of_sides"  class="form-control" min="1" required="">
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="num_of_channels_sideA">Number of Channels on SideA</label>
                    <input type="number" id="num_of_channels_sideA" name="num_of_channels_sideA"  class="form-control" min="1" required="">
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="channels_config_sideA">Channels Configuration (SideA)</label>
                    <div class="input-group">
                        <select id="channels_config_sideA" name="channels_config_sideA"  class="form-control select4" required="">
                            <option value="Mono">Mono</option>
                            <option value="Stereo">Stereo</option>
                            <option value="Dual Mono">Dual Mono</option>
                            <option value="Quadriphonic">Quadriphonic</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channels_config_sideA')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="speed_sideA">Speed (SideA)</label>
                    <div class="input-group">
                        <select id="speed_sideA" name="speed_sideA"  class="form-control select4" required="">
                            <option value="2,38 cm/s">2,38 cm/s</option>
                            <option value="4,75 cm/s">4,75 cm/s</option>
                            <option value="9,5 cm/s">9,5 cm/s</option>
                            <option value="19 cm/s">19 cm/s</option>
                            <option value="38 cm/s">38 cm/s</option>
                            <option value="76 cm/s">76 cm/s</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed_sideA')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="num_of_channels_sideB">Number of Channels on SideB</label>
                    <input type="number" id="num_of_channels_sideB"  class="form-control" name="num_of_channels_sideB" min="1" required="">
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="channels_config_sideB">Channels Configuration (SideB)</label>
                    <div class="input-group">
                        <select id="channels_config_sideB" name="channels_config_sideB"  class="form-control select4" required="">
                            <option value="Mono">Mono</option>
                            <option value="Stereo">Stereo</option>
                            <option value="Dual Mono">Dual Mono</option>
                            <option value="Quadriphonic">Quadriphonic</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channels_config_sideB')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="speed_sideB">Speed (SideB)</label>
                    <div class="input-group">
                        <select id="speed_sideB" name="speed_sideB" required=""  class="form-control select4">
                            <option value="2,38 cm/s">2,38 cm/s</option>
                            <option value="4,75 cm/s">4,75 cm/s</option>
                            <option value="9,5 cm/s">9,5 cm/s</option>
                            <option value="19 cm/s">19 cm/s</option>
                            <option value="38 cm/s">38 cm/s</option>
                            <option value="76 cm/s">76 cm/s</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed_sideB')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="eq">EQ</label>
                    <div class="input-group">
                        <select id="eq" name="eq" required=""  class="form-control select4">
                            <option value="IEC1">IEC1</option>
                            <option value="IEC2">IEC2</option>
                            <option value="CCIR">CCIR</option>
                            <option value="NAB">NAB</option>
                            <option value="AES">AES</option>
                            <option value="DIN">DIN</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('eq')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4"> 
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes" rows="3"  class="form-control" required=""></textarea>
                </div>
            </div> 
        </div> 
</div>