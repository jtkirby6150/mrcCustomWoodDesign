<?php
include "includes/functions.php";
headers('MRC Custom Wood Design - Register');
include "includes/init.php";
$name = "";
$email = "";
$username = "";

if(isset($_GET['taken'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
}
if(isset($_GET['wrongPass'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $username = $_GET['username'];
}

if(isset($_POST['register'])){
    $name = escape($_POST['name']);
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    $confirmPassword = $_POST['confirmPassword'];

    if($password == $confirmPassword){
        $checkUsername = query("SELECT id FROM users WHERE username = '$username'");
        confirm($checkUsername);
        if(row_count($checkUsername)>0){
            set_message("Sorry, that username is already in use. Please choose a different Username.");
            redirect("register.php?taken&name=$name&email=$email");
            exit();
        } else {
            $validate = generate_token();
            $haspass = password_hash($password,PASSWORD_BCRYPT);
            $register = query("INSERT INTO users (name, username, email, password, validation_code, active) VALUES ('$name', '$username', '$email', '$haspass', '$validate', 0)");
            confirm($register);

            $to = "james.t.kirby@gmail.com";
            $headers = "FROM: noreply@MRCCustomWoodDesign.com";
            $subject = "MRC Custom Wood Design Site Registration";
            $body = "Thank you for registering. Please click on the link below to validate your account: \r\n http://www.yourCMSSite.com/mrc/includes/pgfunctions.php?validate&username=$username&validation=$validate";
            mail($to, $subject, $body, $headers);

            set_message("Thank you for registering. Please check your email for further instructions.", "success");
            redirect("register.php");
            exit();
        }
    } else {
        set_message("Sorry, your passwords did not match please try again.");
        redirect("register.php?wrongPass&name=$name&email=$email&username=$username");
        exit();
    }

}


?>

<body>
<?php include "includes/navbars.php"; ?>
<div class="container">
    <?php display_message(); ?>
    <h1 class="text-center title"style="margin-top: 25px;font-size: 80px;font-family: Courgette, cursive;">MRC Registration</h1>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background: url(&quot;assets/img/124027108_3775090779167836_2802439246938491289_n.jpg&quot;) center / cover no-repeat;margin-left: 0;padding-left: 0px;"></div>
            <form method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" autofocus tabindex="1" value="<?php echo $name ?>" type="text" name="name" placeholder="Name"></div>
                <div class="form-group"><input class="form-control" tabindex="2" value="<?php echo $username ?>" type="text" name="username" placeholder="Username"></div>
                <div class="form-group"><input class="form-control" tabindex="3" value="<?php echo $email ?>" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" tabindex="4" type="password" name="password" placeholder="Password"></div>
                <div class="form-group"><input class="form-control" tabindex="5" type="password" name="confirmPassword" placeholder="Password (repeat)"></div>
                <div class="form-group"><button name="register" tabindex="6" class="btn btn-secondary btn-block" type="submit" style="background: rgb(0,77,146);">Sign Up</button></div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footers.php";