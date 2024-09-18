<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_banks', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaction');
            $table->date('transaction_date');
            $table->integer('amount');
            $table->string('invoice');
            $table->enum('category', ['expenses', 'income']);
            $table->foreignId('saving_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('loan_id')->nullable()->constrained()->onDelete('set null');
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
        Schema::dropIfExists('cash_banks');
    }
}
