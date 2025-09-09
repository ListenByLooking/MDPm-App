@extends('layouts.admin')
@section('title','ArtWorks')
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
                                    <div class="card mt-xxl-n5" style="margin-top: 0rem!important">
                                        <div class="card-header">
                                           <h5 class="card-title mb-0">Add User</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                @if (session('message'))
                                                    <div class="alert alert-{{ session('status')==true?'success':'danger'}}">
                                                        {{ session('message') }}
                                                    </div>
                                                @endif
                                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                    <form method="post" id="user-add-form" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">First Name</label>
                                                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}" placeholder="First Name">

                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}" placeholder="Last Name">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Email</label>
                                                                    <input type="text" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email">
                                                                    @if ($errors->has('email'))
                                                                        <div class="error">{{ $errors->first('email') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Phone</label>
                                                                    <input type="text" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Phone">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image" placeholder="Title">
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <label for="title" class="form-label">Password</label>
                                                                    <input type="password" class="form-control" name="password" placeholder="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="submit" class="btn btn-success"><i class="bx bx-save"></i>&nbsp;Add User</button>
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
                                        <h5 class="card-title mb-0">ArtWork - List</h5>
                                    </div> --}}
                                    <div class="card-body">
                                        <table id="user-table" class="table table-bordered dt-responsive nowrap align-middle mdl-data-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>First Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
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

            </div>

            <div class="modal" id="user_modal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit User</h5>
                      <a href="javascript:;"  class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fs-24">&times;</span>
                      </a>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="user-update-form" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name')}}" placeholder="First Name">

                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name')}}" placeholder="Last Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone')}}" placeholder="Phone">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Title">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="title" class="form-label">Password</label>
                                        <input type="password" class="form-control"   name="password" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-success"><i class="bx bx-save"></i>&nbsp;Update User</button>
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
@endsection
@section('script')
<script>
$(document).ready(function(){
    $('.select2').select2();
    $('#user-add-form').validate({
        rules:{
            first_name:{ required:true },
            last_name:{ required:true },
            email:{ required:true , email:true },
            phone:{ required:true,number:true },
            image:{  accept: "jpg,jpeg,png,gif"  },
            password:{ required:true , minlength:8}
        },
        messages:{
            first_name:{ required:"Please enter First Name" },
            last_name:{ required:"Please enter Last Name" },
            email:{ required:"Please enter Email" },
            phone:{ required:"Please enter Phone Number" },
            password:{ required:"Please enter Password" },
        }
    })
    $('#user-update-form').validate({
        rules:{
            first_name:{ required:true },
            last_name:{ required:true },
            email:{ required:true , email:true },
            phone:{ required:true,number:true },
            image:{  accept: "jpg,jpeg,png,gif"  },
            password:{ required:true , minlength:8}
        },
        messages:{
            first_name:{ required:"Please enter First Name" },
            last_name:{ required:"Please enter Last Name" },
            email:{ required:"Please enter Email" },
            phone:{ required:"Please enter Phone Number" },
            password:{ required:"Please enter Password" },
        }
    })
})

function table()
{

    $('#user-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
             url: "{{ route('user.search') }}",
             type: 'POST',
             data:{ _token:'{{ csrf_token() }}'}
         },
         columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'action' },
         ]
      });
}
table();

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
                url:'{{ route("user.delete") }}',
                method:"post",
                data:{_token:'{{ csrf_token() }}' , id:id},
                datatype:"json",
                success:function(response)
                {
                      if ($.fn.DataTable.isDataTable("#user-table")) {
                                $('#user-table').DataTable().clear().destroy();
                                table();
                            }
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
function func_edit(id)
{
    $.ajax({
                url:'{{ route("user.edit") }}',
                method:"post",
                data:{_token:'{{ csrf_token() }}' , id:id},
                datatype:"json",
                success:function(response)
                {
                    if(response.status)
                    {
                        $('#first_name').val(response.user.name);
                        $('#last_name').val(response.user.last_name);
                        $('#phone').val(response.user.phone_number);
                        $('#email').val(response.user.email);
                        $('#id').val(id)
                    }
                }
            })
}

</script>
@endsection
