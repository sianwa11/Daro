<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirtualClassAssignments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_class_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('virtual_class_id'); // foreign key
            $table->string('title');
            $table->longText('instructions')->nullable();
            $table->date('due_date');
            $table->time('time'); // time
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
        Schema::dropIfExists('virtual_class_assignments');
        Schema::table('virtual_class_assignments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
