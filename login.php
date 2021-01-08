<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patrick+Hand">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<?php
include "includes/functions.php";
include "includes/init.php";
if(isset($_POST['login'])){
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    $getUser = query("SELECT * FROM users WHERE username = '$username'");
    confirm($getUser);
    if(row_count($getUser)>0){
        while($userRow = fetch_array($getUser)){
            $hashPass = $userRow['password'];
            $active = $userRow['active'];
            if(password_verify($password,$hashPass)){
                if($active == 1) {
                    $_SESSION['username'] = $username;
                    redirect("admin/admin.php");
                    exit();
                } else {
                    set_message("Sorry, your account is not yet active.");
                    redirect("login.php");
                    exit();
                }
            } else {
                set_message("Sorry, the credentials do not match the database.");
                redirect("login.php");
                exit();
            }
        }
    } else {
        set_message("Sorry, the credentials do not match the database.");
        redirect("login.php");
        exit();
    }
}

?>

<body style="background: #ffffff;">
<?php include "includes/navbars.php"; ?>
    <div class="login-dark" style="background: url('assets/img/jon-sailer-8JYxCF00X3Y-unsplash.jpg') center / cover no-repeat;">
        <form method="post" style="background: rgb(3,53,94);">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="border-color: rgb(254,254,254);"><i class="icon ion-ios-locked-outline" style="border-color: rgb(255,255,255);color: rgb(254,254,254);"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button name="login" class="btn btn-primary btn-block" type="submit">Log In</button></div>
        </form>
    </div>
    <div class="container">
 <?php include "includes/footers.php"; ?>