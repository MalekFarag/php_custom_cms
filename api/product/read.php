<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../objects/product.php';

// instantiate database and movie object
$db       = Database::getInstance()->getConnection();

// initialize object
$prod = new Product($db);

// query movies
if (isset($_GET['id'])) {
    $stmt = $prod->getProdsByID($_GET['id']);
} else if(isset($_GET['category'])){
    $stmt = $prod->getProdsByCategory($_GET['category']);
}else {
    $stmt = $prod->getProds();
}

$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // movies array
    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $single_prod = $row;
        $results[]    = $single_prod;
    }

    //TODO:chat about JSON_PRETTY_PRINT vs not
    // echo json_encode($results, JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array(
            "message" => "No movies found.",
        )
    );
}