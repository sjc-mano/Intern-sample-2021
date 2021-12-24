<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_related_items', function (Blueprint $table) {
            $table->string('main_item_id', 25)->comment('親品番ID');
            $table->string('sub_item_id', 25)->comment('子品番ID');
            $table->string('item_type', 2)->comment('種別');
            $table->string('create_month', 6)->comment('作成年月');
            $table->integer('pur_get_num')->default(0)->nullable()->comment('購入品使用個数');
            $table->string('pur_use_category_code', 3)->nullable()->comment('使用工程種別コード');
            $table->datetime('created_at')->nullable()->comment('作成日時');
            $table->datetime('updated_at')->nullable()->comment('更新日時');

            $table->primary(['main_item_id', 'sub_item_id', 'item_type', 'create_month'], 'DUMMY_NAMR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_related_items');
    }
}
