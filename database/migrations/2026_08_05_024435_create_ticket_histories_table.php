<?php

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_histories', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(Ticket::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Action
            |--------------------------------------------------------------------------
            */

            $table->string('action',50);

            /*
            |--------------------------------------------------------------------------
            | Field
            |--------------------------------------------------------------------------
            */

            $table->string('field',50)
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Before
            |--------------------------------------------------------------------------
            */

            $table->text('old_value')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | After
            |--------------------------------------------------------------------------
            */

            $table->text('new_value')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Description
            |--------------------------------------------------------------------------
            */

            $table->text('description')
                ->nullable();

            $table->timestamps();

            $table->index('ticket_id');

            $table->index('action');

            $table->index('field');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_histories');
    }
};