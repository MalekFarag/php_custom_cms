<?php 
    require_once '../load.php';
    confirm_logged_in();

    $id = $_SESSION['user_id'];
    $user = getSingleUser($id);

    if(is_string($user)){
        $message = $user;
    }

    if(isset($_POST['submit'])){
        
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if(empty($password)){
            $message = editUser2($id, $fname, $username, $email);
        }else{
            $message = editUser($id, $fname, $username, $password, $email);
        }

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

    <main class="userEdit">
        <h2 class='pageHead'>Edit User</h2>
        <p class='userNotice'>If this is your first time logging in, please update your password or any other detail to verify your account and gain access to the rest of the site.</p>
        <?php echo !empty($message)? $message : '';?>
        <form action="admin_edituser.php" method="post">
            <?php while($info = $user->fetch(PDO::FETCH_ASSOC)): ?>
                <label>First Name:</label><br>
                <input type="text" name="fname" value="<?php echo $info['first_name'];?>"><br><br>

                <label>Username:</label><br>
                <input type="text" name="username" value="<?php echo $info['user_name'];?>"><br><br>

                
                <label>Password:*leave blank to keep current password</label><br>
                <input type="text" name="password"><br><br>

                <label>Email:</label><br>
                <input type="text" name="email" value="<?php echo $info['user_email'];?>"><br><br>
            <?php endwhile;?>
            <button type="submit" name="submit">Edit User</button>
        </form>
    </main>
    
</body>
</html>