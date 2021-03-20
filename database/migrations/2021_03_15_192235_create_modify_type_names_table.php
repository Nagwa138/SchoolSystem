<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModifyTypeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modify_type_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('form_name');
            $table->unsignedBigInteger('modify_type_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('modify_type_id')->references('id')->on('modify_types');
            $table->foreign('job_id')->references('id')->on('jobs');
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
        Schema::dropIfExists('modify_type_names');
    }
}
