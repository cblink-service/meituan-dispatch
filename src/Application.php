<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\Service\Meituan\Dispatch;

use Cblink\Service\Kennel\ServiceContainer;

/**
 * Class Application
 * @property Order\Client $order
 */
class Application extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://api.service.cblink.net/meituan-dispatch/';

    /**
     * {@inheritdoc}
     */
    protected function getCustomProviders(): array
    {
        return [
            Order\ServiceProvider::class,
            Shop\ServiceProvider::class,
        ];
    }
}
