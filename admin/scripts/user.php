<?php


function createuser($fname, $username, $password, $email){
    
    $pdo = Database::getInstance()->getConnection();

     // check user existance
     $check_email_query = 'SELECT COUNT(user_name) AS num FROM tbl_user WHERE user_name = :username'; 
     $user_set = $pdo->prepare($check_email_query);
     $user_set->execute(
         array(
             ':username'=>$username
         )
     );
 
     $row = $user_set->fetch(PDO::FETCH_ASSOC);

     if($row['num'] > 0){
        $message = 'username is already registered';
    }else{

        //phpmailer config
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure='ssl';
        $mail->Port = 465;
        $mail->SMTPAuth=true;

        $mail->Username='faragmalek14@gmail.com';
        $mail->Password='Malooky14'; // please dont steal my password. I really dont want to change it

        $mail->addAddress($email);
        $mail->setFrom('faragmalek14@gmail.com');
        

        $mail->isHTML(true);
        $mail->Subject='Created User | Nick & Malek Research'; 
        $mail->Body='

        Hello from Nick & Malek! <br><br>

        Thanks for signing up!<br><br>
        Your account admin user has been Created!<br>
        You have 15 minutes to login or your account will be suspended.
        <br><br><br>
        ------------------------<br>
        Here are your login credentials!<br>
        Email: '.$username.'<br>
        Temporary Password: '.$password.'<br><br>

        Login at and change your password or other account info to verify http://localhost/farag_m_shahfazlollahi_n_php_edit_user-master/admin/admin_login.php <br>
        ------------------------<br>
        <br><br><br>
        ';

        if(!$mail->send()){
            $message= $mail->ErrorInfo;
            return 'user creation did not got through';
        }else{
            $passwordEncryp = md5($password);

            //creating user sql query from form details
            $create_user_query = "INSERT INTO tbl_user (user_id, first_name, user_name, user_email, user_password, verified, user_ip) VALUES (NULL, :fname, :username, :email, :password, '0', 'no');";

            $user_signup = $pdo->prepare($create_user_query);
            $user_signup->execute(
                array(
                    ':fname'=>$fname,
                    ':username'=>$username,
                    ':email'=>$email,
                    ':password'=>$passwordEncryp
                )
            );
            
            redirect_to('index.php');
            $message = 'created user';
        }
    }
}


function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();
    //TODO: execute the proper SQL query to fetch the user data whose user_id = $id
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id = :id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id
        )
    );

    //TODO: if the execution is successful, return the user data
    // Otherwise, return an error message
    if($get_user_result){
        return $get_user_set;
    }else{
        return 'There was a problem accessing the user';
    }
}

function editUser($id, $fname, $username, $password, $email){

    $passwordEncryp = md5($password);

    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: Run the proper SQL query to update tbl_user with proper values
    $update_user_query = 'UPDATE tbl_user SET first_name = :fname, user_name = :username, user_password=:password, verified = 1, user_email =:email WHERE user_id = :id';
    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$passwordEncryp,
            ':email'=>$email,
            ':id'=>$id
        )
    );

    // echo $update_user_set->debugDumpParams();
    // exit;

    //TODO: if everything goes well, redirect user to index.php
    // Otherwise, return some error message...
    if($update_user_result){
        redirect_to('index.php');
    }else{
        return 'Guess you got canned...';
    }
}

function editUser2($id, $fname, $username, $email){

    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: Run the proper SQL query to update tbl_user with proper values
    $update_user_query = 'UPDATE tbl_user SET first_name = :fname, user_name = :username, verified = 1, user_email =:email WHERE user_id = :id';
    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':email'=>$email,
            ':id'=>$id
        )
    );

    // echo $update_user_set->debugDumpParams();
    // exit;

    //TODO: if everything goes well, redirect user to index.php
    // Otherwise, return some error message...
    if($update_user_result){
        redirect_to('index.php');
    }else{
        return 'Guess you got canned...';
    }
}