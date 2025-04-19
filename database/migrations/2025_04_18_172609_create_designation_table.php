<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('designation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation', 255);
           // $table->string('type', 50);
         //   $table->unsignedBigInteger('designation_id');
          //  $table->integer('status');s
            $table->timestamps(); // adds created
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designation');
    }
};
