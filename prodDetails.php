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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'templates/header.php';?>

<main class="details">
    <?php if (!is_string($getProd)): ?>
        <?php while ($row = $getProd->fetch(PDO::FETCH_ASSOC)): ?>
            <img src="images/shoes/<?php echo $row['image']; ?>" alt="<?php echo $row['name'] ?>" />

            <p class='num'>#<?php echo $row['prod_number']; ?></p>
            <h2><?php echo $row['name']; ?></h2>
            <h4><?php echo $row['price']; ?></h4>
            <p class='desc'> <?php echo $row['description']; ?></p>
        <?php endwhile;?>
    <?php endif;?>

</main>
    


    <?php include 'templates/footer.php';?>
</body>
</html>