<?php

session_start();

require 'config/db.php';

require_once 'emailController.php';

$errors = array();
$namalengkap = "";
$email = "";
$nim = "";
$angkatan = "";
$kelas = "";
$usertype = "";

// if user click sign up button
if (isset($_POST['signup-btn'])) {
    $namalengkap = $_POST['namalengkap'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $angkatan = $_POST['angkatan'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];
    $usertype = $_POST['usertype'];

    // validation
    if (empty($namalengkap)) {
    $errors['namalengkap'] = "<font color='red'; > Nama lengkap Required </font>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "<font color='red'; > Email Address Is Invalid </font>";
    }
    if (empty($email)) {
        $errors['email'] = "<font color='red'; > Email Required </font>";
    }
    if (empty($nim)) {
    $errors['nim'] = "<font color='red'; > NIM Required </font>";
    }
    if (empty($angkatan)) {
    $errors['angkatan'] = "<font color='red'; > Angkatan Required </font>";
    }
    if (empty($kelas)) {
    $errors['kelas'] = "<font color='red'; > Kelas Required </font>";
    }
    if (empty($password)) {
        $errors['password'] = "<font color='red'; > Password Required </font>";
    }
    if ($password !== $passwordConf) {
        $errors['password'] = "<font color='red'; > The Password do not match </font>";
    }


    $namalengkapQuery = "SELECT * FROM users WHERE namalengkap=? LIMIT 1";
    $stmt = $conn->prepare($namalengkapQuery);
    $stmt->bind_param('s',$namalengkap);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "<font color='red'; > Email sudah di pakai </font>";
    }
    
    $nimQuery = "SELECT * FROM users WHERE nim=? LIMIT 1";
    $stmt = $conn->prepare($nimQuery);
    $stmt->bind_param('s',$nim);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['nim'] = "<font color='red'; > NIM sudah di pakai </font>";
    }

    $angkatanQuery = "SELECT * FROM users WHERE angkatan=? LIMIT 1";
    $stmt = $conn->prepare($angkatanQuery);
    $stmt->bind_param('s',$angkatan);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();


    $kelasQuery = "SELECT * FROM users WHERE kelas=? LIMIT 1";
    $stmt = $conn->prepare($kelasQuery);
    $stmt->bind_param('s',$kelas);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if (count($errors) === 0){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token =  bin2hex(random_bytes(50));
        $verified = FALSE;

        $sql = "INSERT INTO users (namalengkap, email, nim, angkatan, kelas, verified, token, password,usertype) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssbsss', $namalengkap, $email, $nim, $angkatan, $kelas, $verified, $token, $password, $usertype);

        if ($stmt->execute()) {
        //login user automatic
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['namalengkap'] = $namalengkap;
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
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // validation
    // if (empty($namalengkap)) {
    // $errors['namalengkap'] = "<font color='red'; > namalengkap Required </font>";
    // }
    if (empty($nim)) {
    $errors['nim'] = "<font color='red'; > NIM Required </font>";
    }
    if (empty($password)) {
        $errors['password'] =  "<font color='red'; > Password Required </font>";
    }

    if (count($errors) === 0) {
      $sql = "SELECT * FROM users WHERE email=? OR nim=? AND usertype=? LIMIT 1"; //namalengkap=? 
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('sss', $nim, $nim, $usertype); //$namalengkap
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
    
      if (password_verify($password, $user['password'])) {
        if($_SESSION['usertype'] == ""){

            if($user['usertype'] == "admin")
            {
                //login sucess
                $_SESSION['usertype'] = "admin";
                $_SESSION['id'] = $user['id'];
                $_SESSION['namalengkap'] = $user['namalengkap'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nim'] = $user['nim']; //namalengkap
                $_SESSION['angkatan'] = $user['angkatan'];
                $_SESSION['kelas'] = $user['kelas'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['alert-class'] = "alert-success";
                header('location: admin-dashboard');
                exit();
            }

            else if($user['usertype'] == "user")
            {
                //login sucess
                $_SESSION['usertype'] = "user";
                $_SESSION['id'] = $user['id'];
                $_SESSION['namalengkap'] = $user['namalengkap'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['nim'] = $user['nim']; //namalengkap
                $_SESSION['angkatan'] = $user['angkatan'];
                $_SESSION['kelas'] = $user['kelas'];
                $_SESSION['verified'] = $user['verified'];
                // flash message
                $_SESSION['message'] = "You are now logged in";
                $_SESSION['alert-class'] = "alert-success";
                header('location: dashboard_user');
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
    unset($_SESSION['id']);
    unset($_SESSION['namalengkap']);
    unset($_SESSION['email']);
    unset($_SESSION['nim']);
    unset($_SESSION['angkatan']);
    unset($_SESSION['kelas']);
    unset($_SESSION['verified']);
    header('location:../');
    exit();
}



// verify user token
function verifyUser($token)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token' ";

        if (mysqli_query($conn, $update_query)) {
            // log user in
            $_SESSION['id'] = $user['id'];
            $_SESSION['namalengkap'] = $user['namalengkap'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nim'] = $user['nim'];
            $_SESSION['angkatan'] = $user['angkatan'];
            $_SESSION['kelas'] = $user['kelas'];
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
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        $token = $user['token'];
        SendPasswordResetLink($email, $token);
        header('location: password_message');
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
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: login');
            exit(0);
        }
    }
}


function resetPassword($token) 
{
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset_password');
    exit(0);
}

