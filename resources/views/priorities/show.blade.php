@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Priority Detail

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="250">

                        Code

                    </th>

                    <td>

                        {{ $priority->code }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Priority Name

                    </th>

                    <td>

                        {{ $priority->name }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Color

                    </th>

                    <td>

                        <span
                            class="badge"
                            style="background:{{ $priority->color }}">

                            {{ $priority->color }}

                        </span>

                    </td>

                </tr>

                <tr>

                    <th>

                        Response SLA

                    </th>

                    <td>

                        {{ $priority->response_time }} Minutes

                    </td>

                </tr>

                <tr>

                    <th>

                        Resolution SLA

                    </th>

                    <td>

                        {{ $priority->resolution_time }} Minutes

                    </td>

                </tr>

                <tr>

                    <th>

                        Status

                    </th>

                    <td>

                        @if($priority->is_active)

                            <span class="badge bg-success">

                                Active

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Inactive

                            </span>

                        @endif

                    </td>

                </tr>

                <tr>

                    <th>

                        Created At

                    </th>

                    <td>

                        {{ $priority->created_at->format('d M Y H:i') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Updated At

                    </th>

                    <td>

                        {{ $priority->updated_at->format('d M Y H:i') }}

                    </td>

                </tr>

            </table>

            <a
                href="{{ route('priorities.index') }}"
                class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection