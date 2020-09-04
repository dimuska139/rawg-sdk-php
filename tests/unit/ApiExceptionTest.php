<?php

use Codeception\Test\Unit;
use Rawg\ApiException;

class ApiExceptionTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testApiException()
    {
        $this->tester->expectThrowable(ApiException::class, function() {
            throw new ApiException();
        });
    }
}
