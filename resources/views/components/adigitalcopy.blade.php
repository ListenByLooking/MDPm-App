<div class="col-12 components_div_right" id="digital_copy_audio">
    <h2 class="text-center p-2 border-bottom" id="title" name="title">Audio Digital Copy</h2>
    <input type="hidden" name="form_name" value="digital_copy_audio">
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
                    <label for="container">Container</label>
                    <div class="input-group">
                        <select id="container" name="container" class="format_digital form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('format_digital', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="form-group">
                    <label for="encoding">Encoding</label>
                    <div class="input-group">
                    <select id="encoding" class="codec form-control" name="encoding" required>
                    </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('codec', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="form-group">
                    <label for="original">ID Original Item</label>
                    <div class="input-group">
                    <select id="original_item" class="originalID form-control" name="original_item" required>
                    </select>
                </div>
                </div>
            </div>

            <input type="hidden" name="original_type" id="original_type">

            <div class="col-4">
                <div class="form-group">
                    <label for="bitrate">Bitrate [kb/s]</label>
                    <input type="number" id="bitrate" name="bitrate" class="form-control" required />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="bitdepth">Bitdepth</label>
                    <div class="input-group">
                        <select id="bitdepth" name="bitdepht" class="bitdepth form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('bitdepth', this)">+</button>
                    </div>
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
                    <label for="channel_config">Channel Configuration</label>
                    <div class="input-group">
                        <select id="channel_config" name="channel_config" class="channel_configuration form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('channel_configuration', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="checksum">Checksum</label>
                    <input type="text" id="checksum" name="checksum" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="frequency">Sample Frequency</label>
                    <div class="input-group">
                        <select id="frequency" name="frequency" class="sample_frequency form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('sample_frequency', this)">+</button>
                    </div>
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
                    <label for="acquisition_device">Acquisition Device</label>
                    <input type="text" id="acquisition_device" name="acquisition_device" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="media">Media File</label>
                    <input type="url" id="media" name="media" required class="form-control" />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
            </div>
        </div>
</div>
