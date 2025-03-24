<?php

require_once 'dbcontroller.php';

header("Content-Type: application/json");
header("Access-Control_Allow-Origin: *");
header("Acces-Control-Allow-Methods: GET,POST,PATCH,DELETE,OPTIONS");
header("Acces-Control-Allow-Headers:  Content-Type");

$db = new DBController();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $product = $db->executeSelectQuery("SELECT * FROM products");
        echo json_encode($product,JSON_UNESCAPED_UNICODE);
        break;
    case 'Post': 
        $data = json_decode(file_get_contents("php//:input"),true);
        $query="INSERT INTO product(name,price,description) VALUES(?,?,?)";
        $db->executeSelectQuery($query,[$data['name'],$data['price'],$data['description']]);
        echo json_encode(["message"=>"Product created"]);
        break;
    case 'Patch':
        $data = json_decode(file_get_contents("php//:input"),true);
        $query="UPDATE products SET name=?,price=?,description=? WHERE id=?";
        $db->executeSelectQuery($query,[$data['name'],$data['price'],$data['description'],$data['id']]);
        echo json_encode(["message"=>"Product Updated"]);
        break;
    case 'DELETE': 
        $data = json_decode(file_get_contents("php//:input"),true);
        $query="DELETE FROM  products WHERE id=?";
        $db->executeSelectQuery($query,[$data['id']]);
        echo json_encode(["message"=>"Product Deleted"]);
        break;
    default:
        echo json_encode(["message"=> "Method not supported"]);



}

?>


