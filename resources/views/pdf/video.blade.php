@extends('layouts.admin')
@section('title','Video')
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

            <h2>Video [ID: {{ $data->id }}]</h2>

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
                    <td class="label">Format</td>
                    <td class="value">{{ $data->format }}</td>
                </tr>

                <tr>
                    <td class="label">Type of Signal</td>
                    <td class="value">{{ $data->type_of_signal }}</td>
                </tr>

                <tr>
                    <td class="label">Title</td>
                    <td class="value">{{ $data->title }}</td>
                </tr>

                <tr>
                    <td class="label">Author</td>
                    <td class="value">{{ $data->author }}</td>
                </tr>

                <tr>
                    <td class="label">Year</td>
                    <td class="value">{{ $data->year }}</td>
                </tr>

                <tr>
                    <td class="label">Support Material</td>
                    <td class="value">{{ $data->support_material }}</td>
                </tr>

                <tr>
                    <td class="label">Color</td>
                    <td class="value">{{ $data->color }}</td>
                </tr>

                <tr>
                    <td class="label">Sound</td>
                    <td class="value">{{ $data->sound }}</td>
                </tr>

                <tr>
                    <td class="label">Audio Bit Depth</td>
                    <td class="value">{{ $data->abitdepth }}</td>
                </tr>

                <tr>
                    <td class="label">Frequency</td>
                    <td class="value">{{ $data->frequency }}</td>
                </tr>

                <tr>
                    <td class="label">Aspect Ratio</td>
                    <td class="value">{{ $data->ar }}</td>
                </tr>

                <tr>
                    <td class="label">Brand</td>
                    <td class="value">{{ $data->brand }}</td>
                </tr>

                <tr>
                    <td class="label">Carter Material</td>
                    <td class="value">{{ $data->carter_material }}</td>
                </tr>

                <tr>
                    <td class="label">Cover Material</td>
                    <td class="value">{{ $data->cover_material }}</td>
                </tr>

                <tr>
                    <td class="label">Standard</td>
                    <td class="value">{{ $data->standard }}</td>
                </tr>

                <tr>
                    <td class="label">FPS</td>
                    <td class="value">{{ $data->fps }}</td>
                </tr>

                <tr>
                    <td class="label">Resolution</td>
                    <td class="value">{{ $data->resolution }}</td>
                </tr>

                <tr>
                    <td class="label">Video Bit Depth</td>
                    <td class="value">{{ $data->vbitdepth }}</td>
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
