<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Ark Ecosystem <info@ark.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ArkEcosystem\Client\HttpClient\Plugin;

use Github\Exception\ErrorException;
use Github\Exception\RuntimeException;
use Github\Exception\ValidationFailedException;
use Github\HttpClient\Message\ResponseMediator;
use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * This is the exception thrower class.
 *
 * @author Brian Faust <brian@ark.io>
 */
class ExceptionThrower implements Plugin
{
    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        return $next($request)->then(function (ResponseInterface $response) use ($request) {
            if ($response->getStatusCode() < 400 || $response->getStatusCode() > 600) {
                return $response;
            }

            $content = ResponseMediator::getContent($response);

            if (is_array($content) && isset($content['message'])) {
                if (400 === $response->getStatusCode()) {
                    throw new ErrorException($content['message'], 400);
                }

                if (422 === $response->getStatusCode() && isset($content['errors'])) {
                    throw new ValidationFailedException(implode(', ', $content['errors']), 422);
                }
            }

            throw new RuntimeException(isset($content['message']) ? $content['message'] : $content, $response->getStatusCode());
        });
    }
}
