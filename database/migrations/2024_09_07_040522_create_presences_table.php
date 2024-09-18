<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->time('in_presence_time');
            $table->time('out_presence_time')->nullable();
            $table->string('in_presence_photo')->nullable();
            $table->string('out_presence_photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('late_minutes')->default(0);
            $table->foreignId('attendance_id')->constrained();
            $table->timestamps();

            $table->foreign('employee_id')->references('nik')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presences');
    }
}
