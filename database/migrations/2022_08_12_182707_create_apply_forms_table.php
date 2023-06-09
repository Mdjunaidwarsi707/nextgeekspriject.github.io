<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_forms', function (Blueprint $table) {
            $table->id();
            $table->string('roles_id')->nullable();
            $table->text('roles_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('mobile')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->text('qualification')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('resume')->nullable();
            $table->string('status')->nullable();
            $table->string('career_tracking')->nullable();
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
        Schema::dropIfExists('apply_forms');
    }
}
