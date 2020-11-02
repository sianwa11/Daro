<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualClassPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_class_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('virtual_class_id'); // foreign key
            $table->longText('post_description');
            $table->string('post_files')->nullable();
            $table->softDeletes(); // for soft deletes
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
        Schema::dropIfExists('virtual_class_posts');
        Schema::table('virtual_class_posts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
