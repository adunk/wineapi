<?php namespace Wineapi\Forms;

use Laracasts\Validation\FormValidator;

class ProfileForm extends FormValidator {
  
  protected $rules = [
    'location' => 'required',
    'website'  => 'required',
    'bio'      => 'required',
  ];
  
}