<?php
require_once 'load.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tbl = 'tbl_products';
    $col = 'prod_id';
    $getProd = getSingleProd($tbl, $col, $id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>
<body>
    <?php include 'templates/header.php';?>
    <?php if (!is_string($getProd)): ?>
        <?php while ($row = $getProd->fetch(PDO::FETCH_ASSOC)): ?>
            <img src="images/shoes/<?php echo $row['image']; ?>" alt="<?php echo $row['name'] ?>" />

            <p>#<?php echo $row['prod_number']; ?></p>
            <h2>Name: <?php echo $row['name']; ?></h2>
            <h4><?php echo $row['price']; ?></h4>
            <p><br> <?php echo $row['description']; ?></p>
        <?php endwhile;?>
    <?php endif;?>
    <a href="index.php">Back Home...</a>

    <?php include 'templates/footer.php';?>
</body>
</html>