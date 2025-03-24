<?php
require_once 'dbcontroller.php';


header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$db=new DBController();
//globális $_SERVER "kért" metódusát...
$method =$_SERVER['REQUEST_METHOD'];

switch($method)
{
    case 'GET': //READ-et jelent
        //lekérdezés futtatás
        $product=$db->executeSelectQuery("SELECT * from products");
        //ékezetes betűk miatti megjelenítés
        echo json_encode($product, JSON_UNESCAPED_UNICODE);
        break;
   
    case 'POST': //CREATET jelent
        $data= json_decode(file_get_contents("php://input"), true);
        $query="INSERT INTO products (name, price, description) VALUES (?, ?, ?)";
        $db->executeSelectQuery($query, [$data['name'], $data['price'], $data['description']]);
        echo json_encode(["message"=>"Product created"]);
        break;
   
    case 'PATCH': //UPDATE-t jelent
        $data= json_decode(file_get_contents("php://input"), true);
        $query="UPDATE products SET name=?, price=?, description=? WHERE id=?";
        $db->executeSelectQuery($query, [$data['name'], $data['price'], $data['description'], $data['id']]);
        echo json_encode(["message"=>"Product updated"]);
        break;


    case 'DELETE': //DELETE
        $data= json_decode(file_get_contents("php://input"), true);
        $query="DELETE FROM products WHERE id=?";
        $db->executeSelectQuery($query,  [$data['id']]);
        echo json_encode(["message"=>"Product deleted"]);
        break;
    default:
        echo json_encode(["message" => "Methos not supported"]);
        break;

}