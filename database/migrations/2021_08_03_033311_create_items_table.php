<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('codeno');
            $table->string('name');
            $table->text('photo');
            $table->integer('rate');
            $table->integer('price');
            $table->integer('discount');
            $table->text('details');
            $table->text('description');
            $table->integer('release_year');
            $table->unsignedBigInteger('subcategory_id');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key Define
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
