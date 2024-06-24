@extends('layouts.admin') 
@section('content')
<?php
    $time = date("H"); 
    $timezone = date("e"); 
    if ($time < "12") {
        $fs_text = "Good Morning";
    } else 
    if ($time >= "12" && $time < "17") {
        $fs_text = "Good Afternoon";
    } else 
    if ($time >= "17" && $time < "19") {
        $fs_text = "Good Evening";
    } else 
    if ($time >= "19") {
        $fs_text = "Good Night";
    }

?>
<div class="page-content">
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">{{ $fs_text }}, {{ Auth::user()->name }}!</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your account.</p>
                                            </div> 
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row--> 

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->

                        
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
@endsection
