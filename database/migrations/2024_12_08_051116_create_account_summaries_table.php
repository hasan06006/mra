<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('concernpersons_id');  // Explicitly define it as unsignedBigInteger
            $table->foreign('concernpersons_id')->references('id')->on('concernpersons')->onDelete('cascade');
            $table->decimal('total_credit', 15, 2)->default(0.00);
            $table->decimal('total_debit', 15, 2)->default(0.00);
            $table->decimal('current_balance', 15, 2)->default(0.00);
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
        Schema::dropIfExists('account_summaries');
    }
};
