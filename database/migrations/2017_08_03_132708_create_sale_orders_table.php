<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrdersTable extends Migration
{
    /**
     * 订单
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('code', 100)->comment('订单编号');
            $table->integer('product_id')->comment('产品ID');
            $table->decimal('price', 10, 2)->comment('订单价格');

            $table->string('channel', 50)->comment('销售渠道');
            $table->string('user_name', 50)->comment('联系人');
            $table->string('user_phone', 11)->comment('联系人 手机号');
            $table->integer('people_number')->comment('出行人数');
            $table->date('trip_date')->comment('出行日期');


            $table->text('remark')->comment('订单备注')->nullable();
            $table->enum('status', ['draft', 'confirmed', 'done', 'cancel'])->default('draft')->comment('状态: 草稿draft,已确认confirmed， 已完成done, 已取消cancel');
            $table->integer('plan_id')->comment('出团计划ID')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_orders');
    }
}
