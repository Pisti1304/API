<?php
    $url='http://localhost/API_GETPOSTPATCHDELETE/API/Api.php';

    $data = [
        'name'=> 'New Product',
        'price'=> 19.99,
        'description'=> 'This is a new product description: prod5 car cleaner'
    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content_Type: application/json']);

    $response=  curl_exec($ch);
    curl_close($ch);
    echo $response;
?>