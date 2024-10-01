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
        Schema::create('mraforms', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();                   
            $table->string('expense_type'); 
            $table->string('payment_type'); 
            $table->string('concern_person'); 
            $table->string('purpose')->nullable();
            $table->string('amount');
            $table->string('grand_total');
            $table->string('word'); 
            $table->string('received_by')->nullable(); 
            $table->string('remarks')->nullable();
            $table->string('prepared_by')->nullable(); 
            $table->string('varified_by')->nullable();
            $table->string('approved_by')->nullable();            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable(); 
            $table->string('document')->nullable();;
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
        Schema::dropIfExists('mraforms');
    }
};
