<div class="col-12 components_div_right" id="general">
    <h2 class="text-center p-2 border-bottom">General Object</h2>
    <input type="hidden" name="form_name" value="general">
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
                <label for="creator">Creator</label>
                <input type="text" id="creator" name="creator" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" required class="form-control" />
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
                <label for="identifier">Identifier</label>
                <input type="text" id="identifier" name="identifier" required class="form-control" />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="brand">Brand</label>
                <div class="input-group">
                    <select id="brand" name="brand" required="" class="form-control">
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
                <label for="material">Material</label>
                <div class="input-group">
                    <select id="material" name="material" required="" class="form-control">
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
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="3" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>
