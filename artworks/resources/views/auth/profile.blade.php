@extends('layouts.admin') 
@section('title','Profile')
@section('content')
<div class="page-content">
                <div class="container-fluid"> 
                        <!--end col-->
                        <div class="col-xxl-9">
                            <div class="card mt-xxl-n5">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                                <i class="fas fa-home"></i> <h5 class="card-title mb-0">My Profile</h5>
                                            </a>
                                        </li> 
                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-4">
                                                        <center><img height="250" width="80%" id="imagePreview" class="rounded-circle" src="{{ asset($user->image?'public/images/'.$user->image:'assets/images/users/avatar-1.jpg') }}" alt="Header Avatar" style=""></center>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="firstnameInput" class="form-label">First Name</label>
                                                                    <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your firstname" name="first_name" value="{{ $user->name }}">
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="lastnameInput" class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control" id="lastnameInput" placeholder="Enter your lastname" name="last_name" value="{{ $user->last_name }}">
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" name="phone" value="{{ $user->phone_number }}">
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="emailInput" class="form-label">Email Address</label>
                                                                    <input type="email" readonly class="form-control" id="emailInput" placeholder="Enter your email" name="email" value="{{ $user->email }}">
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Image</label>
                                                                    <input type="file"  id="image" name="image" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="JoiningdatInput" class="form-label">Password</label>
                                                                    <input type="text" class="form-control" name="password"  placeholder="Password">
                                                                </div>
                                                            </div> 
                                                            <div class="col-lg-12">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="submit" class="btn btn-primary">Updates</button>
                                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
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
                        <!--end col-->
                    </div>
                </div>
                <!-- container-fluid -->
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

