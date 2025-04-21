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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name', 255);
            $table->string('email')->unique();
            $table->string('phone_number', 20)->nullable();
            $table->string('type', 50);
            $table->unsignedBigInteger('designation_id');
            $table->integer('status')->default(1);
            $table->text('image')->nullable();
            $table->string('password');
            $table->rememberToken(); // adds nullable varchar(100)
            $table->timestamps(); // adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
