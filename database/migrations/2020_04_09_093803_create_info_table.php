<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->dateTime("created_at")->nullable();
            $table->dateTime("updated_at")->nullable();
            $table->string("name")->nullable(false)->default("")->comment("信息名称");
            $table->string("key")->nullable(false)->default("")->comment("信息key")->unique("uni_key");
            $table->string("value")->nullable(false)->default("")->comment("信息value");
            $table->integer("sort")->nullable(false)->default(0)->comment("排序");
            $table->tinyInteger("status")->nullable(false)->default(1)->comment("状态1显示2隐藏");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}
