@extends('template.main')


@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Edit Category

        </div>

        <div class="card-body">

            <form
                action="{{ route('categories.update',$category) }}"
                method="POST">

                @method('PUT')

                @include('categories.form')

            </form>

        </div>

    </div>

</div>

@endsection