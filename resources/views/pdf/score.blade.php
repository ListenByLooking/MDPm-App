@extends('layouts.admin') 
@section('title','Art Works')
@section('content')
<style>
    td:nth-child(odd){ font-weight: 900; width: 20% }
</style>
<div class="page-content">
    <div class="container-fluid">
        <table class="table table-border">
            <tr>
                <td><h2>Score</h2>{!! $score->message !!}</td> 
            </tr>  
        </table>
    </div>
</div> 
@endsection