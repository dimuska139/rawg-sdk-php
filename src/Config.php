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
    protected $appName;

    /**
     * Config constructor.
     * @param string $appName
     * @param string|null $language
     */
    public function __construct(string $appName, string $language = null)
    {
        $this->appName = $appName;
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
    public function getAppName(): string
    {
        return $this->appName;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
}