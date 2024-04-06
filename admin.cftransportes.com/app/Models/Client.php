<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_type_id',
        'full_name',
        'business_name',
        'tax_identification_number',
        'tax_registration',
        'constitution_location',
        'constitution_date',
        'registration_number',
        'registration_book',
        'registration_pages',
        'address',
        'primary_contact',
        'phone',
        'website',
        'email',
        'corporate_group',
        'group_origin_country',
        'legal_representative_name',
        'legal_representative_birthplace',
        'legal_representative_birthdate',
        'legal_representative_id_type',
        'legal_representative_id_number',
        'legal_representative_nationality',
        'legal_representative_tax_id',
        'legal_representative_email',
        'board_members',
        'major_shareholders',
        'politically_exposed_person',
        'source_of_funds',
        'monthly_billing_estimate',
        'funds_deposited_safe_health',
        'economic_activity',
        'operation_date',
        'estimated_annual_income',
        'number_of_employees',
        'tax_classification_id',
        'anti_money_laundering_policy',
        'geographic_zones',
        'commercial_references',
        'bank_references',
    ];

    public function personType()
    {
        return $this->belongsTo(PersonType::class);
    }

    public function taxClassification()
    {
        return $this->belongsTo(TaxClassification::class);
    }
}
