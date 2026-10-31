<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Customers table (TFA2 schema): full_name, email and phone, plus the
     * POS fields shown on the Customer Accounts page. Replaces the static
     * array used in TFA5.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->string('city', 100);
            $table->enum('tier', ['Regular', 'Silver', 'Gold'])->default('Regular');
            $table->unsignedInteger('points')->default(0);
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->date('joined');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
