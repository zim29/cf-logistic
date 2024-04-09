<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ClientEditForm extends Form
{   
    #[Validate('required|exists:person_types,id')]
    public $person_type_id = '';
    #[Validate('required')]
    public $full_name;
    #[Validate('required')]
    public $business_name;
    #[Validate('required')]
    public $tax_identification_number;
    #[Validate('required')]
    public $tax_registration;
    #[Validate('required')]
    public $constitution_location;
    #[Validate('required')]
    public $constitution_date;
    #[Validate('required')]
    public $registration_number;
    #[Validate('required')]
    public $registration_book;
    #[Validate('required')]
    public $registration_pages;
    #[Validate('required')]
    public $address;
    #[Validate('required')]
    public $primary_contact;
    #[Validate('required')]
    public $phone;
    #[Validate('required')]
    public $website;
    #[Validate('required')]
    public $email;
    #[Validate('required|boolean')]
    public $corporate_group;
    #[Validate('required')]
    public $group_origin_country;
    #[Validate('required')]
    public $legal_representative_name;
    #[Validate('required')]
    public $legal_representative_birthplace;
    #[Validate('required')]
    public $legal_representative_birthdate;
    #[Validate('required')]
    public $legal_representative_id_type;
    #[Validate('required')]
    public $legal_representative_id_number;
    #[Validate('required')]
    public $legal_representative_nationality;
    #[Validate('required')]
    public $legal_representative_tax_id;
    #[Validate('required')]
    public $legal_representative_email;
    #[Validate('required')]
    public $board_members;
    #[Validate('required')]
    public $major_shareholders;
    #[Validate('required|boolean')]
    public $politically_exposed_person;
    #[Validate('required')]
    public $source_of_funds;
    #[Validate('required')]
    public $monthly_billing_estimate;
    #[Validate('required')]
    public $funds_deposited_safe_health;
    #[Validate('required')]
    public $economic_activity;
    #[Validate('required')]
    public $operation_date;
    #[Validate('required')]
    public $estimated_annual_income;
    #[Validate('required')]
    public $number_of_employees;
    #[Validate('required|exists:tax_classifications,id|')]
    public $tax_classification_id = '';
    #[Validate('required|boolean')]
    public $anti_money_laundering_policy;
    #[Validate('required')]
    public $geographic_zones;
    #[Validate('required')]
    public $commercial_references;
    #[Validate('required')]
    public $bank_references;

    #[Validate('required|boolean')]
    public $status;
}