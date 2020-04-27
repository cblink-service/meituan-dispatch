<?php

namespace Cblink\Service\Meituan\Dispatch\Tests;

use Closure;
use PHPUnit\Framework\TestCase;
use Cblink\Service\Meituan\Dispatch\Application;

class TestBaseCase extends TestCase
{
    /**
     * @var Application
     */
    protected $application;

    protected function setUp(): void
    {
        $config = [
            // 配置信息
            'private' => true,
            'base_url' => 'http://127.0.0.1//',
            'app_id' => 1,
            'key' => 'test',
            'secret' => 'test',
            'uuid' => ''
        ];

        if (file_exists($fileName = $this->basePath('./base.php'))) {
            $config = include $fileName;
        }

        $this->application = new Application($config);
    }

    /**
     * @param $path
     * @return string
     */
    public function basePath($path = '')
    {
        return __DIR__ . '/../' . $path;
    }

    /**
     * @param $name
     * @param $rebind
     * @return Application
     */
    public function rebindAppClient($name, $rebind)
    {
        if (!($rebind instanceof Closure)) {
            $rebind = function () use ($rebind) {
                return $rebind;
            };
        }

        $this->application->rebind($name, $rebind);

        return $this->application;
    }

    /**
     * @return Application
     */
    public function getApp()
    {
        return $this->application;
    }

    protected function tearDown(): void
    {
        \Mockery::close();
    }
}
