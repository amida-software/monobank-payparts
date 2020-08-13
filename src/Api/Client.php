<?php

namespace Monobank\PayParts\Api;

use Monobank\PayParts\Api;

class Client extends Api
{
    const API_URL_VALIDATE_CLIENT = 'api/client/validate';

    public function validate(string $telephone)
    {
        $this->validateTelephone($telephone);

        return $this->send([
            'phone' => $telephone
        ], self::API_URL_VALIDATE_CLIENT);
    }

    protected function validateTelephone(string $telephone)
    {
        $this->validator()->validate(
            ['telephone' => $telephone],
            $this->rule()->getCustomerValidateRules(),
            $this->rule()->getCustomerValidateMessages()
        );
    }
}