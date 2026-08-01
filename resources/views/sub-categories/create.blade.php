@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Create Sub Category

        </div>

        <div class="card-body">

            <form
                action="{{ route('sub-categories.store') }}"
                method="POST">

                @include('sub-categories.form')

            </form>

        </div>

    </div>

</div>

@endsection