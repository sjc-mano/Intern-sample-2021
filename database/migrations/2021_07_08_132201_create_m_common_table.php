<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCommonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_common', function (Blueprint $table) {
            $table->string('common_id', 5)->comment('共通ID');
            $table->string('common_name', 20)->nullable()->comment('共通名');
            $table->string('common_type_id', 2)->comment('共通種別ID');
            $table->string('common_type_name', 20)->nullable()->comment('共通種別名称');
            $table->datetime('created_at')->nullable()->comment('作成日時');
            $table->datetime('updated_at')->nullable()->comment('更新日時');

            $table->primary(['common_id', 'common_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_common');
    }
}
