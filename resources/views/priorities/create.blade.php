@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Create Priority

        </div>

        <div class="card-body">

            <form
                action="{{ route('priorities.store') }}"
                method="POST">

                @include('priorities.form')

            </form>

        </div>

    </div>

</div>

@endsection