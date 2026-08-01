@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Department Detail

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="200">

                        Code

                    </th>

                    <td>

                        {{ $department->code }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Name

                    </th>

                    <td>

                        {{ $department->name }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Description

                    </th>

                    <td>

                        {{ $department->description ?: '-' }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Status

                    </th>

                    <td>

                        @if($department->is_active)

                            Active

                        @else

                            Inactive

                        @endif

                    </td>

                </tr>

            </table>

            <a href="{{ route('departments.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection