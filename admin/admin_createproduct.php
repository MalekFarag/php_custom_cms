<?php 
require_once '../load.php';
confirm_logged_in();
comfirm_verified();


if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $image = trim($_POST['image']);
    //need file upload (images/shoes/)**** 

    if(empty($name) || empty($description) || empty($price) || empty($category) || empty($image)){
        $message = 'please fill require fields';
    }else{
        $message = createProd($name, $description, $price, $category, $image); // add this in helper functions folder
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<?php echo !empty($message)? $message: ''; ?>
<form action="admin_createuser.php" method="post">
    <label for="">Name</label><br>
    <input type="text" name='name' value=''><br><br>
    <label for="">Description</label><br>
    <textarea type="text" name='description' value=''></textarea><br><br>
    <label for="">Price</label><br>
    <input type="text" name='price' placeholder='example: $64.99' value=''><br><br>

    <label for="">Product category</label><br>
    <select name="category" id="category">
        <option value="1">Running Shoes</option>
        <option value="2">Basketball Shoes</option>
        <option value="3">Soccer Shoes</option>
        <option value="4">Skate Shoes</option>
        <option value="5">Golf Shoes</option>
        <option value="6">Sneaker Shoes</option>
        <option value="7">Sandals Shoes</option>
    </select><br><br>
    <label for="">Image Name</label><br>
    <input type="text" name='image'><br><br>
    <!-- file upload needs config -->
    <label for="">Image Upload</label><br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    

    <button name="submit">Create Product</button>
</form>
    
</body>
</html>