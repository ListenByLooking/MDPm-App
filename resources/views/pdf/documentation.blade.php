@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <h2>Documentation</h2>
        <table class="table table-border">
            <tr>
                <td>
                    <table class="table table-bordered mb-0">

                    @foreach ($result as $doc )
                            <tr style="width: 1%; white-space: nowrap;"><td style="text-align: center; width: 1%; white-space: nowrap;">{{ $doc->id}}</td><td style="text-align: center; width: 1%; white-space: nowrap;">{{ $doc->document_type}}</td><td style="font-weight: var(--vz-body-font-weight)"><a href="{{ $doc->document_url}}">{{ $doc->document_url}}</a></td></tr>
                    @endforeach
                    </table>

                </td>

            </tr>
        </table>
    </div>
</div>
@endsection
