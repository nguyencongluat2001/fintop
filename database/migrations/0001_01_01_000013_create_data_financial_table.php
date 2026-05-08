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
        Schema::create('data_financial', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('code_cp')->nullable(); // mã cp
            $table->string('exchange')->nullable(); //sàn gao dịch
            $table->string('code_category')->nullable(); //nhóm ngành HĐKD
            // $table->string('ratings_TA')->nullable(); // xếp hạng TA                  bỏ
            $table->text('identify_trend')->nullable(); //nhận định TA -xu hướng CP
            // $table->string('act')->nullable(); //Hành động
            $table->string('status_model')->nullable(); //  status_model 
            $table->string('model')->nullable(); // Kết quả Model                        act->model
            $table->string('trading_price_resist')->nullable(); // Vùng giá kháng cự
            $table->string('trading_price_range')->nullable(); // Vùng giá giao dịch     Vùng giá giao dịch > .Sửa thành " Vùng giá tham chiếu"
            $table->string('stop_loss_price_zone')->nullable();// Vùng giá cắt lỗ
            $table->string('status')->nullable(); // trạng thái
            $table->string('user_take_on')->nullable(); // NGười đảm nhận
            $table->integer('order')->nullable(); // thu tu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_financial');
    }
};
