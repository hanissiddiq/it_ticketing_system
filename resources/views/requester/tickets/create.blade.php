@extends('template.main')

@section('title','Create Ticket')

@section('content')

<div class="container-fluid">

    <form
        action="{{ route('requester.tickets.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="card">

            <div class="card-header">

                <strong>Create New Ticket</strong>

            </div>

            <div class="card-body">

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

                                Choose Department

                            </option>

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    @selected(old('department_id')==$department->id)>

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

                                Choose Priority

                            </option>

                            @foreach($priorities as $priority)

                                <option
                                    value="{{ $priority->id }}"
                                    @selected(old('priority_id')==$priority->id)>

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

                    {{-- Category --}}

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Category

                        </label>

                        <select
                            id="category"
                            name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">

                            <option value="">

                                Choose Category

                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('category_id')==$category->id)>

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

                        <select
                            id="sub_category"
                            name="sub_category_id"
                            class="form-select @error('sub_category_id') is-invalid @enderror">

                            <option value="">

                                Choose Sub Category

                            </option>

                        </select>

                        @error('sub_category_id')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Subject --}}

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Subject

                        </label>

                        <input
                            type="text"
                            name="subject"
                            class="form-control @error('subject') is-invalid @enderror"
                            value="{{ old('subject') }}">

                        @error('subject')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Description --}}

                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Description

                        </label>

                        <textarea
                            rows="6"
                            name="description"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    {{-- Attachment --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Attachment

                        </label>

                        <input type="file"
                            name="attachments[]"
                            multiple
                            class="form-control">

                        <small class="text-muted">

                            Allowed:
                            PDF,
                            DOC,
                            DOCX,
                            XLS,
                            XLSX,
                            JPG,
                            PNG,
                            ZIP

                            (Max 5 MB / file)

                        </small>

                    </div>

                </div>

            </div>

            <div class="card-footer text-end">

                <a
                    href="{{ route('requester.tickets.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

                <button
                    class="btn btn-primary">

                    Submit Ticket

                </button>

            </div>

        </div>

    </form>

</div>

@endsection

@push('scripts')
<script>

document
.getElementById('category')
.addEventListener('change', function(){

    let categoryId = this.value;

    let subCategory = document.getElementById('sub_category');

    subCategory.innerHTML =
        '<option value="">Loading...</option>';

    fetch('/sub-categories/by-category/' + categoryId)

    .then(response => response.json())

    .then(data => {

        subCategory.innerHTML =
            '<option value="">Choose Sub Category</option>';

        data.forEach(function(item){

            subCategory.innerHTML +=

                `<option value="${item.id}">${item.name}</option>`;

        });

    });

});

</script>
@endpush