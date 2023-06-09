<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->string('cm_blog_id')->nullable();
            $table->string('cm_blog_name')->nullable();
            $table->string('cm_name')->nullable();
            $table->text('cm_email')->nullable();
            $table->string('cm_mobile')->nullable();
            $table->text('cm_comment')->nullable();

            $table->string('re_blog_subid')->nullable();
            $table->string('re_name')->nullable();
            $table->text('re_email')->nullable();
            $table->string('re_mobile')->nullable();
            $table->text('re_comment')->nullable();
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
        Schema::dropIfExists('blog_comments');
    }
}
