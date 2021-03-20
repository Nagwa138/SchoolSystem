<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModifyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modify_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modify_type_name_id');
            $table->foreign('modify_type_name_id')->references('id')->on('modify_type_names');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('modify_request_id');
            $table->foreign('modify_request_id')->references('id')->on('modify_requests');
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
        Schema::dropIfExists('modify_items');
    }
}
