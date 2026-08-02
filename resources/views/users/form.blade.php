@csrf

<div class="row">

    <div class="col-md-3">

        <div class="card">

            <div class="card-body text-center">

                @php
                    $avatar = old('avatar')
                        ? null
                        : ($user->avatar ?? null);
                @endphp

                <img
                    id="preview-image"
                    src="{{ $avatar ? asset('storage/'.$avatar) : asset('images/default-user.png') }}"
                    class="img-fluid rounded-circle border mb-3"
                    style="width:170px;height:170px;object-fit:cover;">

                <input
                    type="file"
                    name="avatar"
                    id="avatar"
                    class="form-control @error('avatar') is-invalid @enderror"
                    accept=".jpg,.jpeg,.png,.webp">

                @error('avatar')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror

                <small class="text-muted d-block mt-2">
                    JPG, PNG, WEBP
                    <br>
                    Maksimal 2 MB
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-9">

        <div class="card">

            <div class="card-header">

                <strong>User Information</strong>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Employee ID

                        </label>

                        <input
                            type="text"
                            name="employee_id"
                            class="form-control @error('employee_id') is-invalid @enderror"
                            value="{{ old('employee_id',$user->employee_id ?? '') }}">

                        @error('employee_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Full Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name',$user->name ?? '') }}">

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email',$user->email ?? '') }}">

                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Department

                        </label>

                        <select
                            name="department_id"
                            class="form-select @error('department_id') is-invalid @enderror">

                            <option value="">
                                -- Select Department --
                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    @selected(old('department_id',$user->department_id ?? '')==$department->id)>

                                    {{ $department->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('department_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Position

                        </label>

                        <input
                            type="text"
                            name="position"
                            class="form-control"
                            value="{{ old('position',$user->position ?? '') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Phone

                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone',$user->phone ?? '') }}">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror">

                        @if(isset($user))
                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti password.
                            </small>
                        @endif

                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Confirm Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Roles

                    </label>

                    <select
                        name="roles[]"
                        class="form-select @error('roles') is-invalid @enderror"
                        multiple
                        size="5">

                        @foreach($roles as $role)

                            <option
                                value="{{ $role->name }}"
                                @selected(
                                    collect(old('roles',
                                    isset($user)
                                        ? $user->roles->pluck('name')->toArray()
                                        : []))
                                    ->contains($role->name)
                                )>

                                {{ $role->name }}

                            </option>

                        @endforeach

                    </select>

                    @error('roles')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="form-check mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        value="1"
                        {{ old('is_active',$user->is_active ?? true) ? 'checked':'' }}>

                    <label
                        class="form-check-label"
                        for="is_active">

                        Active User

                    </label>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="mt-4 d-flex justify-content-between">

    <a
        href="{{ route('users.index') }}"
        class="btn btn-secondary">

        Back

    </a>

    <button
        class="btn btn-primary">

        Save User

    </button>

</div>

@push('scripts')

<script>

document
.getElementById('avatar')
.addEventListener('change',function(e){

    const file=e.target.files[0];

    if(file){

        document
        .getElementById('preview-image')
        .src=URL.createObjectURL(file);

    }

});

</script>

@endpush