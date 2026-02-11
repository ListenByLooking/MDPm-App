<div class="col-12 components_div_right" id="tape_details">
    <h2 class="text-center p-2 border-bottom">Open Reel Tape</h2>
    <input type="hidden" name="form_name" value="tape_details">
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
                    <label for="brand_of_tape">Brand of the Tape</label>
                    <div class="input-group">
                        <select id="brand_of_tape" name="brand_of_tape" class="brand form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="material_of_tape">Material of the Tape</label>
                    <div class="input-group">
                        <select id="material_of_tape" name="material_of_tape" class="material form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="brand_of_box">Brand of the Box</label>
                    <div class="input-group">
                        <select id="tape_brand_of_box" name="brand_of_box" class="brand form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="brand_of_carter">Brand of the Carter</label>
                    <div class="input-group">
                        <select id="brand_of_carter" name="brand_of_carter" class="brand form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="material_of_carter">Material of the Carter</label>
                    <div class="input-group">
                        <select id="material_of_carter" name="material_of_carter" class="material form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="diameter_of_carter">Diameter of the Carter</label>
                    <div class="input-group">
                        <select id="diameter_of_carter" name="diameter_of_carter" class="dimensions form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('dimensions', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="tape_width">Tape Width</label>
                    <div class="input-group">
                        <select id="tape_width" name="tape_width" required class="dimensions form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('dimensions', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group" style="display: flex; flex-direction: column; height: 100%;">
                    <label for="sides">Number of Sides</label>
                    <div class="checkbox-container" style="margin-top: 5px; margin-left: 10px; margin-bottom: auto;">
                        <input type="radio" id="sides1" name="sides" value="1" required />
                        <label for="sides1" style="margin-right: 10px; font-weight: normal;">1</label>
                        <input type="radio" id="sides2" name="sides" value="2" required />
                        <label for="sides2" style="margin-right: 10px; font-weight: normal;">2</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="num_of_channels_sideA">Number of Channels on SideA</label>
                    <input type="number" id="num_of_channels_sideA" name="num_of_channels_sideA" class="form-control" min="1" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="channels_config_sideA">Channels Configuration (SideA)</label>
                    <div class="input-group">
                        <select id="channels_config_sideA" name="channels_config_sideA" class="channel_configuration form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channel_configuration', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="speed_sideA">Speed (SideA)</label>
                    <div class="input-group">
                        <select id="speed_sideA" name="speed_sideA" class="speed form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="num_of_channels_sideB">Number of Channels on SideB</label>
                    <input type="number" id="num_of_channels_sideB" class="form-control" name="num_of_channels_sideB" min="1" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="channels_config_sideB">Channels Configuration (SideB)</label>
                    <div class="input-group">
                        <select id="channels_config_sideB" name="channels_config_sideB" class="channel_configuration form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channel_configuration', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="speed_sideB">Speed (SideB)</label>
                    <div class="input-group">
                        <select id="speed_sideB" name="speed_sideB" required class="speed form-control">
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed', this)">+</button>
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
                <div class="form-group">
                    <label for="noise">Noise Reduction</label>
                    <div class="input-group">
                        <select id="noise" name="noise" class="noise form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('noise', this)">+</button>
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
