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
        Schema::create('item_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('category_id');
            $table->string('price');
            $table->text('description');
            $table->tinyInteger('condition');
            $table->tinyInteger('type');
            $table->string('image');
            $table->string('own_name');
            $table->tinyInteger('status')->nullable();
            $table->integer('local');
            $table->string('phone');
            $table->string('address');
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
        Schema::dropIfExists('item_models');
    }
};
