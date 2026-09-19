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

        /*
        |--------------------------------------------------------------------------
        | Update berdasarkan status
        |--------------------------------------------------------------------------
        */

        if ($request->status === 'RESOLVED') {

            $ticket->update([
                'status' => 'RESOLVED',
                'resolved_at' => now(),
                'updated_by' => auth()->id(),
            ]);

        } elseif ($request->status === 'IN_PROGRESS') {

            $ticket->update([
                'status' => 'IN_PROGRESS',
                'updated_by' => auth()->id(),
            ]);

        } elseif ($request->status === 'PENDING') {

            $ticket->update([
                'status' => 'PENDING',
                'updated_by' => auth()->id(),
            ]);
        }

        return back()->with(
            'success',
            'Progress ticket berhasil diperbarui.'
        );
    }
}
