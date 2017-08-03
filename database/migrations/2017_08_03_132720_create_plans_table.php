<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * 出团计划
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->date('trip_date')->comment('出团日期');
            $table->enum('status', ['draft', 'done'])->default('draft')->comment('状态: 组团中draft, 已完成done');
            $table->decimal('income', 5, 2)->comment('团总收入');
            $table->decimal('expenditure', 5, 2)->comment('团总支出');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
