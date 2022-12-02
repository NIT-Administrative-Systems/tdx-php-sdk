<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client;

use DateTime;
use DateTimeInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\RateLimit;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

abstract class TdxClient
{
    protected ApiConfiguration $config;

    protected Client $httpClient;

    protected ?UnencryptedToken $authToken;

    public function __construct(
        ApiConfiguration $config,
        Client $httpClient,
        UnencryptedToken $authToken,
    ) {
        $this->config = $config;
        $this->httpClient = $httpClient;
        $this->authToken = $authToken;
    }

    /**
     * API client configuration.
     */
    public function config(): ApiConfiguration
    {
        return $this->config;
    }

    protected function url(string $path, array $urlParams = []): string
    {
        $url = sprintf('%s/%s', $this->config->baseUrl, ltrim($path, '/'));

        if (count($urlParams)) {
            $urlParams = collect($urlParams)
                ->mapWithKeys(fn (mixed $value, mixed $key) => [$key => urlencode($value)])
                ->map(fn (mixed $value, mixed $key) => "$key=$value")
                ->join('&');

            $url .= '?'.$urlParams;
        }

        return $url;
    }

    protected function get(string $path, array $urlParameters = []): Response
    {
        return $this->jsonCall('GET', $path, payload: null, urlParameters: $urlParameters);
    }

    protected function post(string $path, ?array $payload, array $urlParameters = []): Response
    {
        return $this->jsonCall('POST', $path, $payload, $urlParameters);
    }

    protected function put(string $path, ?array $payload, array $urlParameters = []): Response
    {
        return $this->jsonCall('PUT', $path, $payload, $urlParameters);
    }

    protected function delete(string $path, ?array $payload, array $urlParameters = []): Response
    {
        return $this->jsonCall('DELETE', $path, $payload, $urlParameters);
    }

    private function jsonCall(string $method, string $path, ?array $payload, array $urlParameters = []): Response
    {
        $url = $this->url($path, $urlParameters);

        $auth = [];
        if ($this->authToken) {
            $auth['Authorization'] = sprintf('Bearer %s', $this->authToken->toString());
        }

        $options = [
            'headers' => [
                'Accept' => 'application/json',
                ...$auth,
            ],
            'json' => $payload,
            'http_errors' => false, // don't throw!
        ];

        $response = $this->httpClient->request($method, $url, $options);

        // @TODO: Error handling?

        $resetAt = Arr::first($response->getHeader('X-RateLimit-Reset'));

        $resetAtDatetime = new DateTime();
        if ($resetAt) {
            $resetAtDatetime = DateTime::createFromFormat(DateTimeInterface::RFC1123, $resetAt);
        }

        return new Response(
            $url,
            new RateLimit(
                remaining: (int) Arr::first($response->getHeader('X-RateLimit-Remaining')),
                limit: (int) Arr::first($response->getHeader('X-RateLimit-Limit')),
                resetAt: $resetAtDatetime,
            ),
            $response->getBody()->getContents(),
        );
    }
}
