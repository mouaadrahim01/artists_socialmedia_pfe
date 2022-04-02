<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('recepteur_id')->references('id')->on('users');
            $table->foreign('conv_id')->references('id')->on('convercations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['recepteur_id']);
            $table->dropForeign(['conv_id']);
        });
    }
};
