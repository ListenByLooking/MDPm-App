<div id="Documentation_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('dpo.documentation') }}" id="documentation_form">
                <input type="hidden" name="artwork_id" value="{{ $id }}"> 
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
                                    <button class="btn btn-success" type="button" onclick="activity.documentation(1)">Photos</button>
                                </div>
                                <div class="form-group mb-2">
                                    <button class="btn btn-success" type="button" onclick="activity.documentation(2)">A/V</button>
                                </div>
                                <div class="form-group mb-2">
                                    <button class="btn btn-success" type="button" onclick="activity.documentation(3)">Interviews</button>
                                </div>
                                <div class="form-group mb-2">
                                    <button class="btn btn-success" type="button" onclick="activity.documentation(4)">Docs</button>  
                                </div>
                            </div>
                            <div class="col-8" > 
                                <table class="table table-bordered" id="Documentation_response">
                                </table>
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