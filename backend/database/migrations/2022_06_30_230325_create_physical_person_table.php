<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_person', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('cpf', 11);
            $table->dateTime('birth_date');
            $table->char('sex', 1);
            $table->unsignedBigInteger('person_id')->unsigned();
            $table->foreign('person_id')
            ->references('id')->on('person')->onDelete('cascade');
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
        Schema::dropIfExists('physical_person');
    }
}
