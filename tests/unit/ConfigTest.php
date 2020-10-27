<?php

use Codeception\Test\Unit;
use Rawg\Config;

class ConfigTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testInit()
    {
        $lang = 'ru';
        $apiKey = "key";
        $cfg = new Config($apiKey, $lang);
        $this->assertEquals($lang, $cfg->getLanguage());
        $this->assertEquals($apiKey, $cfg->getApiKey());
        $this->assertEquals('https://api.rawg.io/api', $cfg->getBaseUrl());
    }

    public function testDefaultLang()
    {
        $apiKey = "key";
        $cfg = new Config($apiKey);
        $this->assertEquals('en', $cfg->getLanguage());
    }
}
