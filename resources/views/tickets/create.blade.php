@extends('template.main')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header">

            <h4 class="mb-0">

                Create Ticket

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('tickets.store') }}"
                method="POST">

                @include('tickets.form')

            </form>

        </div>

    </div>

</div>

@endsection