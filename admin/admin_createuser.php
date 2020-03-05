<?php 
require_once '../load.php';
confirm_logged_in();
comfirm_verified();


if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    if(empty($email) || empty($username) || empty($fname)){
        $message = 'please fill require fields';
    }else{
        $message = createuser($fname, $username, $email);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>

<h1>create user</h1>

<?php echo !empty($message)? $message: ''; ?>
<form action="admin_createuser.php" method="post">
    <label for="">First Name</label><br>
    <input type="text" name='fname' value=''><br><br>
    <label for="">Username</label><br>
    <input type="text" name='username' value=''><br><br>
    <label for="">Email</label><br>
    <input type="email" name='email' value=''><br><br>
    <label for="">*Password is created for you</label><br>

    <button name="submit">Create User</button>
</form>
    
</body>
</html>