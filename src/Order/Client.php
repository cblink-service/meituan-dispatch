<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace CblinkService\MeituanDispatchService\Order;

use Cblink\Service\Kennel\AbstractApi;

class Client extends AbstractApi
{
    /**
     * 创建门店关联订单.
     *
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function createShopOrder(array $payload = [])
    {
        return $this->post('api/order/create-shop', $payload);
    }

    /**
     * 取消订单.
     *
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function destroyShopOrder(array $payload = [])
    {
        return $this->post('api/order/destroy', $payload);
    }

    /**
     * 注册.
     *
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function registerMerchant(array $payload = [])
    {
        return $this->post('api/merchant', $payload);
    }
}
