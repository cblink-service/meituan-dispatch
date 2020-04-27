<?php

namespace Cblink\Service\Meituan\Dispatch\Tests\Traits;

use Cblink\Service\Kennel\HttpResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamIUnknownIdentifierExceptionnterface;

/**
 * Trait GetPsrResponse
 * @package Cblink\Service\Meituan\Dispatch\Tests\Traits
 */
trait GetPsrResponse
{
    /**
     * @param $data
     * @return \Mockery\LegacyMockInterface|\Mockery\MockInterface|ResponseInterface
     */
    protected function getPsrResponse(array $data = [])
    {
        $stream = \Mockery::mock(StreamInterface::class);
        $stream->allows()->getContents()->andReturn(json_encode(['err_code' => 0, 'data' => $data]));

        $response = \Mockery::mock(ResponseInterface::class);
        $response->allows()->getStatusCode()->andReturn(200);
        $response->allows()->getBody()->andReturn($stream);
        $response->allows()->getHeaders()->andReturn([]);

        return $response;
    }

    /**
     * @param array $data
     * @return HttpResponse
     */
    protected function getHttpResponse(array $data = [])
    {
        $response = new HttpResponse($this->getPsrResponse());

        return $response;
    }
}
