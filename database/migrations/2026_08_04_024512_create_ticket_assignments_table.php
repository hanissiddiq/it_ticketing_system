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
        Schema::create('ticket_assignments', function (Blueprint $table) {

            $table->id();

            $table->foreignIdFor(Ticket::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(User::class, 'assigned_by')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignIdFor(User::class, 'assigned_to')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->text('notes')->nullable();

            $table->timestamp('assigned_at');

            $table->timestamps();

            $table->index('ticket_id');
            $table->index('assigned_by');
            $table->index('assigned_to');
            $table->index('assigned_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_assignments');
    }
};