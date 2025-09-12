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
    </style>
<div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="card" style="display: inline-block; background-color: unset; box-shadow: none; margin-bottom: 0px;">
                                <div class="card-header" style="display: inline-block; background-color: unset; box-shadow: none; vertical-align: middle;">
                    <h3 style="display: inline-block; margin-bottom: 0px;">DPO {{$new_id}}</h3>
                                </div>
                            <div class="card-header" style="color: none; display: inline-block; background-color: unset; box-shadow: none;">
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

    let editorValue;
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
    //editorValue = CKEDITOR.document.getById( 'ckeditor-classic' );
    CKEDITOR.replace( 'ckeditor-classic' );
    editorValue = CKEDITOR.instances['ckeditor-classic'];
    editorValue.on( 'required', function( evt ) {
        alert( 'Article content is required.' );
        evt.cancel();
    } );

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
        } else if (input.value == 'Software'){
            $('.components_div_right').hide();
            $('#append_response_form').html('');
            $('#append_response_form').html($('#software').html());
        }  else if (input.value == 'General'){
            $('.components_div_right').hide();
            $('#append_response_form').html('');
            $('#append_response_form').html($('#general').html());
        }
       },
       audiovisual:function(input){
            $('.components_div_right').hide()
            $('#originaldocs_sub_parent,#originaldocs_parent').hide();
            $('#originaldocs').val(null).change();
            if(input.value == 'Audio' || input.value == 'Film' )
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
                $('#append_response_form').html($('#vfdigital_copy').html());

            }else if(input.value == 'Original' && audio_visual == 'Film') {
                $('#append_response_form').html($('#film').html());
            }else if(input.value == 'Digital' && audio_visual == 'Audio')
            {
                $('#append_response_form').html($('#digital_copy').html());
            }else if(input.value == 'Original' && audio_visual == 'Audio')
            {
                $('#originaldocs_sub_parent').show()
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
            }else if(input.value == 'dat')
            {
                $('#append_response_form').html($('#dat').html());
            }else if(input.value == 'openreeltape')
            {
                $('#append_response_form').html($('#tape_details').html());
            }else if(input.value == 'phonographicdisks')
            {
                $('#append_response_form').html($('#phonographic').html());
            }

            dpo.getOption();
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
                                        <input type="url" class="form-control" placeholder="${doc[id]}" name="document_links[]" id="documentation-${count}" required>
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
        score:function()
        {
            var form = $("#score_form");
            var artwork_id = $("#artwork_id").val();
            var Content = editorValue.getData();
            $.ajax({
                    type:"POST",
                    url:form.attr("route"),
                    data: { _token:'{{ csrf_token() }}' , score:Content , artwork_id:artwork_id , dpo_id:'{{ $dpo_id }}' },//only input
                    datatype:"json",
                    success: function(response){
                        $('#Score_modal').modal('hide');
                        if(response.status)
                        {
                            editorValue.setData("");
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                                .then((result) => ($('#dpo-table').DataTable().ajax.reload()))
                        }else{
                            Swal.fire({icon:"error",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                        }
                    }
                });
        },
        save:function(){
            var component_form = $('#component_form').serializeArray();
            component_form.push({ name: "dpo_id", value: "{{ $dpo_id }}" })
            $.ajax({
                url:'{{ route("dpo.component") }}',
                method:"post",
                data:component_form ,
                datatype:"json",
                success:function(response)
                {
                    Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                    $('#Component').val(null).change()
                    dpo.list();
                }
            })
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
        addOption:function(option){
            const userInput = prompt('Please enter option:', '');
            if (userInput !== null) {
                $.ajax({
                    url:'{{ route("dpo.option") }}',
                    method:"post",
                    data:{_token:'{{ csrf_token() }}' , option:option , value:userInput},
                    datatype:"json",
                    success:function(response)
                    {
                        if(response.status)
                        {
                            $(`#${option}`).append(`<option value="${userInput}">${userInput}</option>`)
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                        }else{
                            Swal.fire({icon:"error",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                        }
                    }
                })
            }
        },
        getOption:function(){
            $.ajax({
                    url:'{{ route("dpo.listOption") }}',
                    method:"get",
                    datatype:"json",
                    success:function(response)
                    {
                         $.each(response,function(key,value){
                            $(`#component_form #${key}`).append(`<option value="${value}">${value}</option>`)
                         })
                    }
                })
        }
    }
    dpo.list();

    $(document).ready(function(){
        $('#documentation_form').validate({
            rules:{
                documentation:{ required:true }
            },
            messages:{
                documentation:{ required:"Please add any one" }
            }
        })


    })

    function remove(id)
{
    Swal.fire({
        html:'<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this from all DPOs?</p></div></div>',
        showCancelButton:!0,
        confirmButtonClass:"btn btn-primary w-xs me-2 mb-1",
        confirmButtonText:"Yes, Delete It!",
        cancelButtonClass:"btn btn-danger w-xs mb-1",
        buttonsStyling:!1,
        showCloseButton:!0
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
                            showCancelButton:!0,
                            showConfirmButton:!1,
                            cancelButtonClass:"btn btn-primary w-xs mb-1",
                            cancelButtonText:"Close",
                            buttonsStyling:!1,
                            showCloseButton:!0})
                        .then((result) => $('#dpo-table').DataTable().ajax.reload())
                }
            })
        }
        })
}


</script>
@endsection

