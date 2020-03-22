<?php

function createProd($name, $description, $price, $category, $image){
    
    $pdo = Database::getInstance()->getConnection();

     // check product existance
     $check_prod_query = 'SELECT COUNT(name) AS num FROM tbl_products WHERE name = :name'; 
     $prod_set = $pdo->prepare($check_prod_query);
     $prod_set->execute(
         array(
             ':name'=>$name
         )
     );
 
     $row = $prod_set->fetch(PDO::FETCH_ASSOC);

     if($row['num'] > 0){
        $message = 'this product already exists...';
    }else{
        //creating number for product
        $prodNum = random_int(111111111111, 999999999999); 

            //creating user sql query from form details
            $create_prod_query = "INSERT INTO tbl_products (user_id, name, description, price, category, image, prod_number) VALUES (NULL, :name, :desc, :price, :category, :image, :prodNum);";

            $user_signup = $pdo->prepare($create_prod_query);
            $user_signup->execute(
                array(
                    ':name'=>$name,
                    ':desc'=>$description,
                    ':price'=>$price,
                    ':category'=>$category,
                    ':image'=>$image,
                    ':prodNum'=>$prodNum
                )
            );
            redirect_to('index.php');
            $message = 'created product';
    }
}




function editProduct($id, $name, $price, $description){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: Run the proper SQL query to update tbl_prod with proper values
    $update_prod_query = 'UPDATE tbl_products SET name = :name, price = :price, description = :description WHERE prod_id = :id';
    $update_prod_set = $pdo->prepare($update_prod_query);
    $update_prod_result = $update_prod_set->execute(
        array(
            ':name'=>$name,
            ':price'=>$price,
            ':description'=>$description,
            ':id'=>$id
        )
    );


    //TODO: if everything goes well, redirect user to index.php
    // Otherwise, return some error message...
    if($update_prod_result){
        redirect_to('index.php');
    }else{
        return 'Guess you got canned...';
    }
}