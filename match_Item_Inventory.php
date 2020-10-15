<?php declare(strict_types=1);



require __DIR__ . '/vendor/autoload.php';


return function ($event){
    
    $order = json_decode($event->order);

    $inventory = json_decode($event->inventory);

    $items = $order->orderItems;
    $item_inventory_match = true;

    $format = "Y-m-d\TH:i:s.v\T";

    foreach($items as $item){
       
        $sku_idx = array_search($item->id,array_column($inventory,'id') );
        $sku = $inventory[$sku_idx];
        echo 'availability date'.$sku->availableFromDate;
        echo 'shipping date'.$order ->shippingDate;
        $availability_date = date_create_from_format($format,$sku->availableFromDate);
        $shipping_date = date_create_from_format($format,$order ->shippingDate);
        
        echo 'availability date'.$availability_date;
        echo 'shipping date'.$shipping_date;

        if(($sku->quantity < $item->quantity) || date_diff($shipping_date,$availability_date) < 0){
            $item_inventory_match = false;
        }

    }

    if($item_inventory_match = true){
        $order -> status = "processed";
    }
    return $order;
};
