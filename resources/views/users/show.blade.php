@extends('template.main')

@section('content')

<div class="container-fluid">

    <div class="row">

        <!-- ===========================
            PROFILE CARD
        ============================ -->

        <div class="col-lg-4">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    @if($user->avatar)

                        <img
                            src="{{ asset('storage/'.$user->avatar) }}"
                            class="rounded-circle border shadow"
                            width="180"
                            height="180"
                            style="object-fit:cover;">

                    @else

                        <img
                            src="{{ asset('images/default-user.png') }}"
                            class="rounded-circle border shadow"
                            width="180"
                            height="180">

                    @endif

                    <h3 class="mt-3 mb-0">

                        {{ $user->name }}

                    </h3>

                    <p class="text-muted">

                        {{ $user->position ?: '-' }}

                    </p>

                    @if($user->is_active)

                        <span class="badge bg-success">

                            Active

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Inactive

                        </span>

                    @endif

                    <hr>

                    <div class="text-start">

                        <strong>

                            Roles

                        </strong>

                        <br><br>

                        @forelse($user->roles as $role)

                            <span class="badge bg-primary mb-1">

                                {{ $role->name }}

                            </span>

                        @empty

                            <span class="text-muted">

                                No Role Assigned

                            </span>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

        <!-- ===========================
            DETAIL
        ============================ -->

        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-header">

                    <h5 class="mb-0">

                        User Information

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>

                            <th width="250">

                                Employee ID

                            </th>

                            <td>

                                {{ $user->employee_id ?: '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Full Name

                            </th>

                            <td>

                                {{ $user->name }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Email

                            </th>

                            <td>

                                {{ $user->email }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Department

                            </th>

                            <td>

                                {{ $user->department?->name ?: '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Position

                            </th>

                            <td>

                                {{ $user->position ?: '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Phone

                            </th>

                            <td>

                                {{ $user->phone ?: '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Email Verified

                            </th>

                            <td>

                                @if($user->email_verified_at)

                                    <span class="badge bg-success">

                                        Verified

                                    </span>

                                    <br>

                                    {{ $user->email_verified_at->format('d M Y H:i') }}

                                @else

                                    <span class="badge bg-danger">

                                        Not Verified

                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Created At

                            </th>

                            <td>

                                {{ $user->created_at->format('d F Y H:i') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Updated At

                            </th>

                            <td>

                                {{ $user->updated_at->format('d F Y H:i') }}

                            </td>

                        </tr>

                    </table>

                </div>

                <div class="card-footer">

                    <a
                        href="{{ route('users.index') }}"
                        class="btn btn-secondary">

                        Back

                    </a>

                    @can('user.update')

                    <a
                        href="{{ route('users.edit',$user) }}"
                        class="btn btn-warning">

                        Edit User

                    </a>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</div>

@endsection