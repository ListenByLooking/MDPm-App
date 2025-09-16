<div class="col-12 components_div_right" id="software">
    <h2 class="text-center p-2 border-bottom">Software</h2>
    <input type="hidden" name="form_name" value="software">
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
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="developer">Developer</label>
                <div class="input-group">
                    <select id="developer" name="developer" required="" class="form-control">
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
                <label for="version">Version</label>
                <input type="text" id="version" name="version" pattern="[0-9]+\.?[0-9]*\.?[0-9]*" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="license">License</label>
                <input type="text" id="license" name="license" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="os">Operating System</label>
                <input type="text" id="os" name="os" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="developer">Type</label>
                <div class="input-group">
                    <select id="type" name="type" required="" class="form-control">
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
                <label for="year">Year</label>
                <input type="number" min="1901" step="1" placeholder="1970" id="year" class="form-control" name="year" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="language">Programming Language</label>
                <input type="text" id="language" name="language" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cpu">Software requirements</label>
                <input type="text" id="requirements" class="form-control" name="requirements" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="link">Link (Repository)</label>
                <input type="url" id="link" class="form-control" name="link" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="plugin">Plug-in/Library</label>
                <input type="url" id="plugin" class="form-control" name="plugin" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" class="form-control" name="description" required />
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
