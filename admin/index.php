<?php 
    require_once '../load.php';
    confirm_logged_in();
    confirm_verified();

    if (isset($_GET['filter'])) {
        //Filter is not working
        $args = array(
            'tbl' => 'tbl_products',
            'tbl2' => 'tbl_category',
            'tbl3' => 'tbl_prod_category',
            'col' => 'prod_id',
            'col2' => 'category_id',
            'col3' => 'category_name',
            'filter' => $_GET['filter'],
        );
        $getProds = getProdsByCategory($args);
    } else {
        $prod_table = 'tbl_products';
        $getProds = getAll($prod_table);
    }
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?></h1><br>

    <h3>User Settings</h3>
    <ul>
    <a href="admin_createuser.php">Create Account</a>
    <a href="admin_edituser.php">Edit Current Account</a>
    <a href="admin_logout.php">Logout</a>
    </ul>

    <!-- link to edit product** PAGE NEEDS UPDATING (sql queries to work with linking tables) -->
    <a href="admin_createproduct.php">Create New Product</a>

    <h2>Products</h2>
    
    <!-- NEED SEARCH BAR -->

    <?php while ($row = $getProds->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="prodItem editProduct">
            <img src="../images/shoes/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
            <h5><?php echo $row['price']; ?></h5>
            <h2><?php echo $row['name']; ?></h2>
        </div>
        <!-- link to edit product** PAGE NEEDS UPDATING -->
        <a href="admin_editproduct.php?id=<?php echo $row['prod_id']; ?>">Edit Product</a>
        <!-- link to delete product** NEEDS NEW PAGE -->
        <a href="admin_deleteproduct.php?id=<?php echo $row['prod_id']; ?>">Delete Product</a>
    <?php endwhile; ?>
    
</body>
</html>