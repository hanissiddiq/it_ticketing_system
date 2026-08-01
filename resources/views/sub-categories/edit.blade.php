@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Edit Sub Category

        </div>

        <div class="card-body">

            <form
                action="{{ route('sub-categories.update',$subCategory) }}"
                method="POST">

                @method('PUT')

                @include('sub-categories.form')

            </form>

        </div>

    </div>

</div>

@endsection