@extends('layouts.admin')
@section('title','Digital Copy Audio')
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

            <h2>Digital Copy (Audio) [ID: {{ $data->id }}]</h2>

            <table class="object-table">
                <tr>
                    <td class="label">Filename</td>
                    <td class="value">{{ $data->filename }}</td>
                </tr>

                <tr>
                    <td class="label">Container</td>
                    <td class="value">{{ $data->container }}</td>
                </tr>

                <tr>
                    <td class="label">Encoding</td>
                    <td class="value">{{ $data->encoding }}</td>
                </tr>

                <tr>
                    <td class="label">Original Type</td>
                    <td class="value">{{ $data->original_type }}</td>
                </tr>

                <tr>
                    <td class="label">ID Original</td>
                    <td class="value">{{ $data->id_original }}</td>
                </tr>

                <tr>
                    <td class="label">Bitrate</td>
                    <td class="value">{{ $data->bitrate }}</td>
                </tr>

                <tr>
                    <td class="label">Bit Depth</td>
                    <td class="value">{{ $data->bitdepth }}</td>
                </tr>

                <tr>
                    <td class="label">Duration (seconds)</td>
                    <td class="value">{{ $data->duration }}</td>
                </tr>

                <tr>
                    <td class="label">Channel Configuration</td>
                    <td class="value">{{ $data->channel_config }}</td>
                </tr>

                <tr>
                    <td class="label">Checksum</td>
                    <td class="value">{{ $data->checksum }}</td>
                </tr>

                <tr>
                    <td class="label">Frequency</td>
                    <td class="value">{{ $data->frequency }}</td>
                </tr>

                <tr>
                    <td class="label">Filesize (bytes)</td>
                    <td class="value">{{ $data->filesize }}</td>
                </tr>

                <tr>
                    <td class="label">Acquisition Device</td>
                    <td class="value">{{ $data->acquisition_device }}</td>
                </tr>

                <tr>
                    <td class="label">Media</td>
                    <td class="value">{{ $data->media }}</td>
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
