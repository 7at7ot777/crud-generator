<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreenOwnersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('screen_owners', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('screen_owners');
    }
};

