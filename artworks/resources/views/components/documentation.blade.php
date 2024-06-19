<div id="Documentation_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('dpo.documentation') }}" id="documentation_form">
                <input type="hidden" name="dpo_id" value="{{ $id }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Documentation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body"> 
                    <div class="col-12" id="Documentation_parent">
                        <div class="row">
                            <div class="col-4">                                                                
                                <div class="form-group mb-2">
                                    <label for="title" class="form-label">Documentation</label>
                                    <div class="input-group">
                                    <select class="form-control select2" name="documentation" id="Documentation" >
                                        <option value="">Select</option>
                                        <option value="Photos">Photos</option>
                                        <option value="A/V">A/V</option>
                                        <option value="Interviews">Interviews</option>
                                        <option value="Docs">Docs</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" onclick="activity.documentation()">Add</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-8" id="Documentation_response"> 
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer border border-top">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="dpo.documentation()">Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   