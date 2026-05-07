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
        Schema::create('approve_payment', function (Blueprint $table) {
            $table->uuid('id')->primary(); // ví dụ : B8692034-8AF0-4FBA-A13A-0B85D98850BA
            $table->uuid('user_id'); // mã khách hàng
            $table->string('user_id_introduce')->nullable(); // mã cv giới thiệu - ví dụ : LUATNCTTHH4049 hoặc mã id bất kỳ B8692034-8AF0-4FBA-A13A-0B85D98850BA
            $table->string('role_client')->nullable(); // ví dụ VIP,VIP1 ,VIP2,
            $table->string('image',2000)->nullable(); // anh
            $table->string('type_payment')->nullable(); // loai banking
            $table->string('package')->nullable(); // loai gói
            $table->integer('order')->nullable(); // thu tu
            $table->string('status')->nullable(); // trạng thai (on , off)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve_payment');
    }
};
