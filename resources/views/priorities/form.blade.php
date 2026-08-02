@csrf

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Code <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="code"
            maxlength="10"
            class="form-control @error('code') is-invalid @enderror"
            value="{{ old('code', $priority->code ?? '') }}"
            required>

        @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-8 mb-3">

        <label class="form-label">
            Priority Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $priority->name ?? '') }}"
            required>

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Color
        </label>

        <input
            type="color"
            name="color"
            class="form-control form-control-color"
            value="{{ old('color', $priority->color ?? '#0d6efd') }}">

    </div>

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Response SLA (Minutes)
        </label>

        <input
            type="number"
            min="1"
            name="response_time"
            class="form-control @error('response_time') is-invalid @enderror"
            value="{{ old('response_time', $priority->response_time ?? '') }}"
            required>

        @error('response_time')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Resolution SLA (Minutes)
        </label>

        <input
            type="number"
            min="1"
            name="resolution_time"
            class="form-control @error('resolution_time') is-invalid @enderror"
            value="{{ old('resolution_time', $priority->resolution_time ?? '') }}"
            required>

        @error('resolution_time')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<div class="form-check mb-4">

    <input
        type="checkbox"
        class="form-check-input"
        id="is_active"
        name="is_active"
        value="1"
        {{ old('is_active', $priority->is_active ?? true) ? 'checked' : '' }}>

    <label
        class="form-check-label"
        for="is_active">

        Active

    </label>

</div>

<div class="d-flex justify-content-between">

    <a
        href="{{ route('priorities.index') }}"
        class="btn btn-secondary">

        Back

    </a>

    <button
        class="btn btn-primary">

        Save

    </button>

</div>