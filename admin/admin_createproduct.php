<?php 
require_once '../load.php';
confirm_logged_in();
confirm_verified();

$category_tbl = 'tbl_category';
$categories = getAll($category_tbl);



if(isset($_POST['submit'])){
    $product = array(
        'name'=>$_POST['name'],
        'description'=>$_POST['description'],
        'price'=>$_POST['price'],
        'category'=>$_POST['category'],
        'image'=>$_FILES['image']
    );

        $result = createProd($product);
        $message =  $result;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header>
    <img src="../images/logo.png" alt="">
        <ul>
            <a href="index.php">Dashboard</a>
            <a href="admin_createproduct.php">Create New Product</a>
            <a href="admin_createuser.php">Create Account</a>
            <a href="admin_edituser.php">Edit Current Account</a>
            <a href="admin_logout.php">Logout</a>
        </ul>
        <h5>Hi, <span><?php echo $_SESSION['user_name']; ?></span></h5>
    </header>

<main class="createProd">
    <h2 class='pageHead'>Create Product</h2>

    <?php echo !empty($message)? $message: ''; ?>
    <!-- use enctype multipart/form-data for upload files -->
    <form action="admin_createproduct.php" method="post" enctype='multipart/form-data'>
        
        <label for="">Name</label>
        <input type="text" name='name' value=''>

        <label for="">Description</label>
        <textarea type="text" name='description' value=''></textarea>

        <label for="">Price</label>
        <input type="text" name='price' placeholder='example: $64.99' value=''>

        <label for="">Product category</label>
        <select name="category" id="category">
            <option>Select Category for Product</option>
            <?php while($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></option>
            <?php endwhile ; ?>
        </select>

        <!-- file upload needs config -->
        <label for="">Product Image Upload</label>
        <input type="file" name="image" id="image">
        

        <button type='submit' name="submit">Publish Product</button>
    </form>
</main>


    
</body>
</html>