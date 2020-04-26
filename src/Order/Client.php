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
     * 注册.
     *
     * @return HttpResponse
     */
    public function registerMerchant(array $payload = [])
    {
        return $this->post('api/merchant', $payload);
    }
}
