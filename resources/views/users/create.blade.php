@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            <h4 class="mb-0">

                Create User

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('users.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @include('users.form')

            </form>

        </div>

    </div>

</div>

@endsection