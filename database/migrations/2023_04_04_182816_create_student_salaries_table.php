<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student');
            $table->foreign('student')->on('students')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('price')->default(0);
            $table->string('day')->default(Carbon::now()->timezone('Africa/Cairo')->format('d'));
            $table->string('year')->default(Carbon::now()->timezone('Africa/Cairo')->format('Y'));
            $table->string('month')->default(Carbon::now()->timezone('Africa/Cairo')->format('m'));
            $table->softDeletes();
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
        Schema::dropIfExists('student_salaries');
    }
}
