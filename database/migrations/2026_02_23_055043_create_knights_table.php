<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('knights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('title')->nullable();
            $table->string('weapon')->nullable();
            $table->integer('experience_years')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('knights');
    }
};