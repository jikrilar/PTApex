<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('CV');
            $table->string('ktp_number');
            $table->string('ktp_photo');
            $table->string('kk_number');
            $table->string('telp');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->text('address');
            $table->string('emergency_contact');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('religion', ['islam', 'kristen protestan', 'katolik', 'budha', 'konghucu']);
            $table->enum('marital_status', ['lajang', 'menikah', 'menikah anak 1', 'menikah anak 2', 'menikah anak 3', 'duda atau janda']);
            $table->string('photo');
            $table->enum('blood_type', ['A', 'B', 'AB', 'O']);
            $table->enum('status', ['karyawan tetap', 'karyawan kontrak', 'magang']);
            $table->enum('bank', ['BCA', 'mandiri', 'maybank', 'BRI', 'BNI', 'CIMB NIAGA', 'hongkong shanghai bank central']);
            $table->string('account_number');
            $table->string('bpjs_number');
            $table->string('last_education');
            $table->string('education_place');
            $table->string('education_city');
            $table->string('graduation_year');
            $table->string('last_experience');
            $table->string('working_period');
            $table->string('last_title');
            $table->text('last_job_description');
            $table->text('skill');
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('title_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('candidates');
    }
}
