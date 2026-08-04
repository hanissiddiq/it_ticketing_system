@csrf

<div class="card shadow-sm mb-4">

    <div class="card-header">

        <h5 class="mb-0">

            Ticket Information

        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="fw-bold">

                    Ticket Number

                </label>

                <input
                    class="form-control"
                    readonly
                    value="{{ $ticket->ticket_number }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">

                    Status

                </label>

                <input
                    class="form-control"
                    readonly
                    value="{{ str_replace('_',' ',$ticket->status) }}">

            </div>

        </div>

        <div class="mb-3">

            <label class="fw-bold">

                Subject

            </label>

            <input
                class="form-control"
                readonly
                value="{{ $ticket->subject }}">

        </div>

        <div class="mb-3">

            <label class="fw-bold">

                Description

            </label>

            <textarea
                class="form-control"
                rows="4"
                readonly>{{ $ticket->description }}</textarea>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="fw-bold">

                    Priority

                </label>

                <input
                    class="form-control"
                    readonly
                    value="{{ $ticket->priority->name }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="fw-bold">

                    Department

                </label>

                <input
                    class="form-control"
                    readonly
                    value="{{ $ticket->department->name }}">

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-header">

        <h5 class="mb-0">

            Assign To IT Support

        </h5>

    </div>

    <div class="card-body">

        <div class="mb-3">

            <label class="form-label">

                IT Support

            </label>

            <select
                name="assigned_to"
                class="form-select @error('assigned_to') is-invalid @enderror">

                <option value="">

                    -- Select IT Support --

                </option>

                @foreach($users as $user)

                    <option
                        value="{{ $user->id }}"
                        @selected(old('assigned_to')==$user->id)>

                        {{ $user->name }}

                    </option>

                @endforeach

            </select>

            @error('assigned_to')

                <div class="invalid-feedback">

                    {{ $message }}

                </div>

            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">

                Assignment Notes

            </label>

            <textarea
                rows="4"
                name="notes"
                class="form-control">{{ old('notes') }}</textarea>

        </div>

    </div>

</div>

<div class="mt-4">

    <button
        class="btn btn-primary">

        Assign Ticket

    </button>

    <a
        href="{{ route('tickets.show',$ticket) }}"
        class="btn btn-secondary">

        Cancel

    </a>

</div>