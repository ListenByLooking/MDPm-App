@extends('layouts.admin')
@section('title','Audio Cassette')
@section('content')

    <style>
        table.object-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        table.object-table td {
            padding: 10px 15px;
            border: 1px solid #ccc;
            vertical-align: top;
            word-wrap: break-word;
        }

        /* Label column auto-sizes to longest text */
        table.object-table td.label {
            font-weight: 700;
            text-align: right;
            white-space: nowrap; /* prevents wrapping */
            padding-right: 20px;
            background: #f7f7f7;
        }

        table.object-table td.value {
            text-align: left;
            width: 100%;
            white-space: normal; /* allows wrapping */
        }

        h2 {
            margin-bottom: 20px;
            font-weight: 800;
        }
    </style>

    <div class="page-content">
        <div class="container-fluid">

            <h2>Audio Cassette [ID: {{ $data->id }}]</h2>

            <table class="object-table">
                <tr>
                    <td class="label">Preservation Signature</td>
                    <td class="value">{{ $data->preservation_signature }}</td>
                </tr>

                <tr>
                    <td class="label">Original Signature</td>
                    <td class="value">{{ $data->original_signature }}</td>
                </tr>

                <tr>
                    <td class="label">Brand</td>
                    <td class="value">{{ $data->brand }}</td>
                </tr>

                <tr>
                    <td class="label">Brand of Box</td>
                    <td class="value">{{ $data->brand_of_box }}</td>
                </tr>

                <tr>
                    <td class="label">Cassette Type</td>
                    <td class="value">{{ $data->cassette_type }}</td>
                </tr>

                <tr>
                    <td class="label">Noise Reduction</td>
                    <td class="value">{{ $data->noise_reduction }}</td>
                </tr>

                <tr>
                    <td class="label">Notes</td>
                    <td class="value">{{ $data->notes }}</td>
                </tr>

                <!--tr>
                    <td class="label">Status</td>
                    <td class="value">{{ $data->status }}</td>
                </tr-->

                <tr>
                    <td class="label">Created At</td>
                    <td class="value">{{ $data->created_at }}</td>
                </tr>
            </table>

        </div>
    </div>

@endsection
