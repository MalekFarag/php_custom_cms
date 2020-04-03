<?php 
require_once '../load.php';
confirm_logged_in();
confirm_verified();


if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    if(empty($email) || empty($username) || empty($fname) || empty($password)){
        $message = 'please fill require fields';
    }else{
        $message = createuser($fname, $username,$password, $email);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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

<main class="createUser">
    <h2 class='pageHead'>Create User</h2>

    <?php echo !empty($message)? $message: ''; ?>
    <form action="admin_createuser.php" method="post">

        <label for="">First Name</label><br>
        <input type="text" name='fname' value=''><br><br>

        <label for="">Username</label><br>
        <input type="text" name='username' value=''><br><br>

        <label for="">Password</label><br>
        <input type="text" name='password' value=''><br><br>

        <label for="">Email</label><br>
        <input type="email" name='email' value=''><br><br>

        <button name="submit">Create User</button>
    </form>
</main>

    
</body>
</html>