<?php declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

require __DIR__ . '/vendor/autoload.php';


return function ($event){
    
    $order = $event;

    $order -> status = "processed";

    $base_uri = 'https://5f591c568040620016ab8de2.mockapi.io/api/v1/orders/';

    $final_uri = $base_uri . $order["id"];

    $client = new Client([
        // You can set any number of default request options.
        'timeout'  => 2.0,
    ]);
    
    $str_order = json_encode($order);

    
    $response = $client ->request('PUT',  $final_uri ,['body' => $str_order]);

    return $response -> getStatusCode();
};

