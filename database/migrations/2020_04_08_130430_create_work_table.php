<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work', function (Blueprint $table) {
            $table->id();
            $table->dateTime("created_at")->nullable();
            $table->dateTime("updated_at")->nullable();
            $table->string("company")->nullable(false)->default("")->comment("公司名称");
            $table->string("position")->nullable(false)->default("")->comment("职位");
            $table->string("responsibility")->nullable()->default("")->comment("负责内容");
            $table->string("begin_at")->nullable()->comment("开始时间");
            $table->string("end_at")->nullable()->comment("结束时间");
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
        Schema::dropIfExists('work');
    }
}
