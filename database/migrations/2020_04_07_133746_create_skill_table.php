<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill', function (Blueprint $table) {
            $table->id();
            $table->dateTime("created_at")->nullable();
            $table->dateTime("updated_at")->nullable();
            $table->string("brief")->nullable(false)->default("")->comment("简介");
            $table->string("content")->nullable(false)->default("")->comment("详情");
            $table->string("keyword")->nullable(false)->default("")->comment("关键字");
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
        Schema::dropIfExists('skill');
    }
}
