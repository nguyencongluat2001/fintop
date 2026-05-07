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
        Schema::create('register', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name'); // Họ và tên
            $table->string('address')->nullable(); // địa chỉ
            $table->string('phone')->nullable(); // số điện thoại
            $table->string('dateBirth')->nullable(); // ngày sinh / ngày lập
            $table->string('company')->nullable(); // công ty
            $table->string('position')->nullable(); // Chức vụ
            $table->string('date_join')->nullable(); // ngày thành lập
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->string('user_introduce')->nullable(); // người giới thiệu
            $table->string('id_personnel')->nullable(); // mã nhân viên
            $table->string('investment_time')->nullable();
            $table->string('investment_taste')->nullable();
            $table->string('investment_company')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register');
    }
};
