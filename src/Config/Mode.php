<?php

namespace Monobank\PayParts\Config;

interface Mode
{
    public function getApiUrl(): string;
    public function getSecret(): string;
    public function getStoreId(): string;
}