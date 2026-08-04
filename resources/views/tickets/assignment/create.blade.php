@extends('template.main')

@section('content')

<div class="container-fluid">

    <form
        method="POST"
        action="{{ route('tickets.assignment.store',$ticket) }}">

        @include('tickets.assignment.form')

    </form>

    <div class="card mt-4 shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">

                Assignment History

            </h5>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover mb-0">

                <thead>

                <tr>

                    <th width="50">

                        #

                    </th>

                    <th>

                        Assigned By

                    </th>

                    <th>

                        Assigned To

                    </th>

                    <th>

                        Date

                    </th>

                    <th>

                        Notes

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($histories as $history)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $history->assigner->name }}

                        </td>

                        <td>

                            {{ $history->assignee->name }}

                        </td>

                        <td>

                            {{ $history->assigned_at->format('d M Y H:i') }}

                        </td>

                        <td>

                            {{ $history->notes }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No Assignment History

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection