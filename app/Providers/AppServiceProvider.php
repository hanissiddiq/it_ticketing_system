<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\TicketRepository;

use App\Repositories\Contracts\TicketAssignmentRepositoryInterface;
use App\Repositories\TicketAssignmentRepository;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
