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
    public function evmCall(array $payload): ?array
    {
        $body = [
            'jsonrpc' => '2.0',
            ...$payload,
        ];

        $headers = [
            'Content-Type' => 'application/json',
        ];

        return $this->withApi('evm')
            ->requestPost('api/', $body, $headers);
    }
}
