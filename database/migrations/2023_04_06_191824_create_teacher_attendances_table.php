<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher');
            $table->foreign('teacher')->on('teachers')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedBigInteger('row');
            $table->foreign('row')->on('rows')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('teacher_attendances');
    }
}
