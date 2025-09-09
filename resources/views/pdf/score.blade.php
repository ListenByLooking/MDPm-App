@extends('layouts.admin')
@section('title','ArtWorks')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <table class="table table-border">
            <tr>
                <td style="font-weight: var(--vz-body-font-weight)"><h2>Score</h2><hr>{!! $result->message !!}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
