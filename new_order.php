<?php declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

require __DIR__ . '/vendor/autoload.php';


return function ($event){

    $client = new Client([
        'timeout'  => 2.0
    ]);

    $response = $client->get('https://5f591c568040620016ab8de2.mockapi.io/api/v1/orders') ;
    $orders = \GuzzleHttp\json_decode((string)$response->getBody(), true);
    

    $new_orders = array_filter($orders ,function($order){
        return $order["status"] == "new";
    });
    
    if (count($new_orders) == 0){
        return "No Orders";
    };

    return $new_orders;
};

