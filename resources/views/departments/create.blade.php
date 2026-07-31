@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">

            Create Department

        </div>

        <div class="card-body">

            <form
                action="{{ route('departments.store') }}"
                method="POST">

                @include('departments.form')

            </form>

        </div>

    </div>

</div>

@endsection