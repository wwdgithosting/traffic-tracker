<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedURLSubIDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feed_u_r_l_sub_i_d_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('feed_urls_id');
            $table->string('sub_id');
            $table->integer('feed_url_index');
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
        Schema::dropIfExists('feed_u_r_l_sub_i_d_s');
    }
}
