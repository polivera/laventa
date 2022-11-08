<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class UserPassword implements InvokableRule, DataAwareRule
{
    protected $data = [];
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $isEdit = array_key_exists('id', $this->data);
        $noPassword = empty($value);

        if ($noPassword && !$isEdit) {
            return $fail('password is required');
        }

        if ($isEdit && !$noPassword && strlen($value) < 8) {
            return $fail('password must have more than 8 characters');
        }
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
