<div id="dpo_modal" class="modal fade flip" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('dpo.insert') }}" id="dpo_form">
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
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const form = document.getElementById('dpo_form');

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(form);

            fetch("{{ route('dpo.insert') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {

                    // Always close the modal first
                    let modal = bootstrap.Modal.getInstance(document.getElementById('dpo_modal'));
                    if (modal) modal.hide();

                    // SUCCESS
                    if (data.status === true) {

                        // Clear the form BEFORE showing the Swal
                        form.reset();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                            showCancelButton: false,
                            showConfirmButton: true,
                            confirmButtonClass: "btn btn-primary w-xs mb-1",
                            confirmButtonText: "Go to new DPO",
                            buttonsStyling: false,
                            showCloseButton: false
                        }).then(() => {
                            window.location.href = data.redirect;   // ← NEW REDIRECT
                        });
                        return;
                    }

                    // WARNING
                    if (data.status === 'warning') {
                        Swal.fire({
                            icon: "warning",
                            title: 'Already Exists',
                            text: data.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });
                        return;
                    }

                    // ERROR
                    if (data.status === false) {
                        Swal.fire({
                            icon: "error",
                            title: 'Error',
                            text: data.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });
                        return;
                    }

                })
                .catch(err => {

                    // Always close modal even on unexpected error
                    let modal = bootstrap.Modal.getInstance(document.getElementById('dpo_modal'));
                    if (modal) modal.hide();

                    Swal.fire({
                        icon: "error",
                        title: 'Error',
                        text: 'Unexpected error occurred',
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Close",
                        buttonsStyling: false,
                        showCloseButton: true
                    });
                });
        });

    });
</script>
