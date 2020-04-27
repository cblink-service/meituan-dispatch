<?php

namespace Cblink\Service\Meituan\Dispatch\Merchant;

use Cblink\Service\Kennel\AbstractApi;

/**
 * Class Client
 * @package Cblink\Service\Meituan\Dispatch\Shop
 */
class Client extends AbstractApi
{
    /**
     * 注册美团配送服务
     *
     * @return \Cblink\Service\Kennel\HttpResponse
     */
    public function registerDispatch(array $payload = [])
    {
        return $this->post('api/merchant/dispatch', $payload);
    }
}
