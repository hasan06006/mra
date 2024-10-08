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
        Schema::create('concernpersons', function (Blueprint $table) {
            $table->id();           
            $table->string('name'); 
            $table->string('description')->nullable();
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
        Schema::dropIfExists('concernpersons');
    }
};
