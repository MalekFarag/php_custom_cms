<?php

function createProd($product){

    try{
        $pdo = Database::getInstance()->getConnection();

            $image = $product['image'];
            $upload_file = pathinfo($image['name']);
            $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
            if(!in_array($upload_file['extension'], $accepted_types)){
                throw new Exception('Wrong file type...');
            }

            //creating product number
            $prodNum = random_int(111111111111, 999999999999);

            $image_path = '../images/';
            
            //changing file name
            $generated_name = md5($upload_file['filename'].time());
            $generated_filename = $generated_name.'.'.$upload_file['extension'];
            $targetPath = $image_path.$generated_filename;

            
            if(!move_uploaded_file($image['tmp_name'], $targetPath)){
                throw new Exception('failed to move uploaded file, check permissions');
            }

            $insert_prod_query = 'INSERT INTO tbl_products (prod_number, image, name, description, price, category) VALUES (:pnum, :image, :name, :desc, :price, :category)';
            $insert_prod_set = $pdo->prepare($insert_prod_query);
            $insert_prod_result = $insert_prod_set->execute(
                array(
                    ':pnum'=> $prodNum,
                    ':image'=> $generated_filename,
                    ':name'=> $product['name'],
                    ':desc'=> $product['description'],
                    ':price'=> $product['price'],
                    ':category'-> $product['category'],
                )
            );

            $last_uploaded_id = $pdo->lastInsertId();
            if($insert_prod_result && !empty($last_uploaded_id)){
                $update_category_query = 'INSERT INTO tbl_prod_category (prod_id, category_id) VALUES (:prodid, :catid)';
                $update_category_set = $pdo->prepare($update_category_query);

                $update_prod_result = $update_category_set->execute(
                    array(
                        ':prodid'=>$last_uploaded_id,
                        ':catid'=>$product['category']
                    )
                );
            }


            redirect_to('index.php');
    }catch(Exception $e) {
        $error = $e->getMessage();
        return $error;
        
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