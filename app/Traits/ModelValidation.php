<?php

namespace App\Traits;

use Validator;

trait ModelValidation
{
    public function isValid()
    {
        $values = [];

        foreach ($this->rules as $prop => $_) {
            $values[$prop] = $this->$prop;
        }

        $validator = Validator::make($values, $this->rules);

        return $validator->passes();
    }
}
