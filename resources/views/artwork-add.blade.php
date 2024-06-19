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
                            <div class="col-5"> 
                                <div class="card card-body bg-danger-subtle">
                                    <div class="d-flex mb-4 align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('public/images/img-5.jpg') }}" alt="" class="avatar-sm rounded-circle"> 
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h5 class="card-title mb-1">Title : {{ $dpo->title }}</h5>
                                            <p class="text-muted mb-0">Author : {{ $dpo->author }}</p>
                                        </div>
                                    </div>
                                    <h6 class="mb-1">Year : {{ $dpo->year }}</h6>
                                    <p class="card-text text-muted">Description : {{ $dpo->description }}</p> 
                                </div> 
                                <div class="card ">
                                    <div class="card-header bg-secondary-subtle" >
                                        <h5 class="card-title mb-0 ">Add DPO</h5>
                                    </div>
                                    <div class="card-body bg-secondary-subtle pt-0">                                            
                                            <div class="row"> 
                                                <div class="col-12">
                                                    <div class="form-group mb-2">
                                                            <label for="title" class="form-label">DPO Type</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="dpotypes"  onchange="activity.dpotypes(this)">
                                                                    <option value="">Select</option>
                                                                    <option value="Component">Component</option>
                                                                    <option value="Score">Score</option>
                                                                    <option value="Documentation">Documentation</option>
                                                                </select>
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button" onclick="activity.modal()">&nbsp;<i class="  ri-add-line"></i></button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>                                    
                                            </div>   
                                            <!-- Default Modals --> 
                                             <x-documentation :id="$id"></x-documentation>                           
                                             <x-score :id="$id"></x-score>                           
                                             <x-components :id="$id"></x-components>                           
                                    </div> 
                                </div> 
                            </div>
                            <div class="col-7"> 
                                <div class="card"> 
                                    <div class="card-body">
                                        <table id="dop-table" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>DPO Type</th>
                                                    <th>Date</th> 
                                                    <th>Action</th>
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
    ClassicEditor
            .create( document.querySelector( '#ckeditor-classic' ) )
            .then( editor => {
                editorValue = editor;
            } )
            .catch( error => {
                    console.error( error );
            } );
   
    const doc_arr = [];
    const activity = {
        modal:function(){
            const dpotypes = document.getElementById('dpotypes').value;
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
           $('.dpo_parents').hide();
           $(`#${input.value}_parent`).show();
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
       },

       //component section Start
       documentation:function(){
            const doc = document.getElementById('Documentation').value; 
            if(doc !="")
            {
                console.log(doc_arr.includes(doc))
                if(!doc_arr.includes(doc))
                {  
                    doc_arr.push(doc) 
                }
                activity.list();            
            }
       },
       remove:function(element)
       {
        var index = doc_arr.indexOf(element);
        delete doc_arr.splice(index, 1)
        activity.list();     
       },
       list:function()
       {
        var html ='<table class="table table-bordered">';
        doc_arr.forEach(element => {
                    html +=`<tr><td>${element}</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fs-4 bx bx-link"></i></span>
                                        </div>
                                        <input type="hidden" name="document_name[]" value="${element}">
                                        <input type="url" class="form-control" placeholder="${element}" name="document_links[]">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="activity.remove('${element}')"><i class=" bx bx-trash"></i></button>
                                </td>
                            </tr>`;
                });
        $('#Documentation_response').html(html)
       }
       //component section end
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
                datatype:"",
                success:function(res)
                {
                    console.log($res)
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

