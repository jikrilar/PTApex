<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->string('code_invoice')->nullable();
            $table->unsignedBigInteger('loan_id');
            $table->integer('installment_number');
            $table->decimal('principal_amount', 12, 2); // Tagihan pokok
            $table->decimal('interest_amount', 12, 2);  // Tagihan bunga
            $table->decimal('penalty_amount', 12, 2)->default(0); // Denda
            $table->decimal('total_installment_amount', 12, 2)->default(0); // Total Tagihan pokok + bunga
            $table->decimal('total_paid_amount', 12, 2)->default(0); // Jumlah terbayarkan
            $table->date('due_date'); // Tanggal jatuh tempo
            $table->timestamps();

            // Foreign key untuk loan
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installments');
    }
}
