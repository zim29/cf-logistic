<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {
        return [
            'person_type_id' => \App\Models\PersonType::InRandomOrder()->first()->id,
            'full_name' => $this->faker->name,
            'business_name' => $this->faker->company,
            'tax_identification_number' => $this->faker->ean8,
            'tax_registration' => $this->faker->ean13,
            'constitution_location' => $this->faker->address,
            'constitution_date' => $this->faker->date,
            'registration_number' => $this->faker->randomNumber,
            'registration_book' => $this->faker->randomLetter,
            'registration_pages' => $this->faker->randomNumber,
            'address' => $this->faker->address,
            'primary_contact' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'email' => $this->faker->unique()->safeEmail,
            'corporate_group' => $this->faker->word,
            'group_origin_country' => $this->faker->country,
            'legal_representative_name' => $this->faker->name,
            'legal_representative_birthplace' => $this->faker->country,
            'legal_representative_birthdate' => $this->faker->date,
            'legal_representative_id_type' => $this->faker->word,
            'legal_representative_id_number' => $this->faker->randomNumber,
            'legal_representative_nationality' => $this->faker->country,
            'legal_representative_tax_id' => $this->faker->ean13,
            'legal_representative_email' => $this->faker->unique()->safeEmail,
            'board_members' => $this->faker->text,
            'major_shareholders' => $this->faker->text,
            'politically_exposed_person' => $this->faker->boolean,
            'source_of_funds' => $this->faker->text,
            'monthly_billing_estimate' => $this->faker->randomNumber,
            'funds_deposited_safe_health' => $this->faker->text,
            'economic_activity' => $this->faker->word,
            'operation_date' => $this->faker->date,
            'estimated_annual_income' => $this->faker->randomNumber,
            'number_of_employees' => $this->faker->randomNumber,
            'tax_classification_id' => \App\Models\TaxClassification::InRandomOrder()->first()->id,
            'anti_money_laundering_policy' => $this->faker->boolean,
            'geographic_zones' => $this->faker->text,
            'commercial_references' => $this->faker->text,
            'bank_references' => $this->faker->text,
        ];
    }
}
