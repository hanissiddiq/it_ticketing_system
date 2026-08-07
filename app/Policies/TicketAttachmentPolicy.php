<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TicketAttachment;

class TicketAttachmentPolicy
{
    /**
     * Download
     */
    public function download(
        User $user,
        TicketAttachment $attachment
    ): bool {

        if ($user->hasRole('Super Admin')) {
            return true;
        }

        if ($user->hasRole('Admin')) {
            return true;
        }

        if ($user->hasRole('Helpdesk')) {
            return true;
        }

        if ($user->hasRole('IT Support')) {

            return $attachment->ticket->assigned_to == $user->id;

        }

        if ($user->hasRole('User')) {

            return $attachment->ticket->requester_id == $user->id;

        }

        return false;

    }

    /**
     * Delete
     */
    public function delete(
        User $user,
        TicketAttachment $attachment
    ): bool {

        if ($user->hasRole('Super Admin')) {
            return true;
        }

        if ($user->hasRole('Admin')) {
            return true;
        }

        if ($user->hasRole('Helpdesk')) {
            return true;
        }

        if ($user->hasRole('IT Support')) {

            return $attachment->ticket->assigned_to == $user->id;

        }

        if ($user->hasRole('Requester')) {

            return $attachment->ticket->requester_id == $user->id
                && $attachment->ticket->status == 'NEW';

        }

        return false;

    }
}