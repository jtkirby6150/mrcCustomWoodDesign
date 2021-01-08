<?php
include "includes/functions.php";
headers("MRC Custom Wood Design - Contact Us");
include "includes/init.php";

$interested = "";

$getCompInfo = query("SELECT * FROM company_info WHERE id = 1");
confirm($getCompInfo);
while($row = fetch_array($getCompInfo)){
    $name = $row['name'];
    $phone = $row['phone'];
    $compEmail = $row['email'];
    $address = $row['address'] . '<br>' . $row['city'] . ", " . $row['state'] . " " . $row['zip'];
}

if(isset($_GET['productID'])){
    $productID = escape($_GET['productID']);
    $getProductInfo = query("SELECT * FROM products WHERE id = '$productID'");
    while($row = fetch_array($getProductInfo)){
        $interested = "Hello, we are interested in: " . $row['title'];
    }
}

if(isset($_POST['contactUs'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "$compEmail";
    $headers = "FROM: $email";
    $subject = "MRC Contact Us Submission From: $name";
    $body = "$name \r\n $phone \r\n  $email \r\n Submitted the following message: \r\n $message";

    mail($to, $subject, $body, $headers);
    set_message("Thank you for your message,<br> we will reach out to you shortly.", "success");
    redirect("contactus.php");
    exit();
}


?>

<body>
<div class="container">
    <?php include "includes/navbars.php"; ?>
    <div class="contact-clean">
        <form method="post">
            <?php display_message(); ?>
            <h2 class="text-center">Contact us</h2>
            <p class="text-center">We want to ensure we address any questions or concerns you may have. Please reference the contact information below:</p>
            <p class="text-center"><?php echo $address; ?><br><?php echo $phone; ?><br><?php echo $compEmail; ?></p>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name"></div>
            <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone"></div>
            <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email"></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14"><?php echo $interested ?></textarea></div>
            <div class="form-group text-center"><button name="contactUs" class="btn btn-secondary" type="submit" style="background: var(--gray);">send </button></div>
        </form>
    </div>

    <?php include "includes/footers.php"; ?>
</div>