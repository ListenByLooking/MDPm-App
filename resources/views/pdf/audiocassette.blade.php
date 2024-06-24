@extends('layouts.admin') 
@section('title','Art Works')
@section('content')
<style>
     td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid"> 
        <h2>Audio Cassette</h2>
        <table class="table table-border">
            <tr>
                <td>Preservation Signature</td>
                <td>{{ $audiocassette->preservation_signature}}</td>
                <td>Original Signature</td>
                <td>{{ $audiocassette->original_signature}}</td>
            </tr>  
            <tr>
                <td>Brand</td>
                <td>{{ $audiocassette->brand}}</td>
                <td>Brand of the Box
                </td>
                <td>{{ $audiocassette->brand_of_box}}</td>
            </tr> 
            <tr>
                <td>Cassette Type
                </td>
                <td>{{ $audiocassette->cassette_type}}</td>
                <td>Noise Reduction
                </td>
                <td>{{ $audiocassette->noise_reduction}}</td>
            </tr> 
            <tr>
                <td>Notes</td>
                <td>{{ $audiocassette->notes}}</td>  
                <td></td>  
                <td></td>  
            </tr>  
        </table>
    </div>
</div>
@endsection