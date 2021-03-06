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
            $table->string('empNum');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('xname')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('province');
            $table->string('city');
            $table->string('brgy');
            $table->string('frombrgy');
            $table->integer('temp');
            $table->string('sanitize');
            $table->string('cough')->nullable();
            $table->string('colds')->nullable();
            $table->string('fever')->nullable();
            $table->string('sorethroat')->nullable();
            $table->string('diffbreath')->nullable();
            $table->string('travelhis');
            $table->date('travelhisdate')->nullable();
            $table->string('travelhisplace')->nullable();
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
