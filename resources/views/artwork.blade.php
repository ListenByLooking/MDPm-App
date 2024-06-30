@extends('layouts.admin') 
@section('title','Art Works')
@section('content')
<?php
$user = Auth::user();
?>
<style>
     .select2-container .select2-selection--single{ height: 38px;}
     .select2-container--default .select2-selection--single .select2-selection__arrow b{ top:60% }
    </style>
<div class="page-content">
                <div class="container-fluid"> 
                        <!--end col-->
                        <div class="row">
                            <div class="col-4"> 
                                    <div class="card mt-xxl-n5">
                                        <div class="card-header">
                                           <h5 class="card-title mb-0">Art Work</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                    <form method="post" id="artwork-add-form" action="{{ route('artwork.store') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row"> 
                                                            <div class="col-12">
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Title</label>
                                                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                                                </div>
                                                                <div class="form-group  mb-2">
                                                                    <label for="title" class="form-label">Description</label>
                                                                    <textarea class="form-control" name="description" rows="6"></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group  mb-2">
                                                                    <label for="year" class="form-label">Year</label>
                                                                    <select class="form-control select2" name="year">
                                                                        <option value="">Select</option>
                                                                        @for ($i=1947; $i <= date('Y'); $i++)
                                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="form-group  mb-2">
                                                                    <label for="Author" class="form-label">Author</label>
                                                                    <input type="text" class="form-control" name="author" placeholder="Author">
                                                                </div> 
                                                                <div class="form-group">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="submit" class="btn btn-success"><i class="bx bx-save"></i>&nbsp;Add Artworks</button> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end row-->
                                                    </form>
                                                </div> 
                                            </div>
                                        </div>
                                    </div> 
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    {{-- <div class="card-header">
                                        <h5 class="card-title mb-0">Art Work - List</h5>
                                    </div> --}}
                                    <div class="card-body">
                                        <table id="artwork-table" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Year</th>
                                                    <th>Author</th> 
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
                       
                        <!--end col-->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <div class="dpo" onclick="component()">
            <div id="Components">
                <p id="demo1"></p>
            </div>
            <div id="
            Documentation">
        
                <p id="demo2"></p>
            </div>
            <div id="Score">
                <p id="demo3"></p>
            </div>

            </div>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
@section('script')
<script> 
$(document).ready(function(){
    $('.select2').select2();
    $('#artwork-add-form').validate({
        rules:{
            title:{ required:true },
            description:{ required:true },
            year:{ required:true },
            author:{ required:true },
        },
        messages:{
            title:{ required:"Please enter title" },
            description:{ required:"Please enter description" },
            year:{ required:"Please select the year" },
            author:{ required:"Please enter author" },
        }
    })
})
    $('#artwork-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
             url: "{{ route('artwork.search') }}",
             type: 'POST',
             data:{ _token:'{{ csrf_token() }}'}
         },         
         columns: [
            { data: 'id' },
            { data: 'title' },
            { data: 'year' },
            { data: 'author' },
            { data: 'action' },
         ]
      });

function component(){
    document.getElementById('Components').innerHTML();
}

function remove(id)
{
    Swal.fire({ 
        html:'<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon><div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this Artworks ?</p></div></div>',
        showCancelButton:!0,
        confirmButtonClass:"btn btn-primary w-xs me-2 mb-1",
        confirmButtonText:"Yes, Delete It!",
        cancelButtonClass:"btn btn-danger w-xs mb-1",
        buttonsStyling:!1,
        showCloseButton:!0
    }).then((result) => { 
        if (result.isConfirmed) {
            $.ajax({
                url:'{{ route("artwork.delete") }}',
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
                            showCloseButton:!0})                     
                }
            })
        } 
        })
}

    
</script>
@endsection