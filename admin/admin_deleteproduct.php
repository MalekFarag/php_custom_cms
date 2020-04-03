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

        $message = deleteProduct($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
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
<main class="delProd">
<h2 class='pageHead'>Delete Product</h2>

<?php echo !empty($message)? $message : '';?>
    <form action="admin_deleteproduct.php?id=<?php echo $id ; ?>" method="post">
        <?php while($info = $getProd->fetch(PDO::FETCH_ASSOC)): ?>
            <img src="../images/shoes/<?php echo $info['image']; ?>" alt="<?php echo $info['name'] ?>" />

            <p>#<?php echo $info['prod_number']; ?></p>
            <h2>Name: <?php echo $info['name']; ?></h2>
            <h3>Category:<?php echo $info['category']; ?></h3>
            <h4><?php echo $info['price']; ?></h4>
            <p><br> <?php echo $info['description']; ?></p><br><br>
            
        <?php endwhile;?>
<button name='submit'>DELETE PRODUCT</button><br><br><br>
    </form>
</main>


</body>
</html>