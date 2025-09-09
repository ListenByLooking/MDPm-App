@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Digital Copy</h2>
        <table class="table table-border">
            <tr>
                <td>Signature</td>
                <td>{{ $digital_copy->signature }}</td>
                <td>Format</td>
                <td>{{ $digital_copy->format }}</td>
            </tr>
            <tr>
                <td>Original Item</td>
                <td>{{ $digital_copy->original_item }}</td>
                <td>Codec</td>
                <td>{{ $digital_copy->codec }}</td>
            </tr>
            <tr>
                <td>Bitrate</td>
                <td>{{ $digital_copy->bitrate }}</td>
                <td>Bitdepth (Audio)</td>
                <td>{{ $digital_copy->bitdepth_audio }}</td>
            </tr>
            <tr>
                <td>Bitdepth (Video)</td>
                <td>{{ $digital_copy->bitdepth_video }}</td>
                <td>Resolution</td>
                <td>{{ $digital_copy->resolution }}</td>
            </tr>
            <tr>
                <td>Aspect Ratio</td>
                <td>{{ $digital_copy->aspect_ratio }}</td>
                <td>Frame Rate</td>
                <td>{{ $digital_copy->frame_rate }}</td>
            </tr>
            <tr>
                <td>Sample Frequency</td>
                <td>{{ $digital_copy->sample_frequency }}</td>
                <td>Acquisition Device</td>
                <td>{{ $digital_copy->acquisition_device }}</td>
            </tr>
            <tr>
                <td>Notes</td>
                <td>{{ $digital_copy->notes }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
