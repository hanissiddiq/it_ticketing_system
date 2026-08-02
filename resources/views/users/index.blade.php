@extends('template.main')

@section('content')

<div class="container-fluid">

    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="mb-1">

                User Management

            </h3>

            <small class="text-muted">

                Manage system users

            </small>

        </div>

        @can('user.create')

        <a
            href="{{ route('users.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Add User

        </a>

        @endcan

    </div>

    {{-- Alert --}}

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- Search --}}

    <div class="card mb-3">

        <div class="card-body">

            <form method="GET">

                <div class="row">

                    <div class="col-md-10">

                        <input
                            type="text"
                            name="keyword"
                            class="form-control"
                            value="{{ request('keyword') }}"
                            placeholder="Search employee id, name, email, position...">

                    </div>

                    <div class="col-md-2 d-grid">

                        <button
                            class="btn btn-primary">

                            Search

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Table --}}

    <div class="card">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th width="60">

                        #

                    </th>

                    <th width="90">

                        Avatar

                    </th>

                    <th>

                        Employee

                    </th>

                    <th>

                        Department

                    </th>

                    <th>

                        Position

                    </th>

                    <th width="180">

                        Roles

                    </th>

                    <th width="90">

                        Status

                    </th>

                    <th width="220">

                        Action

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td class="text-center">

                            @if($user->avatar)

                                <img
                                    src="{{ asset('storage/'.$user->avatar) }}"
                                    class="rounded-circle"
                                    width="55"
                                    height="55"
                                    style="object-fit:cover;">

                            @else

                                <img
                                    src="{{ asset('images/default-user.png') }}"
                                    class="rounded-circle"
                                    width="55"
                                    height="55">

                            @endif

                        </td>

                        <td>

                            <strong>

                                {{ $user->name }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $user->employee_id }}

                            </small>

                            <br>

                            <small>

                                {{ $user->email }}

                            </small>

                        </td>

                        <td>

                            {{ $user->department?->name ?? '-' }}

                        </td>

                        <td>

                            {{ $user->position ?? '-' }}

                        </td>

                        <td>

                            @foreach($user->roles as $role)

                                <span class="badge bg-primary">

                                    {{ $role->name }}

                                </span>

                            @endforeach

                        </td>

                        <td>

                            @if($user->is_active)

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

                            @can('user.view')

                            <a
                                href="{{ route('users.show',$user) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                            @endcan

                            @can('user.update')

                            <a
                                href="{{ route('users.edit',$user) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            @endcan

                            @can('user.delete')

                            <form
                                action="{{ route('users.destroy',$user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this user ?')">

                                    Delete

                                </button>

                            </form>

                            @endcan

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center p-5">

                            <h5>

                                No users found

                            </h5>

                            <small class="text-muted">

                                Click Add User to create a new user.

                            </small>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer">

            

        </div>

    </div>

</div>

@endsection