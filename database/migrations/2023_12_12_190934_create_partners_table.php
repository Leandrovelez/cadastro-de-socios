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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('email', 250);
            $table->enum('type', ['Silver', 'Gold']);
            $table->string('cpf', 14);
            $table->string('cep', 10);
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('neighborhood', 100);
            $table->string('address', 100);
            $table->integer('number');
            $table->string('complement', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
