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
                        <!--end col-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-body bg-danger-subtle">
                                    <div class="d-flex mb-4 align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('public/images/img-5.jpg') }}" alt="" class="avatar-sm rounded-circle">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h5 class="card-title mb-1">Title : {{ $artwork->title }}</h5>
                                            <p class="text-muted mb-0">Author : {{ $artwork->author }}</p>
                                        </div>
                                        <!--href="\{\{ route('artwork.add',[encrypt($id),encrypt($dpo_id)])}}"-->
                                        <a class="btn btn-primary"  onclick="activity.dpotypes('dpo')">Add DPO</a>

                                        <!-- Default Modal -->
                                        <x-adddpo :id="$id"></x-adddpo>

                                    </div>
                                    <!--h6 class="mb-1">
                                    Year : \{\{ $artwork->year }}
                                    </h6-->
                                    <p class="card-text text-muted">Description : {{ $artwork->description }}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table id="dpo-table" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="10%">DPO N°</th>
                                                    <th width="8%">Year</th>
                                                    <th>Venue</th>
                                                    <th>City</th>
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
    const doc_arr = [];
    const activity = {
        modal:function(dpotypes){
            // const dpotypes = document.getElementById('dpotypes').value;

            $('#myModalLabel').text(dpotypes);
            $(`#${dpotypes}_modal`).modal('show');
            $('.select2').select2({
                dropdownParent: $(`#${dpotypes}_modal`)
            });
        },
        dpotypes:function(input){
            activity.modal(input)
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
                                .then((result) => $('#dpo-table').DataTable().ajax.reload());
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
                    url:form.attr("action"),
                    data: { _token:'{{ csrf_token() }}' , score:Content , artwork_id:artwork_id },//only input
                    datatype:"json",
                    success: function(response){
                        if(response.status)
                        {
                            Swal.fire({icon:"success",text:response.message,showCancelButton:!0,showConfirmButton:!1,cancelButtonClass:"btn btn-primary w-xs mb-1",cancelButtonText:"Close",buttonsStyling:!1,showCloseButton:!0})
                                .then((result) => $('#dpo-table').DataTable().ajax.reload());
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
                    $('#dpo-table').DataTable().ajax.reload()
                }
            })
        },
        list:function()
        {
            if ($.fn.DataTable.isDataTable("#dpo-table")) {
                $('#dpo-table').DataTable().clear().destroy();
            }
            //alert("Ciao");
            $('#dpo-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dpo.searchlist') }}",
                    type: 'POST',
                    data:{ _token:'{{ csrf_token() }}' , artwork_id:'{{ $id}}' }
                },
                columns: [
                    { data: 'id' , name:'second'},
                    { data: 'dpo_year' },
                    { data: 'dpo_venue' },
                    { data: 'dpo_city' },
                    { data: 'action', orderable: false },
                ],
                /*rowsGroup: [
                            'second:name',
                            0
                        ],*/
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
        html:'<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this DPO?</p></div></div>',
        showCancelButton:!0,
        confirmButtonClass:"btn btn-primary w-xs me-2 mb-1",
        confirmButtonText:"Yes, Delete It!",
        cancelButtonClass:"btn btn-danger w-xs mb-1",
        buttonsStyling:!1,
        showCloseButton:!0,
        focusCancel:!0
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'{{ route("dpo.deleteDPO") }}',
                method:"post",
                data:{_token:'{{ csrf_token() }}' , id:id},
                datatype:"json",
                success:function(response)
                {
                    Swal.fire({
                            icon:"success",
                            text:'One row deleted Successfully',
                            showCancelButton:!0,
                            showConfirmButton:!1,
                            cancelButtonClass:"btn btn-primary w-xs mb-1",
                            cancelButtonText:"Close",
                            buttonsStyling:!1,
                            showCloseButton:!0}).then((result) => $('#dpo-table').DataTable().ajax.reload())
                }
            })
        }
        })
}


</script>
@endsection

