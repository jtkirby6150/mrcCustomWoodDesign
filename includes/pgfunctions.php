<?php
include "functions.php";
include "init.php";

if(isset($_GET['validate'])){
    $username = escape($_GET['username']);
    $validationCode = escape($_GET['validation']);

    $checkUser = query("SELECT * FROM users where username = '$username' AND validation_code = '$validationCode'");
    confirm($checkUser);
    if(row_count($checkUser)>0){
        $validateUser = query("UPDATE users SET validation_code = ''");
        confirm($validateUser);
        redirect("../admin/admin.php");
        exit();
    } else {
        set_message("Sorry, something didnt line up. Please try again.<br>If the problem persists please contact us for assistance.");
        redirect("../register.php");
        exit();
    }
}