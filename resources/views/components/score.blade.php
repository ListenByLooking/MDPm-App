<div id="Score_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" route="{{ route('dpo.score') }}" action="javascript:dpo.score()" id="score_form">
            <input type="hidden" name="artwork_id" id="artwork_id" value="{{ $id }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scoreModalLabel">Score</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="form-group mb-2">
                        <!--label for="title" class="form-label">Score</label-->
                        <textarea class="form-control" name="score_value" id="ckeditor-classic" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer border border-top pt-2 pb-2">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary ">Save Changes</button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
