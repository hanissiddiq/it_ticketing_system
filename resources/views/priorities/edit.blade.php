@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Edit Priority

        </div>

        <div class="card-body">

            <form
                action="{{ route('priorities.update',$priority) }}"
                method="POST">

                @method('PUT')

                @include('priorities.form')

            </form>

        </div>

    </div>

</div>

@endsection