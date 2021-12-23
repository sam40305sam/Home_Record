<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsHTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records_H', function (Blueprint $table) {
            $table->id();
            $table->decimal('avg_tem', 5, 2)->comment("平均溫度");
            $table->decimal('avg_hum', 5, 2)->comment("平均濕度");
            $table->integer('numbers')->comment("數量");
            $table->timestamp('time')->comment("紀錄時間");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records_H');
    }
}
