<div id="dpo_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('dpo.insert') }}" id="score_form">
            <input type="hidden" name="artwork_id" id="artwork_id" value="{{ $id }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dpoModalLabel">DPO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 bg-success-subtle">
                            <div class="form-group mb-2">
                                <label for="dpo_year" class="form-label">Year</label>
                                <input type="number" min="1901" step="1" placeholder="1970" id="dpo_year" class="form-control" name="dpo_year"
                                       oninvalid="this.setCustomValidity('Please enter a valid Year!'); this.style.border = 'solid 1px red'; this.style.background = '#ffdfdf'" oninput="setCustomValidity(''); this.style.border = ''; this.style.background = ''" required />
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-success-subtle">
                            <div class="form-group mb-2">
                                <label for="dpo_venue" class="form-label">Venue</label>
                                <input type="text" id="dpo_venue" placeholder="Teatro Comunale G. Verdi" class="form-control" name="dpo_venue" pattern=".*\S.*"
                                       oninvalid="this.setCustomValidity('Please enter a valid Venue!'); this.style.border = 'solid 1px red'; this.style.background = '#ffdfdf'" oninput="setCustomValidity(''); this.style.border = ''; this.style.background = ''" required />
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 bg-success-subtle">
                            <div class="form-group mb-2">
                                <label for="dpo_city" class="form-label">City</label>
                                <input type="text" id="dpo_city" placeholder="Padova" class="form-control" name="dpo_city" pattern=".*\S.*"
                                       oninvalid="this.setCustomValidity('Please enter a valid City!'); this.style.border = 'solid 1px red'; this.style.background = '#ffdfdf'" oninput="setCustomValidity(''); this.style.border = ''; this.style.background = ''" required />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border border-top">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary ">Save Changes</button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
