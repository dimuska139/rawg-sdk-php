<?php

namespace Rawg;

use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var ResponseInterface
     */
    protected $resp;

    /**
     * Response constructor.
     * @param ResponseInterface $resp
     */
    public function __construct(ResponseInterface $resp)
    {
        $this->resp = $resp;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return json_decode($this->resp->getBody(), true);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->resp;
    }
}