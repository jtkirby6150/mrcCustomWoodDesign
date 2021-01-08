<?php
include "includes/functions.php";
headers("MRC Custom Wood Design - Products");
include "includes/init.php";
?>

<body style="font-family: 'Patrick Hand', cursive;">
    <?php include "includes/navbars.php"; ?>
    <div class="container">
        <h1 class="text-center" style="font-family: Courgette, cursive;font-size: 80px;">Product For Sale</h1>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col">
                <?php

                $dir = "assets/img/products";


                $getProducts = query("SELECT * FROM products WHERE forSale = 'For Sale'");
                confirm($getProducts);
                while($row = fetch_array($getProducts)){
                    $productID = $row['id'];
                    $title = $row['title'];
                    $image = $row['image'];
                    $altImage = $row['altImage'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image1 = $row['image1'];
                    $image2 = $row['image2'];
                    $image3 = $row['image3'];
                    $image4 = $row['image4'];
                    $altImage1 = $row['altImage1'];
                    $altImage2 = $row['altImage2'];
                    $altImage3 = $row['altImage3'];
                    $altImage4 = $row['altImage4'];
                    $price = number_format($price, 2, '.', ',');

                    echo "
                    <div class='card' style='box-shadow: 0px 0px 10px 5px; margin-top: 25px'>
    <div class='card-body'>
        <div class='row'>
            <div class='col' style='text-align: center;'>
                <h1 class='text-center' style='font-family: Patrick Hand, cursive;'>$title</h1>";
                if($image){
                echo "<a data-lightbox='photos' href='$dir/$image'><img class='img-fluid' src='$dir/$image' alt='$altImage' style='height: 330px;'></a>";
                }
            echo "</div>
        </div>
        <div class='row'>
            <div class='col'>
                <p>$description</p>
                <div class='row'>
                    <div class='col text-right' style='margin-bottom: 15px;'>
                        <p>&dollar;$price</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='row photos'>";
                if($image1){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image1'><img class='img-fluid' src='$dir/$image1' alt='$altImage1'></a></div>"; }
                if($image2){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image2'><img class='img-fluid' src='$dir/$image2' alt='$altImage2'></a></div>"; }
                if($image3){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image3'><img class='img-fluid' src='$dir/$image3' alt='$altImage3'></a></div>"; }
                if($image4){echo "<div class='col-sm-6 col-md-4 col-lg-3 item'><a data-lightbox='photos' href='$dir/$image4'><img class='img-fluid' src='$dir/$image4' alt='$altImage4'></a></div>"; }
        echo "</div>
        <div class='row'>
            <a href='contactus.php?productID=$productID' class='col' style='text-align: center;margin-top: 30px;'><button class='btn btn-secondary' type='button'>Contact Us</button></a>
        </div>
    </div>
</div>";
                }
                ?>



            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col">
                    <div>
                        <p style="text-align: center;">MRC Custom Wood Design Copyright 2020 - 2021</p>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <p style="text-align: center;">Visit us on&nbsp;<a href="#"><i class="fa fa-facebook" style="font-size: 30px;color: rgb(0,0,0);"></i></a>&nbsp;</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>