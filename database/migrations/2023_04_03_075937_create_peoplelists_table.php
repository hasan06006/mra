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
        Schema::create('peoplelists', function (Blueprint $table) {
            $table->id(); 
            $table->string('office_id');            
            $table->string('name');
            $table->string('is_received_by')->nullable();  
            $table->string('is_prepared_by')->nullable(); 
            $table->string('is_varified_by')->nullable();
            $table->string('is_approved_by')->nullable();                      
            $table->string('is_active');         
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable(); 
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
        Schema::dropIfExists('peoplelists');
    }
};
