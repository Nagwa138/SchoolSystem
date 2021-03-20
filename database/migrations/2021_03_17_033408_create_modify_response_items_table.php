<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModifyResponseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modify_response_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modify_type_name_id');
            $table->foreign('modify_type_name_id')->references('id')->on('modify_type_names');
            $table->unsignedBigInteger('modify_response_id');
            $table->string('value');
            $table->string('pic')->nullable();
            $table->foreign('modify_response_id')->references('id')->on('modify_responses');
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
        Schema::dropIfExists('modify_response_items');
    }
}
