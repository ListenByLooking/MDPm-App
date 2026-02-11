@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<?php
$user = Auth::user();
?>
<style>
    .dpo_parents,.components_parents,.originaldocs_parents{ display: none;}
    .select2-container .select2-selection--single{ height: 38px;}
    .select2-container--default .select2-selection--single .select2-selection__arrow b{ top:60% }
    .input-group{ flex-wrap:unset}
    #digital_copy,
    #original_docs,
    #tape_details,
    #audiocassette,
    #dat,
    #phonographic{ display:none }
    .components_div,.components_div_right{ display: none; }
    .form-group > label {
        margin: 0px;
    }
    .form-group{
    margin-bottom: 10px;
    }
    .ckeditor-error {
        border: 1px solid red !important;
        background: #ffdfdf !important;
    }
    </style>
<div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="card" style="display: inline-block; background-color: unset; box-shadow: none; margin-bottom: 0px;">
                                <div class="card-header" style="display: inline-block; background-color: unset; box-shadow: none; vertical-align: middle;">
                    <h3 style="display: inline-block; margin-bottom: 0px;">DPO {{$new_id}}</h3>
                                </div>
                            <div class="card-header" style="color: unset; display: inline-block; background-color: unset; box-shadow: none;">
                                <a href="{{ route('artwork.view',encrypt($id)) }}" class="btn btn-danger">View all DPOs</a>
                            </div>
                        </div>
                    </div>
                        <!--end col-->
                        <div class="row">
                            <div class="col-6">
                                <div class="card ">
                                    <div class="card-header bg-secondary-subtle" >
                                        <h5 class="card-title mb-0 ">Create new:</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body bg-secondary-subtle pt-0">
                                            <div class="row">
                                                <div class="col-4 mb-2">
                                                    <button class="btn btn-primary" type="button" onclick="activity.dpotypes('Component')">Component</button>
                                                </div>
                                                <div class="col-4 mb-2" style="text-align: center;">
                                                    <button class="btn btn-primary" type="button" onclick="activity.dpotypes('Score')">Score</button>
                                                </div>
                                                <div class="col-4 mb-2" style="text-align: right;">
                                                    <button class="btn btn-primary" type="button" onclick="activity.dpotypes('Documentation')">Documentation</button>
                                                    {{-- <div class="form-group mb-2">
                                                            <label for="title" class="form-label">DPO Type</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="dpotypes"  onchange="">
                                                                    <option value="">Select</option>
                                                                    <option value="Component"></option>
                                                                    <option value="Score">Score</option>
                                                                    <option value="Documentation">Documentation</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button" onclick="activity.modal()">&nbsp;<i class="  ri-add-line"></i></button>
                                                                </div>
                                                            </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <!-- Default Modals -->

                                             <x-documentation :id="$id"></x-documentation>
                                             <x-score :id="$id" ></x-score>
                                             <x-components :id="$id"></x-components>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card ">
                                    <div class="card-header bg-secondary-subtle" >
                                        <h5 class="card-title mb-0 ">Add from existing:</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body bg-secondary-subtle pt-0">
                                        <div class="row">
                                            <div class="col-2 mb-2 align-middle" style="text-align: right; padding-right: 0; display: flex;"><label style="margin: auto 0 auto auto;">Entry type:</label></div>
                                            <div class="col-5 mb-2">
                                                <select class="form-control select3" name="format">
                                                    <option value="" disabled selected>Select your option</option>
                                                    <option value="documentation">Documentation</option>
                                                    <option value="score">Score</option>
                                                    <option value="option 3">Option 3</option>
                                                </select>
                                            </div>
                                            <div class="col-2 mb-2" style="text-align: right; padding-right: 0; display: flex;"><label style="margin: auto 0 auto auto;">Entry id:</label></div>
                                            <div class="col-3 mb-2">
                                                <input type="number" class="form-control" name="selector_id" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--div class="col-3">
                                <a href="\{\{ route('artwork.view',encrypt($id)) }}" class="btn btn-danger float-end">View DPO</a>
                            </div-->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table id="dpo-table" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <!--th width="6%">Id</th-->
                                                    <th width="6%">Id</th>
                                                    <th>Type</th>
                                                    <!--th>Component</th>
                                                    <th>Audio Visual</th>
                                                    <th>Original Docs</th>
                                                    <th>Original</th-->
                                                    <th width="1%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('script')
    <script>
        // Prevent ENTER from closing Bootstrap modals
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && $('.modal.show').length) {
                e.preventDefault();
                return false;
            }
        });
    </script>
    <script>

        //https://stackoverflow.com/questions/77959273/ckeditor-4-22-1-error-throws-an-error-regarding-version-is-not-secure

        /*document.addEventListener('keydown', function (e) {
            if (e.target.closest('.cke_dialog')) {
                e.stopImmediatePropagation();
            }
        }, true);*/

        // Fix CKEditor dialogs inside Bootstrap 4 modals
    //$.fn.modal.Constructor.prototype.enforceFocus = function() {};

    // 1. Disable Bootstrap 5 focus trap
    /*document.addEventListener('shown.bs.modal', function (event) {
        const modal = event.target;
        const instance = bootstrap.Modal.getInstance(modal);
        if (instance) {
            instance._enforceFocus = function () {};
        }
    });*/
    // Allow CKEditor dialogs to receive focus inside Bootstrap 5 modals
    /*document.addEventListener('focusin', function (e) {
        if (
            e.target.closest('.cke_dialog') ||
            e.target.classList.contains('cke_dialog_ui_input_text') ||
            e.target.classList.contains('cke_dialog_ui_input_select')
        ) {
            e.stopPropagation();
        }
    });*/

    //let editorValue;
    /*ClassicEditor
            .create( document.querySelector( '#ckeditor-classic' ), {
        toolbar: {
            items: [
                'undo', 'redo',
                '|', 'heading',
                '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                '-', // break point
                '|', 'alignment', 'insertTable',
                'link', 'blockQuote', 'codeBlock',
                '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent',
                '-', // break point
                'Image', 'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize', 'ImageUpload', 'MediaEmbed'
            ]
        },
        // Remove the plugins related to image and video if you don't want them to be loaded at all.
       // removePlugins: ['Image', 'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize', 'ImageUpload', 'MediaEmbed']
    })

            .then(editor => {
                editorValue = editor;
            })
            .catch(error => {
                    console.error(error);
            });*/

        document.addEventListener('shown.bs.modal', function (event) {
            //console.log(event.target.id)
            if (event.target.id === 'Score_modal') {
                // Disable Bootstrap 5 focus trap for this modal
                var modal = bootstrap.Modal.getInstance(event.target);
                if (modal && modal._focustrap) {
                    modal._focustrap.deactivate();
                }

                /*CKEDITOR.on('notificationShow', function (evt) {
                    if (evt.data.message && evt.data.message.includes('not secure')) {
                        evt.cancel();
                    }
                });*/
            }
        });

        // Initialize CKEditor
        if (!CKEDITOR.instances.editor) {
            CKEDITOR.replace('ckeditor-classic');
        }

    //editorValue = CKEDITOR.document.getById( 'ckeditor-classic' );
    /*CKEDITOR.replace('ckeditor-classic'/*, {
        removePlugins: 'required'
    });*/

    /*CKEDITOR.on('instanceReady', function (evt) {
        evt.editor.on('required', function (e) {
            e.cancel(); // stop CKEditor from firing its native alert
        });
    });*/
    //editorValue = CKEDITOR.instances['ckeditor-classic'];
    //document.getElementById('score_form').onclick = function() {
        //alert( CKEDITOR.instances['ckeditor-classic'].getData().replace(/<p>[&nbsp;\s*]+<\/p>/,'') );
        //alert(CKEDITOR.instances['ckeditor-classic'].getData());
        //var messageLength1 = CKEDITOR.instances['ckeditor-classic'].getData().length;
    //    let message = CKEDITOR.instances['ckeditor-classic'].getData().replaceAll(/<p>[&nbsp;\s*]+<\/p>\n*/g,'');
    //    CKEDITOR.instances['ckeditor-classic'].setData(message);
        //alert( messageLength1 + ', ' + messageLength2);
        //alert(CKEDITOR.instances['ckeditor-classic'].getData().replaceAll(/<p>[&nbsp;\s*]+<\/p>\n*/g,''));
        //if( messageLength1 != messageLength2 && !messageLength2 ) {
            //alert( 'Please enter a message' );
        //}
    //};

    document.getElementById('score_form').addEventListener('submit', function (e) {
        const editor = CKEDITOR.instances['ckeditor-classic'];
        editor.container.addClass('ckeditor-error');
        const raw = editor.getData();

        // Remove empty paragraphs, whitespace, &nbsp;
        const cleaned = raw.replace(/<p>(?:&nbsp;|\s)*<\/p>/g, '').trim();

        if (!cleaned) {
            e.preventDefault(); // stop form submission
            alert('Score content is required!');
            editor.focus();
            return false;
        }

        // Put cleaned content back into the textarea before submit
        editor.setData(cleaned);
    });

    //editorValue.on( 'required', function( evt ) {
        //editorValue.setCustomValidity('Please enter a valid Text!');
        //editorValue.style.border = 'solid 1px red';
        //editorValue.style.background = '#ffdfdf'";
    //    alert( 'Score content is required!' );
    //    evt.cancel();
    //} );

    $('#Score_modal').on('hidden.bs.modal', function () {
        const editor = CKEDITOR.instances['ckeditor-classic'];
        if (editor) {
            editor.container.removeClass('ckeditor-error');
        }
    });


    const doc_arr = [];
    const activity = {
        modal:function(dpotypes){
           // const dpotypes = document.getElementById('dpotypes').value;
            if(dpotypes!="")
            {
                $('#myModalLabel').text(dpotypes);
                $(`#${dpotypes}_modal`).modal('show');
                $('.select2').select2({
                        dropdownParent: $(`#${dpotypes}_modal`)
                    });
            }
        },
        dpotypes:function(input){
            activity.modal(input)
           $('.dpo_parents').hide();
           $(`#${input}_parent`).show();
       },
       component:function(input){
        $('.components_div').hide();
        $('.components_div_right').hide()
        $('#Audiovisual').val(null).change();
        if(input.value == 'AudioVisual')
        {
            $('#AudioVisual_parent').show();
        } else if (input.value == 'Hardware'){
            $('.components_div_right').hide();
            $('#append_response_form').html('');
            $('#append_response_form').html($('#hardware').html());
            ['brand'].forEach(field => dpo.getOption(field));
        } else if (input.value == 'Software'){
            $('.components_div_right').hide();
            $('#append_response_form').html('');
            $('#append_response_form').html($('#software').html());
            ['brand', 'software_type'].forEach(field => dpo.getOption(field));
        }  else if (input.value == 'General'){
            $('.components_div_right').hide();
            $('#append_response_form').html('');
            $('#append_response_form').html($('#general').html());
            ['brand', 'material', 'general_type'].forEach(field => dpo.getOption(field));
        }
       },
       audiovisual:function(input){
            $('.components_div_right').hide()
            $('#originaldocs_sub_parent,#originaldocs_parent').hide();
            $('#originaldocs,#originaldocs_sub').val(null).change();
            if(input.value == 'Audio' || input.value == 'Film' || input.value == 'Video' || input.value == 'Photo')
             {
                $(`#originaldocs_parent`).show();
             }
       },
       originaldocs:function(input){
            $('.components_div_right').hide();
            $('#originaldocs_sub_parent').hide();
            var audio_visual = $("#Audiovisual").val();
            $('#append_response_form').html('');
            if(input.value == 'Digital' && audio_visual == 'Film')
            {
                $('#append_response_form').html($('#digital_copy_vf').html());
                document.getElementById("title").innerText = "Film Digital Copy";
                ['format_digital', 'codec', 'bitdepth', 'channel_configuration', 'resolution', 'aspect_ratio', 'speed', 'sample_frequency'].forEach(field => dpo.getOption(field));
                dpo.populateIDs('originalID', [ 'film' ]);

            }else if(input.value == 'Original' && audio_visual == 'Film') {
                $('#append_response_form').html($('#film').html());
                ['brand', 'format_analog', 'aspect_ratio', 'type_element', 'material', 'sound_types', 'speed'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'Digital' && audio_visual == 'Audio')
            {
                $('#append_response_form').html($('#digital_copy_audio').html());
                ['format_digital', 'codec', 'bitdepth', 'channel_configuration', 'sample_frequency'].forEach(field => dpo.getOption(field));
                dpo.populateIDs('originalID', [ 'audiocassette', 'dat', 'digital_audio', 'phonographicdisk', 'tape' ]);
                $('#original_item').on('change', function () {

                    const selectedOption = $(this).find('option:selected');
                    const optgroup = selectedOption.closest('optgroup');

                    if (optgroup.length) {
                        let type = optgroup.attr('label').toLowerCase().replace(/\b\w/g, c => c.toUpperCase()); // e.g. "Audio Cassette"
                        $('#original_type').val(type);
                    }
                });
            }else if(input.value == 'Original' && audio_visual == 'Audio')
            {
                //$('#originaldocs_sub').val(null).trigger('change');
                $('#originaldocs_sub_parent').show();
            }else if(input.value == 'Original' && audio_visual == 'Video')
            {
                $('#append_response_form').html($('#video').html());
                ['format_analog', 'sound_types', 'bitdepth', 'sample_frequency', 'aspect_ratio', 'brand', 'material', 'standard', 'speed', 'resolution'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'Digital' && audio_visual == 'Video')
            {
                $('#append_response_form').html($('#digital_copy_vf').html());
                document.getElementById("title").innerText = "Video Digital Copy";
                ['format_digital', 'codec', 'bitdepth', 'channel_configuration', 'resolution', 'aspect_ratio', 'speed', 'sample_frequency'].forEach(field => dpo.getOption(field));
                dpo.populateIDs('originalID', [ 'video' ]);
            }else if(input.value == 'Original' && audio_visual == 'Photo')
            {
                $('#append_response_form').html($('#photo').html());
                ['format_analog', 'aspect_ratio', 'brand', 'material', 'type_element'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'Digital' && audio_visual == 'Photo')
            {
                $('#append_response_form').html($('#digital_copy_photo').html());
                ['format_digital', 'bitdepth', 'resolution', 'aspect_ratio'].forEach(field => dpo.getOption(field));
                dpo.populateIDs('originalID', [ 'photo' ]);
            }

            $('#Component_modal > .select3').select2({
                        dropdownParent: $(`#Component_modal`)
                    });

       },
       originaldocs_sub:function(input){
            $('.components_div_right').hide();
            if(input.value == 'audiocassette')
            {
                $('#append_response_form').html($('#audiocassette').html());
                ['brand', 'equalization', 'noise'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'dat')
            {
                $('#append_response_form').html($('#dat').html());
                ['brand', 'sample_frequency'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'openreeltape')
            {
                $('#append_response_form').html($('#tape_details').html());
                ['brand', 'material', 'dimensions', 'channel_configuration', 'speed', 'equalization', 'noise'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'phonographicdisk')
            {
                $('#append_response_form').html($('#phonographicdisk').html());
                ['brand', 'stylus', 'speed', 'equalization'].forEach(field => dpo.getOption(field));
            }else if(input.value == 'digitalaudio')
            {
                $('#append_response_form').html($('#digitalaudio').html());
                ['format_digital', 'codec', 'bitdepth', 'channel_configuration', 'sample_frequency'].forEach(field => dpo.getOption(field));
            }

            //dpo.getOption();
       },

       //component section Start
       documentation:function(id){
            if(id !="")
            {
                var doc = ['','Photos','A/V','Interviews','Docs'];
                var count = (Object.entries($('#Documentation_response'))[0][1]).rows.length;

                    html =`<tr><td style="text-align: center;">${doc[id]}</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fs-4 bx bx-link"></i></span>
                                        </div>
                                        <input type="hidden" name="document_name[]" value="${doc[id]}">
                                        <input type="url" class="form-control" placeholder="url://" name="document_links[]" id="documentation-${count}"
                                                   oninvalid="this.setCustomValidity('Please enter a valid Url!'); this.style.border = 'solid 1px red'; this.style.background = '#ffdfdf'" oninput="setCustomValidity(''); this.style.border = ''; this.style.background = ''" required>
                                    </div>
                                </td>
                                <td style="text-align: center;">
                                    <a href="javascript:;" style="background-color: var(--vz-btn-bg); padding: var(--vz-btn-padding-y) var(--vz-btn-padding-x);" class="btn btn-sm btn-danger" onclick="activity.remove('${doc[id]}',$(this))"><i style="color: #fff;" class="fs-5 bx bx-trash"></i></a>
                                </td>
                            </tr>`;
                            $('#Documentation_response').append(html);
            }
       },
       remove:function(element,input)
       {
        var index = doc_arr.indexOf(element);
        delete doc_arr.splice(index, 1)
        console.log(input.parents('tr').remove())
       }
    }

    const dpo = {
        documentation:function()
        {
            if($('#documentation_form').valid())
            {
                var form=$("#documentation_form");
                var formdata = $("#documentation_form").serializeArray();
                formdata.push({ name: "dpo_id", value: "{{ $dpo_id }}" })
                $.ajax({
                    type:"POST",
                    url:form.attr("route"),
                    data: formdata ,//only input
                    datatype:"json",
                    success: function(response){
                        $('#Documentation_modal').modal('hide');
                        if(response.status)
                        {
                            // doc_arr = [];
                            $('#Documentation_response').html('');
                            $('#Documentation').val(null).change();
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                                .then((result) => ($('#dpo-table').DataTable().ajax.reload()))
                        }else{
                            Swal.fire({icon:"error",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                        }
                    }
                });

            }
        },
        score: function () {

            const editor = CKEDITOR.instances['ckeditor-classic'];
            let raw = editor.getData();

            // 1. Clean obvious empty HTML
            let cleaned = raw
                .replace(/<p>(?:&nbsp;|\s|<br>)*<\/p>/gi, '')  // remove empty <p>
                .replace(/<br\s*\/?>/gi, '')                  // remove <br>
                .trim();

            // 2. Check if there is at least one image
            const hasImage = /<img\b[^>]*>/i.test(raw);

            // 3. Extract visible text (strip HTML)
            const textOnly = cleaned
                .replace(/<[^>]+>/g, '') // remove HTML tags
                .replace(/&nbsp;/g, ' ') // convert &nbsp;
                .trim();

            // 4. Validation rules:
            //    - If there is an image → OK (even if no text)
            //    - If no image → must contain real text
            if (!hasImage && !textOnly) {
                editor.container.addClass('ckeditor-error');
                Swal.fire({
                    icon: "error",
                    text: "Score content is required!",
                    showCancelButton: false,
                    confirmButtonClass: "btn btn-primary w-xs mb-1",
                    confirmButtonText: "Close",
                    buttonsStyling: false,
                    showCloseButton: true
                });
                editor.focus();
                return;
            } else {
                editor.container.removeClass('ckeditor-error');
            }

            // 5. Update editor with cleaned content
            editor.setData(cleaned);

            // Continue with your AJAX logic...
            const form = $("#score_form");
            const artwork_id = $("#artwork_id").val();

            $.ajax({
                type: "POST",
                url: form.attr("route"),
                data: {
                    _token: '{{ csrf_token() }}',
                    score: cleaned,
                    artwork_id: artwork_id,
                    dpo_id: '{{ $dpo_id }}'
                },
                datatype: "json",
                success: function (response) {

                    $('#Score_modal').modal('hide');

                    if (response.status) {
                        editor.setData("");

                        Swal.fire({
                            icon: "success",
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        }).then(() => {
                            $('#dpo-table').DataTable().ajax.reload();
                        });

                    } else {
                        Swal.fire({
                            icon: "error",
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });
                    }
                }
            });
        },
        save: function () {

            let component_form = $('#component_form').serializeArray();
            component_form.push({ name: "dpo_id", value: "{{ $dpo_id }}" });

            $.ajax({
                url: '{{ route("dpo.component") }}',
                method: "POST",
                data: component_form,
                dataType: "json",

                success: function (response) {

                    $('#Component_modal').modal('hide');

                    if (response.status) {
                        // SUCCESS CASE
                        Swal.fire({
                            icon: "success",
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });

                        $('#Component').val(null).change();
                        dpo.list();

                    } else {
                        // INSERT FAILED (response.status = false)
                        Swal.fire({
                            icon: "error",
                            text: response.message || "Insert failed.",
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });
                    }
                },

                error: function (xhr, status, error) {
                    // SERVER / NETWORK / VALIDATION ERRORS

                    let message = "An unexpected error occurred.";

                    // Laravel validation errors
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        message = Object.values(xhr.responseJSON.errors)
                            .flat()
                            .join("\n");
                    }

                    // Laravel exception message
                    else if (xhr.responseJSON?.message) {
                        message = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: "error",
                        text: message,
                        showCancelButton: true,
                        showConfirmButton: false,
                        cancelButtonClass: "btn btn-primary w-xs mb-1",
                        cancelButtonText: "Close",
                        buttonsStyling: false,
                        showCloseButton: true
                    });
                }
            });
        },
        list:function()
        {
            if ($.fn.DataTable.isDataTable("#dpo-table")) {
                $('#dpo-table').DataTable().clear().destroy();
            }
            var table = $('#dpo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dpo.search') }}",
                    type: 'POST',
                    data:{ _token:'{{ csrf_token() }}' , artwork_id:'{{ $id}}' , dpo_id:'{{ $dpo_id }}' }
                },
                //rowsGroup: [0],
                // spans:true,
                columns: [
                    //{ data: 'id' , },
                    { data: 'component_id' , name: 'second', },
                    { data: 'comp_type' },
                    /*{ data: 'component' },
                    { data: 'audio_visual' },
                    { data: 'original_docs' },
                    { data: 'original_docs_sub' },*/
                    { data: 'action', orderable: false },
                ],
                /*rowsGroup: [
                            'second:name',
                            0
                        ],*/
                //order: [[3, 'desc']],
                // 'createdRow': function(row, data, dataIndex){
                //             if(data[2] === ''){
                //                 $('td:eq(1)', row).attr('rowspan', 5);
                //                 $('td:eq(2)', row).css('display', 'none');
                //                 $('td:eq(3)', row).css('display', 'none');
                //                 $('td:eq(4)', row).css('display', 'none');
                //                 $('td:eq(5)', row).css('display', 'none');
                //             }
                //         }
            });
        },
        addOption: function(option, clickedButton = null) {

            let userInput = prompt('Please enter option:', '');
            if (userInput === null) return; // user cancelled

            userInput = userInput.trim();
            if (userInput === '') {
                Swal.fire({
                    icon: "error",
                    text: "Value cannot be empty.",
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "Close",
                    buttonsStyling: false,
                    showCloseButton: true
                });
                return;
            }

            // Prevent duplicates in ANY select with this class
            let duplicateFound = false;
            $(`select.${option} option`).each(function() {
                if ($(this).val().toLowerCase() === userInput.toLowerCase()) {
                    duplicateFound = true;
                }
            });

            if (duplicateFound) {
                Swal.fire({
                    icon: "warning",
                    text: "This value already exists.",
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "Close",
                    buttonsStyling: false,
                    showCloseButton: true
                });
                return;
            }

            // Send to backend
            $.ajax({
                url: '{{ route("dpo.option") }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}',
                    option: option,
                    value: userInput
                },
                datatype: "json",
                success: function(response) {

                    if (response.status) {

                        // Update ALL selects with this class
                        $(`select.${option}`).each(function() {
                            $(this).append(
                                `<option value="${userInput}">${userInput}</option>`
                            );
                        });

                        // If we know which "+" button was clicked, select only that dropdown
                        if (clickedButton) {
                            const selectToUpdate = $(clickedButton).closest('.input-group').find(`select.${option}`);
                            selectToUpdate.val(userInput);
                        }

                        Swal.fire({
                            icon: "success",
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });

                    } else {

                        Swal.fire({
                            icon: "error",
                            text: response.message,
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: "btn btn-primary w-xs mb-1",
                            cancelButtonText: "Close",
                            buttonsStyling: false,
                            showCloseButton: true
                        });
                    }
                }
            });
        },
        getOption: function(field) {

            const selects = $(`select.${field}`);

            $.ajax({
                url: '{{ route("dpo.listOption") }}',
                method: "get",
                data: { table_name: field },
                datatype: "json",
                success: function (response) {

                    selects.each(function() {

                        const select = $(this);

                        // Clear existing options
                        select.empty();

                        // Add a placeholder so nothing is selected by default
                        select.append(`<option value="" disabled selected>Select an option</option>`);

                        // Populate options
                        response.forEach(item => {
                            select.append(`<option value="${item.value}">${item.value}</option>`);
                        });
                    });
                }
            });
        },
        populateIDs: function(field, tables) {

            const selects = $(`select.${field}`);

            $.ajax({
                url: '{{ route("dpo.fetchIDs") }}',
                method: "get",
                data: { tables: tables },
                datatype: "json",

                success: function (response) {

                    selects.each(function() {

                        const select = $(this);

                        select.empty();
                        select.append(`<option value="" disabled selected>Select an option</option>`);

                        const groups = {};

                        response.items.forEach(item => {
                            if (!groups[item.type]) groups[item.type] = [];
                            groups[item.type].push(item);
                        });

                        Object.keys(groups).forEach(type => {
                            const optgroup = $(`<optgroup label="${type.toUpperCase()}"></optgroup>`);

                            groups[type].forEach(item => {
                                optgroup.append(
                                    `<option value="${item.id}">${item.label} (ID ${item.id})</option>`
                                );
                            });

                            select.append(optgroup);
                        });

                        if (select.hasClass('select2')) {
                            select.trigger('change');
                        }
                    });
                }
            });
        }
    }
    dpo.list();

    $(document).ready(function(){
        /*$('#documentation_form').validate({
            rules:{
                documentation:{ required:true }
            },
            messages:{
                documentation:{ required:"Please add any one" }
            }
        })*/


    })

    function remove(id)
{
    Swal.fire({
        html:'<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this from all DPOs?</p></div></div>',
        showCancelButton: true,
        confirmButtonText: "Yes, Delete It!",
        customClass: {
            confirmButton: 'btn btn-primary w-xs me-2 mb-1',
            cancelButton: 'btn btn-danger w-xs mb-1'
        },
        buttonsStyling: false,
        showCloseButton: true,
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'{{ route("dpo.delete") }}',
                method:"post",
                data:{_token:'{{ csrf_token() }}' , id:id},
                datatype:"json",
                success:function(response)
                {
                    Swal.fire({
                            icon:"success",
                            text:'One row deleted successfully',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass:"btn btn-primary w-xs mb-1",
                            cancelButtonText:"Close",
                            buttonsStyling: false,
                            showCloseButton: true})
                        .then((result) => $('#dpo-table').DataTable().ajax.reload())
                }
            })
        }
        })
}


</script>
@endsection

