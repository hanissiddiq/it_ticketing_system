@csrf

<div class="mb-3">
    <label class="form-label">Department Code <span class="text-danger">*</span></label>
    <input
        type="text"
        name="code"
        class="form-control @error('code') is-invalid @enderror"
        value="{{ old('code', $department->code ?? '') }}"
        maxlength="20"
        required>

    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Department Name <span class="text-danger">*</span></label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $department->name ?? '') }}"
        required>

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>

    <textarea
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $department->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-check mb-4">
    <input
        class="form-check-input"
        type="checkbox"
        value="1"
        name="is_active"
        id="is_active"
        {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>

    <label class="form-check-label" for="is_active">
        Active
    </label>
</div>

<div class="d-flex justify-content-between">
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
        Back
    </a>

    <button class="btn btn-primary">
        Save
    </button>
</div>