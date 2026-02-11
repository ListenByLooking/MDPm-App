<div class="col-12 components_div_right" id="digital_copy_vf">
    <h2 class="text-center p-2 border-bottom" id="title" name="title"></h2>
    <input type="hidden" name="form_name" value="digital_copy_vf">
    <input type="hidden" name="artwork_id" value="{{ $id }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="signature">File Name</label>
                    <input type="text" id="signature" name="signature" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="format">Format</label>
                    <div class="input-group">
                        <select id="format" name="format" class="format_digital form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('format_digital', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="form-group">
                    <label>ID Original Item</label>
                    <select class="originalID form-control" name="original_item" id="original_item" required>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="codec">Codec</label>
                    <div class="input-group">
                        <select id="codec" name="codec" class="codec form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('codec', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="bitrate">Bitrate [kb/s]</label>
                    <input type="number" id="bitrate" name="bitrate" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" id="duration" name="duration" placeholder="hh:mm:ss" pattern="([0-9]|[1-9][0-9]+):[0-5][0-9]:[0-5][0-9]" required class="form-control" />
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
                    <label for="channel_config">Channel Configuration (Audio)</label>
                    <div class="input-group">
                        <select id="channel_config" name="channel_config" class="channel_configuration form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channel_configuration', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="vbit">Bitdepth (Video)</label>
                    <div class="input-group">
                        <select id="vbit" name="vbit" class="bitdepth form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('bitdepth', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="resolution">Resolution</label>
                    <div class="input-group">
                        <select id="resolution" name="resolution" class="resolution form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('resolution', this)">+</button>
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
                    <label for="frame_rate">Frame Rate</label>
                    <div class="input-group">
                        <select id="frame_rate" name="frame_rate" class="speed form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('speed', this)">+</button>
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
                    <label for="acquisition_device">Acquisition Device</label>
                    <input type="text" class="form-control" name="acquisition_device" id="acquisition_device" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="filesize">File Size [bytes]</label>
                    <input type="number" id="filesize" name="filesize" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="media">Media File</label>
                    <input type="url" class="form-control" name="media" id="media" required />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                </div>
            </div>
        </div>
</div>
