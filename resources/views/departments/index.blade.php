@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Department</h3>

        <a href="{{ route('departments.create') }}"
           class="btn btn-primary">

            + Add Department

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead>

        <tr>

            <th width="80">Code</th>

            <th>Name</th>

            <th>Status</th>

            <th width="180">Action</th>

        </tr>

        </thead>

        <tbody>

        @forelse($departments as $department)

            <tr>

                <td>{{ $department->code }}</td>

                <td>{{ $department->name }}</td>

                <td>

                    @if($department->is_active)

                        <span class="badge bg-success">

                            Active

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Inactive

                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('departments.show',$department) }}"
                       class="btn btn-info btn-sm">

                        Detail

                    </a>

                    <a href="{{ route('departments.edit',$department) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('departments.destroy',$department) }}"
                        method="POST"
                        class="d-inline">

                        @csrf

                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this department?')"
                            class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4"
                    class="text-center">

                    No data available.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection