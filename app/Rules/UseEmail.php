<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class UseEmail implements InvokableRule, DataAwareRule
{
    protected $data = [];
    protected User $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

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
        if (array_key_exists('id', $this->data)) {
            $dbUser = $this->userModel->getByEmail($value);
            if ($dbUser && $dbUser->id != $this->data['id']) {
                $fail('email already in use.');
            }
        }
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
