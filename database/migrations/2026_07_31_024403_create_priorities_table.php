<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {

            $table->id();

            $table->string('code',10)->unique();

            $table->string('name',50);

            $table->string('color',20)->default('#0d6efd');

            $table->unsignedInteger('response_time'); // menit

            $table->unsignedInteger('resolution_time'); // menit

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
