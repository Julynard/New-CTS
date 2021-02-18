<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emps', function (Blueprint $table) {
            $table->id();
            $table->integer('empNum');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('xname');
            $table->string('gender');
            $table->date('dob');
            $table->string('province');
            $table->string('city');
            $table->string('brgy');
            $table->string('frombrgy');
            $table->integer('temp');
            $table->string('sanitize');
            $table->string('cough');
            $table->string('colds');
            $table->string('fever');
            $table->string('sorethroat');
            $table->string('diffbreath');
            $table->string('travelhis');
            $table->date('travelhisdate');
            $table->string('travelhisplace');
            $table->string('closecontact');
            $table->string('email');
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
        Schema::dropIfExists('emps');
    }
}
