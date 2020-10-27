<?php

namespace Rawg;

/**
 * Class Config
 */
class Config
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://api.rawg.io/api';

    /**
     * @var string
     */
    protected $language = 'en';

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * Config constructor.
     * @param string $apiKey
     * @param string|null $language
     */
    public function __construct(string $apiKey, string $language = null)
    {
        $this->apiKey = $apiKey;
        if ($language) {
            $this->language = $language;
        }
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
}