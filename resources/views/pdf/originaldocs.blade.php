@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Original Docs</h2>
            <table class="table table-border">
                <tr>
                    <td>Preservation Signature</td>
                    <td>{{ $original_docs->preservation_signature }}</td>
                    <td>Original Signature</td>
                    <td>{{ $original_docs->original_signature }}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{ $original_docs->type }}</td>
                    <td>Format</td>
                    <td>{{ $original_docs->format }}</td>
                </tr>
                <tr>
                    <td>Generation</td>
                    <td>{{ $original_docs->generation }}</td>
                    <td>Title</td>
                    <td>{{ $original_docs->title }}</td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>{{ $original_docs->author }}</td>
                    <td>Year</td>
                    <td>{{ $original_docs->year }}</td>
                </tr>
                <tr>
                    <td>Support Material</td>
                    <td>{{ $original_docs->support_material }}</td>
                    <td>Color/BW</td>
                    <td>{{ $original_docs->color_bw }}</td>
                </tr>
                <tr>
                    <td>Sound</td>
                    <td>{{ $original_docs->sound }}</td>
                    <td>Aspect Ratio</td>
                    <td>{{ $original_docs->aspect_ratio }}</td>
                </tr>
                <tr>
                    <td>Film Brand</td>
                    <td>{{ $original_docs->film_brand }}</td>
                    <td>Carter Brand</td>
                    <td>{{ $original_docs->carter_brand }}</td>
                </tr>
                <tr>
                    <td>Carter Material</td>
                    <td>{{ $original_docs->carter_material }}</td>
                    <td>Cover Material</td>
                    <td>{{ $original_docs->cover_material }}</td>
                </tr>
                <tr>
                    <td>Cement Splices</td>
                    <td>{{ $original_docs->cement_splices }}</td>
                    <td>Restored CS</td>
                    <td>{{ $original_docs->restored_cs }}</td>
                </tr>
                <tr>
                    <td>Tape Splices</td>
                    <td>{{ $original_docs->tape_splices }}</td>
                    <td>Restored TS</td>
                    <td>{{ $original_docs->restored_ts }}</td>
                </tr>
                <tr>
                    <td>Restored Perforations</td>
                    <td>{{ $original_docs->restored_perforations }}</td>
                    <td>Restored Frames</td>
                    <td>{{ $original_docs->restored_frames }}</td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>{{ $original_docs->notes }}</td>
                </tr>
            </table>
    </div>
</div>
@endsection
