<div class="col-12 components_div_right" id="video">
    <h2 class="text-center p-2 border-bottom">Video</h2>
    <input type="hidden" name="form_name" value="video">
    <input type="hidden" name="artwork_id" value="{{$id}}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="preservation_signature">Preservation signature</label>
                    <input type="text" id="preservation_signature" name="preservation_signature" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="original_signature">Original signature</label>
                    <input type="text" id="original_signature" name="original_signature" class="form-control" required />
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
                <div class="form-group" style="display: flex; flex-direction: column; height: 100%;">
                    <label for="type_of_signal">Type of Signal</label>
                    <div class="checkbox-container" style="margin-top: 5px; margin-left: 10px; margin-bottom: auto;">
                        <input type="radio" id="analog" name="type_of_signal" value="Analog" required />
                        <label for="analog" style="margin-right: 10px; font-weight: normal;">Analog</label>
                        <input type="radio" id="digital" name="type_of_signal" value="Digital" required />
                        <label for="digital" style="margin-right: 10px; font-weight: normal;">Digital</label>
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
                        <input type="radio" id="col" name="color" value="Color" required />
                        <label for="col" style="margin-right: 10px; font-weight: normal;">Color</label>
                        <input type="radio" id="bw" name="color" value="B/W" required />
                        <label for="bw" style="margin-right: 10px; font-weight: normal;">B/W</label>
                        <input type="radio" id="both" name="color" value="Both" required />
                        <label for="both" style="margin-right: 10px; font-weight: normal;">Both</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="sound">Sound</label>
                    <div class="input-group">
                        <select id="sound" name="sound" class="sound_types form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('sound_types', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="abit">Bitdepth (Audio)</label>
                    <div class="input-group">
                        <select id="abit" name="abit" class="bitdepth form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('bitdepth', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="fsaudio">Sample Frequency (Audio)</label>
                    <div class="input-group">
                        <select id="fsaudio" name="fsaudio" class="sample_frequency form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('sample_frequency', this)">+</button>
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
                    <label for="carter_material">Carter Material</label>
                    <div class="input-group">
                        <select id="carter_material" name="carter_material" class="material form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="cover_material">Cover Material</label>
                        <div class="input-group">
                            <select id="cover_material" name="cover_material" class="material form-control" required>
                            </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('material', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="standard">Standard</label>
                    <div class="input-group">
                        <select id="standard" name="standard" class="standard form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('standard', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="fps">FPS</label>
                    <div class="input-group">
                        <select id="fps" name="fps" class="speed form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="form-group">
                        <label for="resolution">Resolution</label>
                        <div class="input-group">
                            <select id="resolution" name="resolution" class="resolution form-control" required>
                            </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('resolution', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="vbit">Bitdepth (Video)</label>
                    <div class="input-group">
                        <select id="vbit" name="vbit" class="bitdepth form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('bitdepth', this)">+</button>
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
