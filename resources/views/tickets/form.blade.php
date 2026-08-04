@csrf

<div class="card shadow-sm">

    <div class="card-header">

        <h5 class="mb-0">

            Ticket Information

        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            {{-- Ticket Number --}}
            @isset($ticket)

            <div class="col-md-4 mb-3">

                <label class="form-label">

                    Ticket Number

                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $ticket->ticket_number }}"
                    readonly>

            </div>

            @endisset

            {{-- Subject --}}
            <div class="col-md-8 mb-3">

                <label class="form-label">

                    Subject
                </label>

                <input
                    type="text"
                    name="subject"
                    class="form-control @error('subject') is-invalid @enderror"
                    value="{{ old('subject',$ticket->subject ?? '') }}">

                @error('subject')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        {{-- Description --}}
        <div class="mb-3">

            <label class="form-label">

                Description

            </label>

            <textarea
                name="description"
                rows="6"
                class="form-control @error('description') is-invalid @enderror">{{ old('description',$ticket->description ?? '') }}</textarea>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="row">

            {{-- Department --}}
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
                            @selected(old('department_id',$ticket->department_id ?? '')==$department->id)>

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

            {{-- Priority --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Priority

                </label>

                <select
                    name="priority_id"
                    class="form-select @error('priority_id') is-invalid @enderror">

                    <option value="">
                        -- Select Priority --
                    </option>

                    @foreach($priorities as $priority)

                        <option
                            value="{{ $priority->id }}"
                            @selected(old('priority_id',$ticket->priority_id ?? '')==$priority->id)>

                            {{ $priority->name }}

                        </option>

                    @endforeach

                </select>

                @error('priority_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        <div class="row">

            {{-- Category --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Category

                </label>

                <select
                    name="category_id"
                    id="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">

                    <option value="">
                        -- Select Category --
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id',$ticket->category_id ?? '')==$category->id)>

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

            {{-- Sub Category --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Sub Category

                </label>

                <select id="sub_category_id"
                    name="sub_category_id"
                    class="form-select @error('sub_category_id') is-invalid @enderror">

                    <option value="">
                        -- Select Sub Category --
                    </option>

                    {{-- @foreach($subCategories as $subCategory)

                        <option
                            value="{{ $subCategory->id }}"
                            @selected(old('sub_category_id',$ticket->sub_category_id ?? '')==$subCategory->id)>

                            {{ $subCategory->name }}

                        </option>

                    @endforeach --}} sudah ambil dari ajax, jadi tidak perlu di foreach lagi, karena akan di load secara dinamis dari ajax

                </select>

                @error('sub_category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        <div class="row">

            {{-- Assign --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Assign To

                </label>

                <select
                    name="assigned_to"
                    class="form-select">

                    <option value="">
                        -- Not Assigned --
                    </option>

                    @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            @selected(old('assigned_to',$ticket->assigned_to ?? '')==$user->id)>

                            {{ $user->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- Due Date --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Due Date

                </label>

                <input
                    type="datetime-local"
                    name="due_at"
                    class="form-control"
                    value="{{ old('due_at',isset($ticket->due_at) ? $ticket->due_at->format('Y-m-d\TH:i') : '') }}">

            </div>

        </div>

        @isset($ticket)

        <div class="row">

            {{-- Status --}}
            <div class="col-md-6 mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select"
                    >

                    @foreach($statuses as $status)

                        <option
                            value="{{ $status }}"
                            @selected(old('status',$ticket->status)==$status)>

                            {{ str_replace('_',' ',$status) }}

                        </option>

                    @endforeach

                </select>


                {{-- <select
                    id="sub_category_id"
                    name="sub_category_id"
                    class="form-select @error('sub_category_id') is-invalid @enderror">

                    <option value="">
                        -- Select Sub Category --
                    </option>

                </select> --}}
            </div>

        </div>

        @endisset

    </div>

</div>

<div class="mt-4 d-flex justify-content-between">

    <a
        href="{{ route('tickets.index') }}"
        class="btn btn-secondary">

        Back

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        Save Ticket

    </button>

</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const category = document.getElementById('category_id');
    const subCategory = document.getElementById('sub_category_id');

    category.addEventListener('change', function () {

        const categoryId = this.value;

        subCategory.innerHTML =
            '<option value="">Loading...</option>';

        if (categoryId === '') {
            subCategory.innerHTML =
                '<option value="">-- Select Sub Category --</option>';
            return;
        }

        fetch('/sub-categories/by-category/' + categoryId)
            .then(response => response.json())
            .then(data => {

                let html =
                    '<option value="">-- Select Sub Category --</option>';

                data.forEach(item => {

                    html += `
                        <option value="${item.id}">
                            ${item.name}
                        </option>
                    `;

                });

                subCategory.innerHTML = html;

            })
            .catch(error => {

                console.error(error);

                subCategory.innerHTML =
                    '<option value="">Gagal Muat data sub-kategori</option>';

            });

    });

});

// Selected sub-category saat edit ticket

document.addEventListener('DOMContentLoaded', function () {

    const category = document.getElementById('category_id');
    const subCategory = document.getElementById('sub_category_id');

    const selectedSubCategory =
        "{{ old('sub_category_id', $ticket->sub_category_id ?? '') }}";

    function loadSubCategory(categoryId) {

        if (!categoryId) {
            subCategory.innerHTML =
                '<option value="">-- Select Sub Category --</option>';
            return;
        }

        fetch('/sub-categories/by-category/' + categoryId)
            .then(response => response.json())
            .then(data => {

                let html =
                    '<option value="">-- Select Sub Category --</option>';

                data.forEach(item => {

                    html += `
                        <option value="${item.id}"
                            ${selectedSubCategory == item.id ? 'selected' : ''}>
                            ${item.name}
                        </option>
                    `;

                });

                subCategory.innerHTML = html;

            });

    }

    category.addEventListener('change', function () {
        loadSubCategory(this.value);
    });

    if (category.value) {
        loadSubCategory(category.value);
    }

});

</script>

@endpush