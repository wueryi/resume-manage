<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->dateTime("created_at")->nullable();
            $table->dateTime("updated_at")->nullable();
            $table->string("name")->nullable(false)->default("")->comment("名称");
            $table->string("brief")->nullable(false)->default("")->comment("项目概述");
            $table->string("skill")->nullable(false)->default("")->comment("使用技能");
            $table->string("responsibility")->nullable(false)->default("")->comment("负责内容");
            $table->string("difficulty")->nullable()->default("")->comment("项目难点");
            $table->string("achievement")->nullable()->default("")->comment("项目成果");
            $table->string("begin_at")->nullable()->comment("开始时间");
            $table->string("end_at")->nullable()->comment("结束时间");
            $table->integer("sort")->nullable(false)->default(0)->comment("排序");
            $table->tinyInteger("status")->nullable(false)->default(1)->comment("状态1显示2隐藏");
            $table->json('image')->nullable()->comment("展示图片");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience');
    }
}
