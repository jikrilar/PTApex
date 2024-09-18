<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_loans', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaction')->unique();
            $table->date('transaction_date');
            $table->decimal('amount', 15, 2);
            $table->text('note');
            $table->string('invoice');
            $table->enum('installment', ['1', '3', '6', '12']);
            $table->decimal('interest_rate', 5, 2);
            $table->decimal('amount_with_interest', 15, 2);
            $table->enum('status_installment', ['in_progress', 'paid']);
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_loans');
    }
}
