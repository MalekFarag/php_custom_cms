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
</head>
<body>

<h1>Edit Product</h1>

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

    <a href="index.php">Back Home...</a>

</body>
</html>