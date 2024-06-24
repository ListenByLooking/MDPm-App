@extends('layouts.admin') 
@section('title','Art Works')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Open Tape Details</h2> 
        <table class="table table-border">
            <tr>
                <td>Preservation Signature</td>
                <td>{{ $tapedetails->preservation_signature }}</td>
                <td>Original Signature</td>
               <td>{{ $tapedetails->original_signature }}</td>
            </tr> 
            <tr>
                <td>Brand of Tape</td>
               <td>{{ $tapedetails->brand_of_tape }}</td>
                <td>Brand of Box</td>
               <td>{{ $tapedetails->brand_of_box }}</td>
            </tr>
            <tr>
                <td>Brand of Carter</td>
               <td>{{ $tapedetails->brand_of_carter }}</td>
                <td>Material of Carter</td>
               <td>{{ $tapedetails->material_of_carter }}</td>
            </tr>
            <tr>
                <td>Diameter of Carter
                </td>
               <td>{{ $tapedetails->diameter_of_carter }}</td>
                <td>Tape Width
                </td>
               <td>{{ $tapedetails->tape_width }}</td>
            </tr>
            <tr>
                <td>Number of Sides</td>
               <td>{{ $tapedetails->num_of_sides }}</td>
                <td>Number of Channels on SideA</td>
               <td>{{ $tapedetails->num_of_channels_sideA }}</td>
            </tr>
            <tr>
                <td>Channels Configuration (SideA)
                </td>
               <td>{{ $tapedetails->channels_config_sideA }}</td>
                <td>Speed (SideA)
                </td>
               <td>{{ $tapedetails->speed_sideA }}</td>
            </tr>
            <tr>
                <td>Number of Channels on SideB</td>
               <td>{{ $tapedetails->num_of_channels_sideB }}</td>
                <td>Channels Configuration (SideB)
                </td>
               <td>{{ $tapedetails->channels_config_sideB }}</td>
            </tr>
            <tr>
                <td>Speed (SideB)</td>
               <td>{{ $tapedetails->speed_sideB }}</td>
                <td>EQ
                </td>
               <td>{{ $tapedetails->eq }}</td>
            </tr>
            <tr>
                <td>Notes</td>
               <td>{{ $tapedetails->notes }}</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
@endsection