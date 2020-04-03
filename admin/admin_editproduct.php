<?php 
    require_once '../load.php';
    confirm_logged_in();
    confirm_verified();

    //grab the individual product
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $tbl = 'tbl_products';
        $col = 'prod_id';
        $getProd = getSingleProd($tbl, $col, $id);
    }

    

    // submitting inputted values
    if(isset($_POST['submit'])){
        $product = array(
            'name'=>$_POST['name'],
            'description'=>$_POST['description'],
            'price'=>$_POST['price'],
            'image'=>$_FILES['image']
        );
    
            $result = editProduct($product, $id);
            $message =  $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

<main class="editProd">
    <h2 class='pageHead'>Edit Product</h2>

    <?php echo !empty($message)? $message : '';?>
        <form action="admin_editproduct.php?id=<?php echo $id ; ?>" method="post" enctype='multipart/form-data'>
            <?php while($info = $getProd->fetch(PDO::FETCH_ASSOC)): ?>

                <label>Product Name:</label><br>
                <input type="text" name="name" value="<?php echo $info['name'];?>"><br><br>

                <label>Price:</label><br>
                <input type="text" name="price" value="<?php echo $info['price'];?>"><br><br>

                <!-- ADD CATEGORY -->

                <label>Description:</label><br>
                <textarea type="text" name="description"><?php echo $info['description'];?></textarea> <br><br>

                <label for="">Product Image Upload</label><br>
                <input type="file" name="image" id="image"><br><br>
                
            <?php endwhile;?>
            <button type="submit" name="submit">Edit Product</button>
        </form>
</main>


</body>
</html>