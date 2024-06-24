@extends('layouts.admin') 
@section('title','Art Works')
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
                    <table class="table table-bordered">
                    @foreach ($documentation as $doc )
                    <tr><td>{{ $doc->document_type}}</td><td>{{ $doc->document_url}}</td></tr>
                    @endforeach
                    </table>
                    
                </td>
                
            </tr> 
        </table>  
    </div>
</div>
@endsection