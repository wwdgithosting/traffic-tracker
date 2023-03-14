<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_logs', function (Blueprint $table) {
            $table->id();
            $table->date('feed_date');
            $table->string('partner');
            $table->string('subid');
            $table->string('ip');
            $table->string('country_iso');
            $table->string('keyword');
            $table->string('browser');
            $table->string('device');
            $table->string('os');
            $table->string('os_version');
            $table->string('browser_user_agent');
            $table->string('browser_language');
            $table->string('referrer');
            $table->string('url');
            $table->boolean('latency');
            $table->integer('count');
            $table->integer('fallback_feed_url_count');
            $table->bigInteger('pid');
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
        Schema::dropIfExists('feed_logs');
    }
}
