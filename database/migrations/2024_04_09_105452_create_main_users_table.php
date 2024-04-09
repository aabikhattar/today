<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('main_users', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('table_connection');
            $table->timestamps();

            $table->unique(['email', 'table_connection']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_users');
    }
};
