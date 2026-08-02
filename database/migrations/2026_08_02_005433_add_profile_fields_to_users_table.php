<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('employee_id',50)
                ->nullable()
                ->after('id')
                ->unique();

            $table->foreignId('department_id')
                ->nullable()
                ->after('password')
                ->constrained()
                ->nullOnDelete();

            $table->string('position',100)
                ->nullable();

            $table->string('phone',25)
                ->nullable();

            $table->string('avatar')
                ->nullable();

            $table->boolean('is_active')
                ->default(true);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['department_id']);

            $table->dropColumn([
                'employee_id',
                'department_id',
                'position',
                'phone',
                'avatar',
                'is_active'
            ]);

        });
    }

};
