<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_persons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 11)->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('gender', 50)->nullable();
            $table->unsignedBigInteger('person_id')->unsigned();
            $table->foreign('person_id')
            ->references('id')->on('persons')->onDelete('cascade');
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
        Schema::dropIfExists('physical_persons');
    }
}
