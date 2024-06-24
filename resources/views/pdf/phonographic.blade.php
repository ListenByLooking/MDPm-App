@extends('layouts.admin') 
@section('title','Art Works')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Phonographicdisks</h2> 
        <table class="table table-border">
            <tr>
                <td>Preservation Signature</td>
                <td>{{ $phonographicdisks->preservation_signature}}</td>
                <td>Original Signature</td>
                <td>{{ $phonographicdisks->original_signature}}</td>
            </tr>  
            <tr>
                <td>Brand</td>
                <td>{{ $phonographicdisks->brand}}</td>
                <td>Brand of the Box</td>
                <td>{{ $phonographicdisks->brand_of_box}}</td>
            </tr>
            <tr>
                <td>RPM</td>
                <td>{{ $phonographicdisks->rpm}}</td>
                <td>Stylus</td>
                <td>{{ $phonographicdisks->stylus}}</td>
            </tr> 
            <tr>
                <td>EQ</td>
                <td>{{ $phonographicdisks->eq}}</td>
                <td>Type of Recording</td>
                <td>{{ $phonographicdisks->type_of_recording}}</td>
            </tr> 
            <tr>
                <td>Incisions</td>
                <td>{{ $phonographicdisks->incisions}}</td>
                <td>Notes</td>
                <td>{{ $phonographicdisks->notes}}</td>
            </tr> 
        </table>
    </div>
</div>
@endsection