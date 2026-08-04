@extends('template.main')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <h4 class="mb-0">

                Edit Ticket

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('tickets.update',$ticket) }}"
                method="POST">

                @csrf

                @method('PUT')

                @include('tickets.form')

            </form>

        </div>

    </div>

</div>

@endsection
@push('scripts')
<script>
// const selectedSubCategory =
//     "{{ old('sub_category_id', $ticket->sub_category_id ?? '') }}";

//     document.addEventListener('DOMContentLoaded', function () {

//     let category = document.getElementById('category_id');

//     let subCategory = document.getElementById('sub_category_id');
    

//     category.addEventListener('change', function () {

//         subCategory.innerHTML =
//             '<option value="">Loading...</option>';

//         fetch(
//             '/sub-categories/by-category/' + this.value
//         )

//         .then(response => response.json())

//         .then(data => {

//             let html =
//                 '<option value="">-- Select Sub Category --</option>';

//             data.forEach(function(item){

//             let selected =
//                 item.id == selectedSubCategory
//                     ? 'selected'
//                     : '';

//             html += `
//                 <option value="${item.id}" ${selected}>
//                     ${item.name}
//                 </option>
//             `;

//         });

//             subCategory.innerHTML = html;

//         });

//     });

// }
// if (category.value !== '') {
//     category.dispatchEvent(new Event('change'));
// }
// );
</script>
@endpush