<?php 
require_once '../load.php';
confirm_logged_in();
confirm_verified();

$category_tbl = 'tbl_category';
$categories = getAll($category_tbl);



if(isset($_POST['submit'])){
    $product = array(
        'name'=>$_POST['name'],
        'description'=>$_POST['description'],
        'price'=>$_POST['price'],
        'category'=>$_POST['category'],
        'image'=>$_FILES['image']
    );

        $result = createProd($product);
        $message =  $result;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<?php echo !empty($message)? $message: ''; ?>
<!-- use enctype multipart/form-data for upload files -->
<form action="admin_createproduct.php" method="post" enctype='multipart/form-data'>
    
    <label for="">Name</label><br>
    <input type="text" name='name' value=''><br><br>

    <label for="">Description</label><br>
    <textarea type="text" name='description' value=''></textarea><br><br>

    <label for="">Price</label><br>
    <input type="text" name='price' placeholder='example: $64.99' value=''><br><br>

    <label for="">Product category</label><br>
    <select name="category" id="category">
        <option>Select Category for Product</option>
        <?php while($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></option>
        <?php endwhile ; ?>
    </select><br><br>

    <!-- file upload needs config -->
    <label for="">Product Image Upload</label><br>
    <input type="file" name="image" id="image"><br><br>
    

    <button type='submit' name="submit">Publish Product</button>
</form>
    
</body>
</html>