<?php
require_once 'load.php';


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
    <title>Welcome to the SportCheck CMS!</title>
</head>
<body>
    <?php include 'templates/header.php';?>

    <h1>Welcome to SportCheck CMS</h1>

    <?php while ($row = $getProds->fetch(PDO::FETCH_ASSOC)): ?>
        <a href="prodDetails.php?id=<?php echo $row['id']; ?>">
        <div class="prodItem">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
            <h5><?php echo $row['price']; ?></h5>
            <h2><?php echo $row['name']; ?></h2>
        </div>
        </a>
    <?php endwhile; ?>

    <?php include 'templates/footer.php';?>
</body>
</html>