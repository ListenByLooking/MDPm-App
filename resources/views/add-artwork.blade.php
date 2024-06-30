@extends('layouts.admin') 
@section('title','Art Works')
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
                        <!--end col-->
                        <div class="row"> 
                            <div class="col-3"> 
                                <div class="card ">
                                    <div class="card-header bg-secondary-subtle" >
                                        <h5 class="card-title mb-0 ">Add DPO</h5>
                                        <hr>
                                    </div>
                                    <div class="card-body bg-secondary-subtle pt-0">                                            
                                            <div class="row"> 
                                                <div class="col-4 mb-2">
                                                    <button class="btn btn-primary" type="button" onclick="activity.dpotypes('Component')">Component</button>
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <button class="btn btn-primary" type="button" onclick="activity.dpotypes('Score')">Score</button>
                                                </div>
                                                <div class="col-12 mb-2">
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
                                             <x-score :id="$id"></x-score>                           
                                             <x-components :id="$id"></x-components>                           
                                    </div> 
                                </div> 
                            </div> 
                            <div class="col-9"> 
                                <a href="{{ route('artwork.view',encrypt($id)) }}" class="btn btn-danger float-end">View DPO</a>
                            </div>
                        </div> 
                    </div>
                </div> 
            </div>

@endsection
@section('script')
<script> 
    let editorValue;
    ClassicEditor
            .create( document.querySelector( '#ckeditor-classic' ), {
        toolbar: {
            items: [
                'heading', 
                '|',
                'bold', 
                'italic', 
                'link', 
                'bulletedList', 
                'numberedList', 
                'blockQuote',
                '|',
                'insertTable',
                'undo', 
                'redo'
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
                $('#append_response_form').html($('#digital_copy').html());
                 
            }else if(input.value == 'Original' && audio_visual == 'Film') { 
                $('#append_response_form').html($('#original_docs').html());
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
                    
                    html =`<tr><td>${doc[id]}</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fs-4 bx bx-link"></i></span>
                                        </div>
                                        <input type="hidden" name="document_name[]" value="${doc[id]}">
                                        <input type="url" class="form-control" placeholder="${doc[id]}" name="document_links[]">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:;" class="btn btn-sm btn-danger" onclick="activity.remove('${doc[id]}',$(this))"><i class=" bx bx-trash"></i></a>
                                </td>
                            </tr>`;
                            $('#Documentation_response').append(html) 
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
                $.ajax({
                    type:"POST",
                    url:form.attr("action"),
                    data:$("#documentation_form").serialize(),//only input
                    datatype:"json",
                    success: function(response){
                        if(response.status)
                        {
                            // doc_arr = [];
                            $('#Documentation_response').html('');
                            $('#Documentation').val(null).change();
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                          
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
            var dpo_id = $("#dpo_id").val();
            var Content = editorValue.getData();
            $.ajax({
                    type:"POST",
                    url:form.attr("action"),
                    data: { _token:'{{ csrf_token() }}' , score:Content , dpo_id:dpo_id },//only input
                    datatype:"json",
                    success: function(response){
                        if(response.status)
                        { 
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                            
                        }else{
                            Swal.fire({icon:"error",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                        }
                    }
                });
        },
        save:function(){
            var component_form = $('#component_form').serialize();  
            $.ajax({
                url:'{{ route("dpo.component") }}',
                method:"post",
                data:component_form,
                datatype:"json",
                success:function(response)
                {  
                    Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                    $('#Component').val(null).change()
                    
                }
            })
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

    

    
</script>
@endsection

