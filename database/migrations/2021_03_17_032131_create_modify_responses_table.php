<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModifyResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modify_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('approved')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modify_request_id');
            $table->unsignedBigInteger('job_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('modify_request_id')->references('id')->on('modify_requests');
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
        Schema::dropIfExists('modify_responses');
    }
}
