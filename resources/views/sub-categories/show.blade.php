@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Detail Sub Category

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="200">

                        Category

                    </th>

                    <td>

                        {{ $subCategory->category->name }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Code

                    </th>

                    <td>

                        {{ $subCategory->code }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Name

                    </th>

                    <td>

                        {{ $subCategory->name }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Description

                    </th>

                    <td>

                        {{ $subCategory->description ?: '-' }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Status

                    </th>

                    <td>

                        @if($subCategory->is_active)

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

                        {{ $subCategory->created_at->format('d M Y H:i') }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Updated At

                    </th>

                    <td>

                        {{ $subCategory->updated_at->format('d M Y H:i') }}

                    </td>

                </tr>

            </table>

            <a
                href="{{ route('sub-categories.index') }}"
                class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection