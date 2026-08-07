<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\TicketRepository;

use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;
use App\Repositories\TicketAssignmentRepository;

use App\Repositories\ITSupportTicketRepository;
use App\Repositories\Contracts\ITSupportTicketRepositoryInterface;

use App\Repositories\Contracts\TicketHistoryRepositoryInterface;
use App\Repositories\TicketHistoryRepository;

use App\Repositories\Contracts\RequesterTicketRepositoryInterface;
use App\Repositories\RequesterTicketRepository;

use App\Repositories\Contracts\TicketCommentRepositoryInterface;
use App\Repositories\TicketCommentRepository;

use App\Repositories\Contracts\TicketAttachmentRepositoryInterface;
use App\Repositories\TicketAttachmentRepository;

use App\Models\TicketAttachment;
use App\Policies\TicketAttachmentPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(
        TicketRepositoryInterface::class,
        TicketRepository::class,
    );
          $this->app->bind(
        TicketAssignmentRepositoryInterface::class,
        TicketAssignmentRepository::class
    );
          $this->app->bind(
        ITSupportTicketRepositoryInterface::class,
        ITSupportTicketRepository::class
    );

        $this->app->bind(
    TicketHistoryRepositoryInterface::class,
    TicketHistoryRepository::class
    );

        $this->app->bind(
    RequesterTicketRepositoryInterface::class,
    RequesterTicketRepository::class
    );

    $this->app->bind(
    TicketAttachmentRepositoryInterface::class,
    TicketAttachmentRepository::class
    );

        $this->app->bind(
    TicketCommentRepositoryInterface::class,
    TicketCommentRepository::class
    );


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(
        TicketAttachment::class,
        TicketAttachmentPolicy::class
    );
    }
}
