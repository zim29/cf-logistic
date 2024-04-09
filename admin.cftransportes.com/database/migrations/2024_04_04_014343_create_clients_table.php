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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_type_id')
                        ->constrained()
                        ->restrictOnDelete();
            $table->string('full_name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('tax_identification_number')->nullable();
            $table->string('tax_registration')->nullable();
            $table->string('constitution_location')->nullable();
            $table->date('constitution_date')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('registration_book')->nullable();
            $table->string('registration_pages')->nullable();
            $table->string('address')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->boolean('corporate_group')->nullable();
            $table->string('group_origin_country')->nullable();
            $table->string('legal_representative_name')->nullable();
            $table->string('legal_representative_birthplace')->nullable();
            $table->date('legal_representative_birthdate')->nullable();
            $table->string('legal_representative_id_type')->nullable();
            $table->string('legal_representative_id_number')->nullable();
            $table->string('legal_representative_nationality')->nullable();
            $table->string('legal_representative_tax_id')->nullable();
            $table->string('legal_representative_email')->nullable();
            $table->text('board_members')->nullable();
            $table->text('major_shareholders')->nullable();
            $table->boolean('politically_exposed_person')->nullable();
            $table->text('source_of_funds')->nullable();
            $table->string('monthly_billing_estimate')->nullable();
            $table->text('funds_deposited_safe_health')->nullable();
            $table->string('economic_activity')->nullable();
            $table->date('operation_date')->nullable();
            $table->string('estimated_annual_income')->nullable();
            $table->integer('number_of_employees')->nullable();
            $table->foreignId('tax_classification_id')
                        ->contrained()
                        ->restrictOnDelete();
            $table->boolean('anti_money_laundering_policy')->nullable();
            $table->text('geographic_zones')->nullable();
            $table->text('commercial_references')->nullable();
            $table->text('bank_references')->nullable();
            $table->timestamps();
            $table->boolean('status')
                        ->default(true);
            $table->foreignId('creator_id')
                        ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
