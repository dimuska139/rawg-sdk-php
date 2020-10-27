<?php

namespace Rawg\Resources;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Rawg\Config;
use Rawg\ApiException;
use Rawg\Response;

abstract class Resource
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var HttpClient $httpClient
     */
    protected $httpClient;

    /**
     * ApiClient constructor.
     * @param Config $config
     * @param HttpClient|null $httpClient
     */
    public function __construct(Config $config, HttpClient $httpClient = null)
    {
        $this->config = $config;
        $this->httpClient = $httpClient ?? new HttpClient();
    }

    /**
     * @param string $path
     * @param array $queryParams
     * @param array $headers
     * @return Response
     * @throws ApiException
     */
    protected function get(string $path, array $queryParams = [], array $headers = []): Response
    {
        $fullUrl = $this->config->getBaseUrl() . $path;

        $queryParams = array_filter($queryParams, function($item) {
            return !is_null($item);
        });

        $queryParams['key'] = $this->config->getApiKey();
        $queryParams['lang'] = $this->config->getLanguage();
        try {
            $response = $this->httpClient->request("GET", $fullUrl, [
                'query' => $queryParams,
                'headers' => $headers
            ]);
            return new Response($response);
        } catch (GuzzleException $exception) {
            throw new ApiException("Invalid API request: " . $exception->getMessage(), 0, $exception);
        }
    }
}