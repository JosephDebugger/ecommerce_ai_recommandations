<?php

namespace App\Traits;
use App\Models\Customer;

trait createCustomer
{
    //
    public function addCustomer(array $data)
    {
        Customer::create($data);
    }
}
