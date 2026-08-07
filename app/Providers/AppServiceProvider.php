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


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
