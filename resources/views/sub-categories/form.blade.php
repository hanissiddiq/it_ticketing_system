@csrf

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Category <span class="text-danger">*</span>
        </label>

        <select
            name="category_id"
            class="form-select @error('category_id') is-invalid @enderror"
            required>

            <option value="">-- Select Category --</option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $subCategory->category_id ?? '') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Code <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="code"
            maxlength="20"
            class="form-control @error('code') is-invalid @enderror"
            value="{{ old('code', $subCategory->code ?? '') }}"
            required>

        @error('code')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<div class="mb-3">

    <label class="form-label">
        Sub Category Name <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $subCategory->name ?? '') }}"
        required>

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label">
        Description
    </label>

    <textarea
        name="description"
        rows="4"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $subCategory->description ?? '') }}</textarea>

    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="form-check mb-4">

    <input
        class="form-check-input"
        type="checkbox"
        id="is_active"
        name="is_active"
        value="1"
        {{ old('is_active', $subCategory->is_active ?? true) ? 'checked' : '' }}>

    <label
        class="form-check-label"
        for="is_active">

        Active

    </label>

</div>

<div class="d-flex justify-content-between">

    <a
        href="{{ route('sub-categories.index') }}"
        class="btn btn-secondary">

        Back

    </a>

    <button
        class="btn btn-primary">

        Save

    </button>

</div>