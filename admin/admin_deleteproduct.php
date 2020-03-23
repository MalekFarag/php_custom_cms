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
</head>
<body>

<h1>Delete Product</h1>

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

    <a href="index.php">Back Home...</a>

</body>
</html>