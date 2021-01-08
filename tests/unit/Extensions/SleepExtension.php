<?php


namespace Rawg\Tests\Extensions;


use Codeception\Event\TestEvent;
use Codeception\Events;
use Codeception\Extension;

class SleepExtension extends Extension
{
    /**
     * @var string[]
     */
    public static $events = [
        Events::TEST_AFTER => 'afterTest',
    ];

    /**
     * @param TestEvent $e
     */
    public function afterTest(TestEvent $e) {
        usleep(200000); // Waiting 200 ms to perform 5 rps limitation
    }
}