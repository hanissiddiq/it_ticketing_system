@extends('template.main')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Edit Department

        </div>

        <div class="card-body">

            <form
                action="{{ route('departments.update',$department) }}"
                method="POST">

                @method('PUT')

                @include('departments.form')

            </form>

        </div>

    </div>

</div>

@endsection