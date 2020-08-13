<?php

namespace Monobank\PayParts\Config\Mode;

use Monobank\PayParts\Config\Mode;

class Production implements Mode
{
    const API_URL = 'https://u2.monobank.com.ua';

    private $storeId = null;
    private $secret = null;

    public function __construct(string $storeId, string $secret)
    {
        $this->storeId = $storeId;
        $this->secret = $secret;
    }

    final public function getApiUrl(): string
    {
        return self::API_URL;
    }

    public function getStoreId(): string
    {
        return $this->storeId;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }
}