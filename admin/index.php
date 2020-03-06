<?php 
    require_once '../load.php';
    confirm_logged_in();
    comfirm_verified();

    if (isset($_GET['filter'])) {
        //Filter is not working
        $category = array(
            'running'=>'running'
        );
        $getProds = $prod->getProdsByCategory($category);
    } else {
        $getProds = $prod->getProds();
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
    <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2><br>

    <h4>User</h4>
    <ul>
    <a href="admin_createuser.php">Create User</a>
    <a href="admin_edituser.php">Edit User</a>
    <a href="admin_logout.php">Logout</a>
    </ul>

    <h3>Products</h3>
    <!-- render product list here -->
    <?php while ($row = $getProds->fetch(PDO::FETCH_ASSOC)): ?>
        <a href="prodDetails.php?id=<?php echo $row['id']; ?>">
        <div class="prodItem">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
            <h5><?php echo $row['price']; ?></h5>
            <h2><?php echo $row['name']; ?></h2>
        </div>
        </a>
    <?php endwhile; ?>
    
</body>
</html>