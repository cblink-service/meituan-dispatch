<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Meituan\Dispatch\Tests;

use Cblink\Service\Meituan\Dispatch\Merchant\Client;
use Cblink\Service\Meituan\Dispatch\Tests\Traits\GetPsrResponse;

class TestMerchant extends TestBaseCase
{
    use GetPsrResponse;
    /**
     * 创建商户信息
     */
    public function testMerchant()
    {
        // 参数
        $data = [
            'name' => 'test',
            'app_key' => 'test',
            'secret' => 'test',
            'callback_status_url' => 'http://test.net',
            'callback_error_url' => 'http://test.net',
            'callback_scope_url' => 'http://test.net',
            'callback_risk_url' => 'http://test.net',
            'callback_shop_url' => 'http://test.net',
        ];

        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->registerDispatch($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('merchant', $client)
            ->merchant
            ->registerDispatch($data);

        $this->assertSame(0, $res->errCode());
    }
}
