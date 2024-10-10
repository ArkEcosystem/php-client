<?php

declare(strict_types=1);

namespace ArkEcosystem\Client\API;

class EVM extends AbstractAPI
{
    /**
     * Make an eth_call POST request to retrieve data from a contract.
     *
     * @param array $payload
     *
     * @return array|null
     */
    public function ethCall(array $payload): ?array
    {
        $body = [
            'jsonrpc' => '2.0',
            'method'  => 'eth_call',
            'params'  => [$payload, 'latest'],
            'id'      => null,
        ];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return $this->withApi('evm')->post('api/', $body, $headers);
    }
}
