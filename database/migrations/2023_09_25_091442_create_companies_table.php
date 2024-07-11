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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable()->default(NULL);
            $table->string('company_address')->nullable()->default(NULL);
            $table->string('company_rep')->nullable()->default(NULL);
            $table->string('companyNo')->nullable()->default(NULL);
            $table->string('company_email')->nullable()->default(NULL);
            $table->string('companyLink')->nullable()->default(NULL);
            $table->string('file');
            $table->string('uploader_name')->nullable()->default(NULL);
            $table->string('valid_until')->nullable()->default(NULL);
            $table->string('school_year')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
