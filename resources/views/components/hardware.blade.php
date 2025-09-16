<div class="col-12 components_div_right" id="hardware">
    <h2 class="text-center p-2 border-bottom">Hardware</h2>
    <input type="hidden" name="form_name" value="hardware">
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
                <label for="brand">Manufacturer</label>
                <div class="input-group">
                    <select id="brand" name="brand" class="form-control" required>
                    </select>
                    <button type="button" class="add-button btn btn-success" onclick="dpo.addOption('brand')">+</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model" name="model" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="serial">Serial Number</label>
                <input type="text" id="serial" name="serial" required class="form-control" />
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
                <label for="year">Year</label>
                <input type="number" min="1901" step="1" placeholder="1970" id="year" class="form-control" name="year" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="cpu">CPU</label>
                <input type="text" id="cpu" class="form-control" name="cpu" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="ram">RAM</label>
                <input type="text" id="ram" class="form-control" name="ram" required />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="storage">Storage</label>
                <input type="text" id="storage" class="form-control" name="storage" required />
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
                <label for="display">Display</label>
                <input type="text" id="display" name="display" required class="form-control" />
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
