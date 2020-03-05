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
    <title>Create User</title>
</head>
<body>

<h1>create user</h1>

<?php echo !empty($message)? $message: ''; ?>
<form action="admin_createuser.php" method="post">
    <label for="">Name</label><br>
    <input type="text" name='name' value=''><br><br>
    <label for="">Description</label><br>
    <textarea type="text" name='description' value=''></textarea><br><br>
    <label for="">Price</label><br>
    <input type="text" name='price' placeholder='example: 64.99 *do not add $ sign' value=''><br><br>
    <select name="category" id="category">
        <option value="running">Running</option>
        <option value="basketball">Basketball</option>
        <option value="soccer">Soccer</option>
        <option value="skate">Skate</option>
        <option value="golf">Golf</option>
        <option value="sandals">Sandals</option>
        <option value="sneaker">Sneaker</option>
    </select>
    <label for="">Image name</label>
    <input type="text">
    <!-- need image file upload -->

    <button name="submit">Create Product</button>
</form>
    
</body>
</html>