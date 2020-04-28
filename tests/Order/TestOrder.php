<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Meituan\Dispatch\Tests\Order;

use Cblink\Service\Meituan\Dispatch\Order\Client;
use Cblink\Service\Meituan\Dispatch\Tests\TestBaseCase;
use Cblink\Service\Meituan\Dispatch\Tests\Traits\GetPsrResponse;

class TestOrder extends TestBaseCase
{
    use GetPsrResponse;
    /**
     * 创建门店关联订单
     */
    public function testOrderShopCreate()
    {
        // 参数
        $data = [
            'uuid' => '1',
            'delivery_id' => 1,
            'order_id' => 1,
            'poi_seq' => 40101,
            'shop_id' => 'test_0001',
            'delivery_service_code'=> 4011,
            'receiver_name' => 'test',
            'receiver_address' => '深圳',
            'receiver_phone' => '13900000000',
            'receiver_lng' => 116427694,
            'receiver_lat' => 39902779,
            'goods_value' => '100',
            'goods_weight' => 1,
            'goods_detail' => \json_encode([
                'goods' => [
                    [
                        'goodCount' => 1,
                        'goodName' => 'test'
                    ]

                ]
            ])

        ];

        // 模拟类
        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->createByShop($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('order', $client)
            ->order
            ->createByShop($data);

        $this->assertSame(0, $res->errCode());
    }

    /**
     * 取消订单
     */
    public function testCancel()
    {
        // 参数
        $data = [
            "mt_peisong_id" => 1,   // 美团 订单id
            "delivery_id" => 1,     // 美团订单活动 id 也就是第三方 id
            'uuid' => '1',
            'cancel_reason_id'=> 101,
            'cancel_reason' => '理由'
        ];

        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->cancel($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('order', $client)
            ->order
            ->cancel($data);

        $this->assertSame(0, $res->errCode());
    }

    /**
     * 配送范围校验
     */
    public function testOrderCheck()
    {
        // 参数
        $data = [
            'shop_id' => 'test_0001',
            'delivery_service_code' => '4011',
            'receiver_address' => '深圳',
            'receiver_lng' => '116427694',
            'receiver_lat' => '39902779',
            'check_type' => 1,
            'mock_order_time' => time(),
            'uuid' => '1'
        ];


        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->orderCheck($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('order', $client)
            ->order
            ->orderCheck($data);

        $this->assertSame(0, $res->errCode());
    }

    /**
     * 校验骑手位置
     */
    public function testLocation()
    {
        // 参数
        $data = [
            'mt_peisong_id' => 1,   // 美团订单 id
            'delivery_id' => 1,     // 第三方订单 id
            'uuid' => '1',
        ];


        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->location($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('order', $client)
            ->order
            ->location($data);

        $this->assertSame(0, $res->errCode());
    }

    /**
     * 评价骑手
     */
    public function testEvaluate()
    {
        $data = [
            'mt_peisong_id' => 1,   //美团订单 id
            'delivery_id' => 1,     // 第三方订单 id
            'score' => '5', // 评分（5分制）
            'comment_content' => '很好',  // 评论内容（评论的字符长度需小于1024）
            'uuid' => '1',
        ];

        $client = \Mockery::mock(Client::class, [$this->getApp()]);

        $client->allows()
            ->evaluate($data)
            ->andReturn(
                $this->getHttpResponse([])
            );

        $res = $this->rebindAppClient('order', $client)
            ->order
            ->evaluate($data);

        $this->assertSame(0, $res->errCode());
    }
}
