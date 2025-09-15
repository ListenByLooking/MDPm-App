<div class="col-12 components_div_right" id="digitalaudio">
    <h2 class="text-center" id="title" name="title">Digital Audio</h2>
    <input type="hidden" name="form_name" value="digitalaudio">
    <input type="hidden" name="artwork_id" value="{{ $id }}">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="signature">File Name</label>
                    <input type="text" id="signature" name="signature" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="container">Container</label>
                    <div class="input-group">
                        <select id="container" name="container" class="form-control" required="">
                            <option value="Type1">Type 1</option>
                            <option value="Type2">Type 2</option>
                            <option value="Type3">Type 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4 mb-2">
                <div class="form-group">
                    <label for="encoding">Encoding</label>
                    <div class="input-group">
                    <select id="encoding" class="form-control select3" name="encoding">
                        <option value="option 1">Option 1</option>
                        <option value="option 2">Option 2</option>
                        <option value="option 3">Option 3</option>
                    </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="bitrate">Bitrate [kb/s]</label>
                    <input type="number" id="bitrate" name="bitrate" class="form-control">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="bitdepth">Bitdepth</label>
                    <div class="input-group">
                        <select id="bitdepth" name="bitdepht" class="form-control" required="">
                            <option value="Type1">Type 1</option>
                            <option value="Type2">Type 2</option>
                            <option value="Type3">Type 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
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
                    <label for="channel">Channel Configuration</label>
                    <div class="input-group">
                        <select id="channel" name="channel" class="form-control" required="">
                            <option value="Type1">Type 1</option>
                            <option value="Type2">Type 2</option>
                            <option value="Type3">Type 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
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
                        <select id="frequency" name="frequency" class="form-control" required="">
                            <option value="Type1">Type 1</option>
                            <option value="Type2">Type 2</option>
                            <option value="Type3">Type 3</option>
                        </select>
                        <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('phone_brand')">+</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="size">File Size [bytes]</label>
                    <input type="number" id="size" name="size" required class="form-control" />
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
                    <textarea class="form-control" id="notes" name="notes"></textarea>
                </div>
            </div>
        </div>
</div>
