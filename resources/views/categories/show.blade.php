@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Category Detail

        </div>

        <div class="card-body">

            <table class="table">

                <tr>

                    <th width="200">

                        Code

                    </th>

                    <td>

                        {{ $category->code }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Name

                    </th>

                    <td>

                        {{ $category->name }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Icon

                    </th>

                    <td>

                        <i class="{{ $category->icon }}"></i>

                        {{ $category->icon }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Color

                    </th>

                    <td>

                        <span
                            class="badge"
                            style="background: {{ $category->color }}">

                            {{ $category->color }}

                        </span>

                    </td>

                </tr>

                <tr>

                    <th>

                        Description

                    </th>

                    <td>

                        {{ $category->description ?: '-' }}

                    </td>

                </tr>

                <tr>

                    <th>

                        Status

                    </th>

                    <td>

                        @if($category->is_active)

                            Active

                        @else

                            Inactive

                        @endif

                    </td>

                </tr>

            </table>

            <a
                href="{{ route('categories.index') }}"
                class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>

</div>

@endsection