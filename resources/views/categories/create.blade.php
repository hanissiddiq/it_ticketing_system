@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Create Category

        </div>

        <div class="card-body">

            <form
                action="{{ route('categories.store') }}"
                method="POST">

                @include('categories.form')

            </form>

        </div>

    </div>

</div>

@endsection