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
            Schema::disableForeignKeyConstraints();

        Schema::create('alumnes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('cognoms');
            $table->date('data_naixement');
            $table->unsignedBigInteger('centre_id');
            $table->foreign('centre_id')->references('id')->on('centres');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('alumnes');
        Schema::enableForeignKeyConstraints();    }
};
