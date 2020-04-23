<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace CblinkService\MeituanDispatchService;

use Cblink\Service\Kennel\ServiceContainer;

class MeituanDispathService extends ServiceContainer
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
        ];
    }
}
