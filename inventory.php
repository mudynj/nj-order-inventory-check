<?php declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

require __DIR__ . '/vendor/autoload.php';


return function ($event,$context){
    
    // $order = json_encode($event);

    // $item_id = $order->id;
    // echo 'Running inventory check for = '. $item_id;

    $client = new Client([
        // You can set any number of default request options.
        'timeout'  => 2.0
    ]);

    $response = $client->get('https://5f591c568040620016ab8de2.mockapi.io/api/v1/warehouse-items') ;
    $inventory = \GuzzleHttp\json_decode((string)$response->getBody(), true);

    return  $inventory;
};