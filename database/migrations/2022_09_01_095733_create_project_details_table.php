<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('pro_client_name')->nullable();
            $table->string('pro_client_mobile')->nullable();
            $table->string('pro_title')->nullable();
            $table->string('pro_description')->nullable();
            $table->string('pro_location')->nullable();
            $table->string('pro_technology')->nullable();
            $table->string('pro_keywords')->nullable();
            $table->string('pro_review')->nullable();
            $table->string('pro_text_message')->nullable();
            $table->string('pro_image')->nullable();
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
        Schema::dropIfExists('project_details');
    }
}
