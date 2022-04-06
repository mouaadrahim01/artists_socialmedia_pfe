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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('prenom',50);
            $table->string('email',50)->unique();
            $table->string('password');
            $table->date('date_naissance');
            $table->string('image',299)->nullable();
            $table->string('pays',30)->default("maroc");
            $table->string('description',255)->nullable();
            $table->string('art',50);
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
        Schema::dropIfExists('users');
    }
};
