<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

abstract class BaseModel extends Model
{
    protected $rules = [];

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
