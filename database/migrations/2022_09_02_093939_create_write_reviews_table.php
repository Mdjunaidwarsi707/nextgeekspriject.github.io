<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriteReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('write_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('r_client_id')->nullable();
            $table->string('r_clientname')->nullable();
            $table->string('r_client_mobile')->nullable();
            $table->string('r_project_id')->nullable();
            $table->string('r_project_title')->nullable();
            $table->string('r_firstname')->nullable();
            $table->string('r_lastname')->nullable();
            $table->string('r_mobile')->nullable();
            $table->string('r_review')->nullable();
            $table->string('total_review')->nullable();
            $table->string('avg_review')->nullable();
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
        Schema::dropIfExists('write_reviews');
    }
}
