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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->default(NULL);
          // remove column  $table->string('middle_name')->nullable()->default(NULL);
            $table->string('last_name')->nullable()->default(NULL);
            $table->string('suffix')->nullable()->default(NULL);
            $table->string('full_name')->nullable()->default(NULL);
            $table->string('email')->unique();
            $table->string('studentNum')->nullable()->default(NULL);
            $table->date('date_of_birth')->nullable()->default(NULL);
            $table->string('contact_number')->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->string('year_and_section')->nullable()->default(NULL);
            $table->string('course')->nullable()->default(NULL);
            $table->string('adviser_name')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
