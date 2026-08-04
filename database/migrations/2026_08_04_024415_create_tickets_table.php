<?php

use App\Models\Category;
use App\Models\Department;
use App\Models\Priority;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {

            $table->id();

            /**
             * Ticket Information
             */
            $table->string('ticket_number',30)->unique();

            $table->string('subject');

            $table->longText('description');

            /**
             * Requester
             */
            $table->foreignIdFor(User::class,'requester_id')
                ->constrained('users')
                ->cascadeOnDelete();

            /**
             * Assigned Helpdesk / IT Support
             */
            $table->foreignIdFor(User::class,'assigned_to')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            /**
             * Department
             */
            $table->foreignIdFor(Department::class)
                ->constrained()
                ->cascadeOnDelete();

            /**
             * Category
             */
            $table->foreignIdFor(Category::class)
                ->constrained()
                ->cascadeOnDelete();

            /**
             * Sub Category
             */
            $table->foreignIdFor(SubCategory::class)
                ->constrained()
                ->cascadeOnDelete();

            /**
             * Priority
             */
            $table->foreignIdFor(Priority::class)
                ->constrained()
                ->cascadeOnDelete();

            /**
             * Ticket Status
             */
            $table->enum('status',[
                'NEW',
                'OPEN',
                'ASSIGNED',
                'IN_PROGRESS',
                'PENDING',
                'ESCALATED',
                'RESOLVED',
                'CLOSED',
                'CANCELLED'
            ])->default('NEW');

            /**
             * SLA
             */
            $table->timestamp('due_at')->nullable();

            $table->timestamp('resolved_at')->nullable();

            $table->timestamp('closed_at')->nullable();


            
            /**
             * Terakhir diubah oleh
             */
            $table->foreignId('updated_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

            /**
             * Audit
             */
            $table->timestamps();

            $table->softDeletes();

            /**
             * Index
             */
            $table->index('ticket_number');

            $table->index('status');

            $table->index('requester_id');

            $table->index('assigned_to');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
