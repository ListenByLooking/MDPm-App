<div class="col-12 components_div_right" id="digital_copy_photo">
    <h2 class="text-center p-2 border-bottom" id="title" name="title">Photograph Digital Copy</h2>
    <input type="hidden" name="form_name" value="digital_copy_photo">
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
                    <select class="originalID form-control" id="original_item" name="original_item" required>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="abit">Bitdepth</label>
                    <div class="input-group">
                        <select id="abit" name="abit" class="bitdepth form-control" required>
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
                    <label for="aratio">Aspect Ratio</label>
                    <div class="input-group">
                        <select id="aspect_ratio" name="aspect_ratio" class="aspect_ratio form-control" required>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('aspect_ratio', this)">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="device">Acquisition Device</label>
                    <input type="text" id="acquisition_device" name="acquisition_device" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="size">File Size [bytes]</label>
                    <input type="number" id="filesize" name="filesize" required class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="media">Media File</label>
                    <input type="url" id="media" name="media" required class="form-control" />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
            </div>
        </div>
</div>
