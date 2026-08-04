<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_statuses', function (Blueprint $table) {

            $table->id();

            $table->string('code',30)->unique();

            $table->string('name',100);

            $table->string('color',20)
                  ->default('#0d6efd');

            $table->unsignedInteger('sort_order')
                  ->default(1);

            $table->boolean('is_default')
                  ->default(false);

            $table->boolean('is_closed')
                  ->default(false);

            $table->boolean('is_active')
                  ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('code');
            $table->index('sort_order');
            $table->index('is_default');
            $table->index('is_closed');
            $table->index('is_active');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_statuses');
    }
};