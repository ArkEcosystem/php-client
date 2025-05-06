<?php

declare(strict_types=1);

namespace ArkEcosystem\Client;

use ArkEcosystem\Client\API\ApiNodes;
use ArkEcosystem\Client\API\Blockchain;
use ArkEcosystem\Client\API\Blocks;
use ArkEcosystem\Client\API\Commits;
use ArkEcosystem\Client\API\Contracts;
use ArkEcosystem\Client\API\EVM;
use ArkEcosystem\Client\API\Node;
use ArkEcosystem\Client\API\Peers;
use ArkEcosystem\Client\API\Receipts;
use ArkEcosystem\Client\API\Rounds;
use ArkEcosystem\Client\API\Transactions;
use ArkEcosystem\Client\API\Validators;
use ArkEcosystem\Client\API\Votes;
use ArkEcosystem\Client\API\Wallets;
use GuzzleHttp\HandlerStack;

class ArkClient
{
    public Connection $connection;

    public function __construct(string|array $hostOrHosts, array $clientConfig = [], ?HandlerStack $handler = null)
    {
        $this->connection = new Connection($hostOrHosts, $clientConfig, $handler);
    }

    public function apiNodes(): ApiNodes
    {
        return new ApiNodes($this->connection);
    }

    public function blockchain(): Blockchain
    {
        return new Blockchain($this->connection);
    }

    public function blocks(): Blocks
    {
        return new Blocks($this->connection);
    }

    public function commits(): Commits
    {
        return new Commits($this->connection);
    }

    public function contracts(): Contracts
    {
        return new Contracts($this->connection);
    }

    public function evm(): EVM
    {
        return new EVM($this->connection);
    }

    public function node(): Node
    {
        return new Node($this->connection);
    }

    public function peers(): Peers
    {
        return new Peers($this->connection);
    }

    public function receipts(): Receipts
    {
        return new Receipts($this->connection);
    }

    public function rounds(): Rounds
    {
        return new Rounds($this->connection);
    }

    public function transactions(): Transactions
    {
        return new Transactions($this->connection);
    }

    public function validators(): Validators
    {
        return new Validators($this->connection);
    }

    public function votes(): Votes
    {
        return new Votes($this->connection);
    }

    public function wallets(): Wallets
    {
        return new Wallets($this->connection);
    }
}
