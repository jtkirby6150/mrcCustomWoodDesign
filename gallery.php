<?php
include "includes/functions.php";
headers("MRC Custom Wood Design - Gallery");
include "includes/init.php";
?>

<body style="font-family: 'Patrick Hand', cursive;">
    <?php include "includes/navbars.php" ?>
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h1 class="text-center title" style="margin-top: 25px;font-size: 80px;font-family: Courgette, cursive;">MRC Gallery</h1>
                <p class="text-center">Take a look at some of the work we have done. We would love to put our skills to work for you.
                    <a href="contactus.php">Contact Us</a> and lets work together to get your custom quality woodwork done!</p>
            </div>
            <?php
            $dir = "assets/img/products";
                $getGallery = query("SELECT * FROM products");
                confirm($getGallery);
                if(row_count($getGallery)>0) {
                    while ($row = fetch_array($getGallery)) {
                        $title = $row['title'];
                        $image = $row['image'];
                        $image1 = $row['image1'];
                        $image2 = $row['image2'];
                        $image3 = $row['image3'];
                        $image4 = $row['image4'];
                        $altImage = $row['altImage'];
                        $altImage1 = $row['altImage1'];
                        $altImage2 = $row['altImage2'];
                        $altImage3 = $row['altImage3'];
                        $altImage4 = $row['altImage4'];

                        echo " <h1 class='title' style='margin-top: 25px;font-family: Courgette, cursive;'>$title</h1>
                   <div class='row photos'>";
                        if($image){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image'><img class='img-fluid' src='$dir/$image' alt='$altImage'></a></div>";}
                if($image1){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image1'><img class='img-fluid' src='$dir/$image1' alt='$altImage1'></a></div>";}
                if($image2){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image2'><img class='img-fluid' src='$dir/$image2' alt='$altImage2'></a></div>";}
                if($image3){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image3'><img class='img-fluid' src='$dir/$image3' alt='$altImage3'></a></div>";}
                if($image4){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image4'><img class='img-fluid' src='$dir/$image4' alt='$altImage4'></a></div>";}
               echo  "</div>";
                    }
                }
            ?>
        </div>
    </div>
<div class="container">
<?php
include "includes/footers.php";
?>
</div>