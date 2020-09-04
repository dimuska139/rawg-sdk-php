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
        $appName = 'MyApp';
        $cfg = new Config($appName, $lang);
        $this->assertEquals($lang, $cfg->getLanguage());
        $this->assertEquals($appName, $cfg->getAppName());
        $this->assertEquals('https://api.rawg.io/api', $cfg->getBaseUrl());
    }

    public function testDefaultLang()
    {
        $appName = 'MyApp';
        $cfg = new Config($appName);
        $this->assertEquals('en', $cfg->getLanguage());
    }
}
