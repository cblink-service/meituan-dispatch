<h1 align="center"> /meituan-dispatch-service </h1>

<p align="center"> 主要用户 Cblink 美团配送服务平台请求的SDK.</p>


## Installing

```shell
$ composer require cblinkservice//meituan-dispatch-service -vvv
```

## Usage
   #### 美团关联门店创建
	$data = [
            "AppId" => "123",
            "secret"=>"test",
	        "app_key"=>"test",
            "delivery_id" => 169736,
            "order_id" => 169736,
            "poi_seq" => 40101,
            "shop_id" => "test_0001",
            "delivery_service_code" => 4011,
            "receiver_name" => "test",
            "receiver_address" => "深圳",
            "receiver_phone" => 13944702732,
            "receiver_lng" => "116427694",
            "receiver_lat" => 39902779,
            "goods_value" => "100",
            "goods_weight" => 1,
            "goods_detail" => "",
        ];

        $config = [
            // 配置信息
            'private' => true,
            'base_url' => 'http://test.com',
            'app_id' => '123',
            'key' => 'test',
            'secret' => 'test',
            'uuid' => ''
        ];
        
        $result = (new MeituanDispathService($config))->order->createShopOrder($data); 
        
   ### 创建商户信息
        $data = [
                    'name' => 'test',
                    'app_key' => 'test',
                    'secret' => 'test',
                    'callback_status_url' => 'http://my.erp.cblink.test/api/hook/meituan/general/dispatch/status',
                    'callback_error_url' => 'http://my.erp.cblink.test/api/hook/meituan/general/dispatch/exception',
                    'callback_scope_url' => '',
                    'callback_risk_url' => '',
                    'callback_shop_url' => '',
                ];
        
                $config = [
                    // 配置信息
                    'private' => true,
                    'base_url' => 'http://meituan-dispatch.erp.cblink.test/',
                    'app_id' => '45799194',
                    'key' => 'kK4xEVJk4N',
                    'secret' => 'NLkhKSnLIbMSJuHQyiBKMgU3Pk5Sua',
                    'uuid' => ''
                ];
        
	    $result = (new MeituanDispath($config))->order->registerMerchant($data);
TODO

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/cblinkservice//meituan-dispatch-service/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/cblinkservice//meituan-dispatch-service/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
