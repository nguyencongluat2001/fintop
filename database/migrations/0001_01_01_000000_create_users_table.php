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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Laravel 12 default (auto increment)

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            // ===== Laravel 10 custom fields =====
            $table->string('role')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('dateBirth')->nullable();

            $table->string('avatar')->default('avatar_default.png');
            $table->tinyInteger('status')->nullable();

            $table->string('user_introduce')->nullable();
            $table->string('id_personnel')->nullable();
            $table->string('account_type_vip')->nullable();

            $table->string('order', 10)->nullable();

            // Laravel 12 default
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};