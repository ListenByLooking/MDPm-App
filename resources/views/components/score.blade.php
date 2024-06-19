<div id="Score_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('dpo.score') }}" id="score_form">
            <input type="hidden" name="dpo_id" id="dpo_id" value="{{ $id }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body"> 
                <div class="col-12">
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Score</label>
                        <textarea class="form-control" name="score_value" id="ckeditor-classic"></textarea>
                    </div>
                </div> 
            </div>
            <div class="modal-footer border border-top">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary " onclick="dpo.score()">Save Changes</button>
            </div> 
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->     