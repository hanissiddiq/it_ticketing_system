<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_attachments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('ticket_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('original_name');

            $table->string('file_name');

            $table->string('mime_type');

            $table->string('extension',20);

            $table->unsignedBigInteger('file_size');

            $table->string('file_path');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_attachments');
    }
};