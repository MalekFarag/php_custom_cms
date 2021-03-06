<?php
require_once 'load.php';


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
    <title>Welcome to the SportCheck CMS!</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'templates/header.php';?>

    <main class='home'>
    <!-- NEED SEARCH BAR -->
        <div class="prodWrap">
        <?php while ($row = $getProds->fetch(PDO::FETCH_ASSOC)): ?>
                <a href="prodDetails.php?id=<?php echo $row['prod_id']; ?>">
                <div class="prodItem">
                    <img src="images/shoes/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" />
                    <h5><?php echo $row['price']; ?></h5>
                    <h2><?php echo $row['name']; ?></h2>
                </div>
                </a>
            <?php endwhile; ?>
        </div>
    
    </main>

    

    <?php include 'templates/footer.php';?>
</body>
</html>