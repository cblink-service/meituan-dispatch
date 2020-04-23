<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace CblinkService\MeituanDispatchService\Tests;

use CblinkService\MeituanDispatchService\Order\Client;
use PHPUnit\Framework\TestCase;

class TestOrder extends TestCase
{
    /**
     * 创建门店关联订单
     */
    public function testOrderShopCreate()
    {
        $dispatchService = \Mockery::mock(Client::class);

        $dispatchService->expects()->createShopOrder()->andReturn([
            'code',
            'data' => [
                'mt_peisong_id',
                'delivery_id',
                'order_id',
            ],
        ]);

        $this->assertSame([
          'code',
          'data' => [
              'mt_peisong_id',
              'delivery_id',
              'order_id',
          ],
      ], $dispatchService->createShopOrder());
    }

    /**
     * 创建商户信息
     */
    public function testMerchant()
    {
        $dispatchService = \Mockery::mock(Client::class);

        $dispatchService->expects()->registerMerchant()->andReturn([
            'code',
            'data',
        ]);

        $this->assertSame([
            'code',
            'data',
        ], $dispatchService->registerMerchant());
    }
}
