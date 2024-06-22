<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type',['image','video']);
            $table->string('file_location');
            $table->unsignedBigInteger('screen_owner_id');
            $table->unsignedBigInteger('studio_id');

            $table
                ->foreign('screen_owner_id')
                ->references('id')
                ->on('screen_owners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
};
