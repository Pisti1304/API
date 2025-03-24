<?php
    $url='http://localhost/API_GETPOSTPATCHDELETE/API/Api.php';

    $productId= 5;
    $data = [
        'id'=> $productId

    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content_Type: application/json']);

    $response=  curl_exec($ch);
    curl_close($ch);
    echo $response;
?>