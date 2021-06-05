<?php

session_start();

require 'config/db.php';

require_once 'emailController.php';

$errors = array();
$namalengkap = "";
$username = "";
$email = "";
$dateofbirth = "";
$phone_number = "";
$usertype = "";

// if user click sign up button
if (isset($_POST['signup-btn'])) {
    $namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dateofbirth = date('Y-m-d', strtotime($_POST['dateofbirth']));
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $usertype = $_POST['usertype'];

    // validation
    if (empty($namalengkap)) {
    $errors['namalengkap'] = "<font color='red'; > Nama lengkap Required </font>";
    }
    if (empty($username)) {
    $errors['username'] = "<font color='red'; > Username Required </font>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "<font color='red'; > Email Address Is Invalid </font>";
    }
    if (empty($email)) {
        $errors['email'] = "<font color='red'; > Email Required </font>";
    }
    if (empty($dateofbirth)) {
    $errors['dateofbirth'] = "<font color='red'; > Tanggal Lahir Required </font>";
    }
    if (empty($phone_number)) {
    $errors['phone_number'] = "<font color='red'; > Nomor Telp Required </font>";
    }

    if (empty($password)) {
        $errors['password'] = "<font color='red'; > Password Required </font>";
    }
    if ($password !== $passwordConf) {
        $errors['password'] = "<font color='red'; > The Password do not match </font>";
    }


    $namalengkapQuery = "SELECT * FROM user WHERE namalengkap=? LIMIT 1";
    $stmt = $conn->prepare($namalengkapQuery);
    $stmt->bind_param('s',$namalengkap);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $usernameQuery = "SELECT * FROM user WHERE username=? LIMIT 1";
    $stmt = $conn->prepare($usernameQuery);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['username'] = "<font color='red'; > Username Already Used </font>";
    }

    $emailQuery = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "<font color='red'; > Email Already Used </font>";
    }
    
    $dateofbirthQuery = "SELECT * FROM user WHERE dateofbirth=? LIMIT 1";
    $stmt = $conn->prepare($dateofbirthQuery);
    $stmt->bind_param('s',$dateofbirth);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $phone_numberQuery = "SELECT * FROM user WHERE phone_number=? LIMIT 1";
    $stmt = $conn->prepare($phone_numberQuery);
    $stmt->bind_param('s',$phone_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['phone_number'] = "<font color='red'; >Nomor Already Used </font>";
    }


    if (count($errors) === 0){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token =  bin2hex(random_bytes(50));
        $verified = FALSE;

        $sql = "INSERT INTO user (namalengkap, username, email, dateofbirth, phone_number, password, usertype, token, verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssb', $namalengkap, $username, $email, $dateofbirth, $phone_number, $password, $usertype, $token, $verified);

        if ($stmt->execute()) {
        //login user automatic
        $user_id = $conn->insert_id;
        $_SESSION['uid'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['verified'] = $verified;

        SendVerificationEmail($email, $token);

        // flash message
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['alert-class'] = "alert-success";
        header('location: index1');
        exit();
        } else{
            $errors['db_error'] = "<font color='red'; > Database error: failed to register </font>";
        }
    }

}


// if user click login button
if (isset($_POST['login-btn'])) {
    //$namalengkap = $_POST['namalengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // validation
    if (empty($username)) {
    $errors['username'] = "<font color='red'; > Username Required </font>";
    }
    if (empty($password)) {
        $errors['password'] =  "<font color='red'; > Password Required </font>";
    }

    if (count($errors) === 0) {
      $sql = "SELECT * FROM user WHERE email=? OR username=? AND usertype=? LIMIT 1"; 
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sss', $username, $username, $usertype); //$namalengkap
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
    
      if (password_verify($password, $user['password'])) {
        if($_SESSION['usertype'] == ""){

            if($user['usertype'] == "0")
            {
                //login sucess
                $_SESSION['usertype'] = "0";
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['namalengkap'] = $user['namalengkap'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone_number'] = $user['phone_number'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['alert-class'] = "alert-success";
                header('location: admin-dashboard');
                exit();
            }

            else if($user['usertype'] == "1")
            {
                //login sucess
                $_SESSION['usertype'] = "1";
                $_SESSION['uid'] = $user['uid'];
                $_SESSION['namalengkap'] = $user['namalengkap'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email']; 
                $_SESSION['phone_number'] = $user['phone_number'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['alert-class'] = "alert-success";
                header('location: user-dashboard');
                exit();
            }
        }
            
    
        } else {
            $errors['login_fail'] = "<font color='red'; >Wrong Credentials </font>";
        }
        
    }

}

//logout user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['uid']);
    unset($_SESSION['namalengkap']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['phone_number']);
    unset($_SESSION['verified']);
    header('location:../');
    exit();
}



// verify user token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE user SET verified=1 WHERE token='$token' ";

        if (mysqli_query($conn, $update_query)) {
            // log user in
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['namalengkap'] = $user['namalengkap'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['phone_number'] = $user['phone_number'];
            $_SESSION['verified'] = 1;
            // flash message
            $_SESSION['message'] = "Your Email was Succesfully verified";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index1');
            exit();
        }
    } else {
        echo 'User not found';
    }

}

// if user click forgot password
if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "<font color='red'; > Email Address Is Invalid </font>";
    }
    if (empty($email)) {
        $errors['email'] = "<font color='red'; > Email Required </font>";
    }
    if (count($errors) === 0) {
        $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        SendPasswordResetLink($email, $token);
        header('location: password-message');
        exit(0);
    }

}


// if user clicked reset password
if (isset($_POST['reset-password-btn'])) {
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "<font color='red'; > Password Required </font>";
    }
    if ($password !== $passwordConf) {
        $errors['password'] = "<font color='red'; > The Password do not match </font>";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if (count($errors) === 0) {
        $sql = "UPDATE user SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: signIn');
            exit(0);
        }
    }
}


function resetPassword($token) 
{
    global $conn;
    $sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset-password');
    exit(0);
}

function query($query){
    global $conn;
    $result = mysqli_query ($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
