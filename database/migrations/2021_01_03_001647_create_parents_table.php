<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('father_first_name');
            $table->string('mother_first_name')->nullable();
            $table->string('father_middle_name');
            $table->string('mother_middle_name')->nullable();
            $table->string('father_last_name');
            $table->string('mother_last_name')->nullable();
            $table->string('email')->unique();
            $table->bigInteger('father_phone_number');
            $table->bigInteger('mother_phone_number')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('number_of_children');
            $table->bigInteger('father_national_id')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('parents');
    }
}
