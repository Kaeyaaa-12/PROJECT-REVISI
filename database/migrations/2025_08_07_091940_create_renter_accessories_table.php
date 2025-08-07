<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('renter_accessories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accessory_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->date('rental_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('renter_accessories');
    }
};