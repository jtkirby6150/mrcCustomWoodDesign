<?php

function headers($title){
   echo "<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <link rel='icon' href='../assets/img/favicon.ico'>
    <title>$title</title>
    <link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Courgette'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Patrick+Hand'>
    <link rel='stylesheet' href='../assets/fonts/font-awesome.min.css'>
    <link rel='stylesheet' href='../assets/fonts/ionicons.min.css'>
    <link rel='stylesheet' href='../assets/css/Contact-Form-Clean.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css'>
    <link rel='stylesheet' href='../assets/css/Lightbox-Gallery.css'>
    <link rel='stylesheet' href='../assets/css/Login-Form-Dark.css'>
    <link rel='stylesheet' href='../assets/css/Navigation-Clean.css'>
    <link rel='stylesheet' href='../assets/css/Registration-Form-with-Photo.css'>
    <link rel='stylesheet' href='../assets/css/styles.css'>
    
<head>";
}

function adminHeaders($title){
    echo "<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no'>
    <link rel='icon' href='../assets/img/favicon.ico'>
    <title>$title</title>
    <link rel='stylesheet' href='../assets/bootstrap/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Courgette'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Patrick+Hand'>
    <link rel='stylesheet' href='../assets/fonts/font-awesome.min.css'>
    <link rel='stylesheet' href='../assets/fonts/ionicons.min.css'>
    <link rel='stylesheet' href='../assets/css/Contact-Form-Clean.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css'>
    <link rel='stylesheet' href='../assets/css/Lightbox-Gallery.css'>
    <link rel='stylesheet' href='../assets/css/Login-Form-Dark.css'>
    <link rel='stylesheet' href='../assets/css/Navigation-Clean.css'>
    <link rel='stylesheet' href='../assets/css/Registration-Form-with-Photo.css'>
    <link rel='stylesheet' href='../assets/css/styles.css'>
</head>";
}

function query($query){
    global $conn;
    return mysqli_query($conn, $query);
}

function fetch_array($result)
{
    global $conn;
    return mysqli_fetch_array($result);
}

function set_message($message, $level='danger')
{
    if($level != 'primary' && $level != 'secondary' && $level != 'info' && $level != 'warning' && $level != 'success'){
        $level = 'danger';
    }
    if (!empty($message)) {
        $_SESSION['message'] = "<div class='text-center alert alert-{$level} alert-dismissible fade show' role='alert'>
  <strong>$message</strong>
  <button type='button' class='close'' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } else {
        unset($_SESSION['message']);
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    return header("Location: $location");
}

function confirm($result)
{
    global $conn;
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }
}

function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function generate_token(){
    return md5(microtime().mt_rand());
}

function row_count($result)
{
    return mysqli_num_rows($result);
}

function dealwithimage($imagenum, $imagetmp, $imagesize, $imageerror, $dir){
    //dealing with image
    $fileExt = explode(".", $imagenum);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($imageerror === 0) {
            if ($imagesize < 5000000) {
                $newImage = $imagenum;
                $fileDestination = $dir . "/" .  $newImage;
                if (file_exists($fileDestination)) {
                    echo "<h6 class='container text-center alert alert-warning'>File <i>'$imagenum'</i> already exists and was not uploaded.</h6>";
                } else {
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }

                    move_uploaded_file($imagetmp, $fileDestination);
                    return true;
                }
            } else {
                echo "<h6 class='container text-center alert alert-warning'>File <i>'$imagenum'</i> is too large. Up to 5MB Allowed.</h6>";
            }
        } else {
            echo "<h6 class='container text-center alert alert-warning'>There was an error uploading your file: <i>'$imagenum'</i></h6>";
        }
    } else {
        echo "<h6 class='container text-center alert alert-warning'>Sorry, this file type <i>'$fileActualExt'</i> is not supported. <br>We currently support: jpg, jpeg, and png files.</h6>";
    }
}

?>
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm("Are you sure you would like to delete this?");
    }
</script>