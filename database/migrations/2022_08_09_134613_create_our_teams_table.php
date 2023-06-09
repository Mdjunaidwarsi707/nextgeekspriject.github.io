<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->string('t_name')->nullable();
            $table->string('t_role')->nullable();
            $table->string('t_facebook')->nullable();
            $table->string('t_twitter')->nullable();
            $table->string('t_linkedin')->nullable();
            $table->string('t_instagram')->nullable();
            $table->string('t_image')->nullable();
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
        Schema::dropIfExists('our_teams');
    }
}
