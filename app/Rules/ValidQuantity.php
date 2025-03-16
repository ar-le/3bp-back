<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidQuantity implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     private $min, $max;
     public function __construct($min, $max){
        $this->max = $max;
        $this->min = $min;
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value < $this->min || $value > $this->max) $fail("The :attribute must be between {$this->min} and {$this->max}");
    }
}
