<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * 出团计划成本
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('costs', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->timestamps();
        //     $table->softDeletes();

        //     $table->integer('plan_id')->comment('出团计划ID');
        //     $table->string('name', 100)->comment('成本项目');
        //     $table->decimal('price', 5, 2)->comment('价格');
        //     $table->text('remark')->comment('备注')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('costs');
    }
}
