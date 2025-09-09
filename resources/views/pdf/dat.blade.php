@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Dat</h2>
        <table class="table table-border">
            <tr>
                <td>Preservation Signature</td>
                <td>{{ $dat->preservation_signature }}</td>
                <td>Original Signature</td>
                <td>{{ $dat->original_signature }}</td>
            </tr>
            <tr>
                <td>Brand</td>
                <td>{{ $dat->brand }}</td>
                <td>Brand of the Box</td>
                <td>{{ $dat->brand_of_box }}</td>
            </tr>
            <tr>
                <td>Samplerate</td>
                <td>{{ $dat->samplerate }}</td>
                <td>Notes</td>
                <td>{{ $dat->notes }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
