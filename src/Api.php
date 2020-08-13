<?php

namespace Monobank\PayParts;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;
use Monobank\PayParts\Validation\SupportValidator;

abstract class Api
{
    use SupportValidator;

    protected $config = null;
    protected $client = null;

    public function __construct(Config $config, ClientInterface $client = null)
    {
        $this->config = $config;
        $this->client = $client ?? new Client();
    }

    protected function getHeaders(string $signature): array
    {
        return [
            'store-id' => $this->config->getStoreId(),
            'signature' => $this->config->getSignature($signature),
            'Content-Type' => 'application/json;charset=UTF-8'
        ];
    }

    protected function send(array $body, string $url)
    {
        $body = json_encode($body);

        return $this->client->post($this->config->getApiUrl($url), [
            'body' => $body,
            'headers' => $this->getHeaders($body)
        ]);
    }
}