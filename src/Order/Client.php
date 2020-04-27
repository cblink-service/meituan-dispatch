<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Meituan\Dispatch\Order;

use Cblink\Service\Kennel\AbstractApi;
use Cblink\Service\Kennel\HttpResponse;

class Client extends AbstractApi
{
    /**
     * 创建门店关联订单.
     *
     * @see https://peisong.meituan.com/open/doc#section2-1
     *
     * @param array $payload
     * @return HttpResponse
     */
    public function createByShop(array $payload = [])
    {
        return $this->post('api/order/create-shop', $payload);
    }

    /**
     * 取消订单.
     *
     * @param array $payload
     * @return HttpResponse
     */
    public function cancel(array $payload = [])
    {
        return $this->post('api/order/destroy', $payload);
    }

    /**
     * 订单配送校验
     *
     * @param array $payload
     * @return HttpResponse
     */
    public function orderCheck(array $payload = [])
    {
        return $this->post('api/order/check', $payload);
    }

    /**
     * 骑手位置
     *
     * @param array $payload
     * @return HttpResponse
     */
    public function location(array $payload = [])
    {
        return $this->post('api/order/location', $payload);
    }

    /**
     * 评价骑手
     *
     * @param array $payload
     * @return HttpResponse
     */
    public function evaluate(array $payload = [])
    {
        return $this->post('api/order/evaluate', $payload);
    }
}
