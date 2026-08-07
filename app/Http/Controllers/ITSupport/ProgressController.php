<?php

namespace App\Http\Controllers\ITSupport;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function update(
        Request $request,
        Ticket $ticket
    ) {
        abort_unless(
            $ticket->assigned_to == auth()->id(),
            403
        );

        $request->validate([

            'status' => [
                'required',
                'in:IN_PROGRESS,PENDING,RESOLVED'
            ]

        ]);

        $ticket->update([

            'status' => $request->status

        ]);

        return back()->with(
            'success',
            'Progress ticket berhasil diperbarui.'
        );
    }
}