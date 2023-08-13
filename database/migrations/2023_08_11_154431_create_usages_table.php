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
        Schema::create('usages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vechile_id');
            $table->bigInteger('driver_id');
            $table->integer('approved_by_head_mine')->default(0);
            $table->integer('approved_by_head_office')->default(0);
            $table->bigInteger('headOffice_id');
            $table->bigInteger('headMine_id');
            $table->date('usage_date');
            $table->date('end_of_usage_date');
            $table->integer('fuel_consumption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usages');
    }
};
