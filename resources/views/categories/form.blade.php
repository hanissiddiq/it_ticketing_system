@csrf

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Category Code
        </label>

        <input
            type="text"
            name="code"
            class="form-control @error('code') is-invalid @enderror"
            value="{{ old('code', $category->code ?? '') }}"
            maxlength="20"
            required>

        @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $category->name ?? '') }}"
            required>

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
            Icon
        </label>

        <input
            type="text"
            name="icon"
            class="form-control"
            value="{{ old('icon', $category->icon ?? '') }}"
            placeholder="fa-laptop">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Color
        </label>

        <input
            type="color"
            name="color"
            class="form-control form-control-color"
            value="{{ old('color', $category->color ?? '#0d6efd') }}">

    </div>

</div>

<div class="mb-3">

    <label class="form-label">

        Description

    </label>

    <textarea
        name="description"
        rows="4"
        class="form-control">{{ old('description', $category->description ?? '') }}</textarea>

</div>

<div class="form-check mb-4">

    <input
        class="form-check-input"
        type="checkbox"
        value="1"
        id="is_active"
        name="is_active"
        {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>

    <label
        class="form-check-label"
        for="is_active">

        Active

    </label>

</div>

<div class="d-flex justify-content-between">

    <a
        href="{{ route('categories.index') }}"
        class="btn btn-secondary">

        Back

    </a>

    <button class="btn btn-primary">

        Save

    </button>

</div>