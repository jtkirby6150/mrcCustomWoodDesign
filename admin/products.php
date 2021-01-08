<?php
include "../includes/functions.php";
adminHeaders("MRC Custom Wood Design - Admin Products");
include "../includes/init.php";
if(!isset($_SESSION['username'])){
    set_message("Sorry, you must be logged in to view that page.");
    redirect("../login.php");
    exit();
} else {

$image = "";
$image1 = "";
$image2 = "";
$image3 = "";
$image4 = "";
$title = "";
$description = "";
$keywords = "";
$price = "";
$qty = "";
$forSale = "";
$active = "";
$altImage = "";
$altImage1 = "";
$altImage2 = "";
$altImage3 = "";
$altImage4 = "";
$dir = "../assets/img/products";

if(isset($_GET['delete'])){
    $productID = escape($_GET['delete']);
    $deleteProduct = query("DELETE FROM products WHERE id = '$productID'");
    confirm($deleteProduct);
    set_message("You have successfully deleted Product ID: $productID", "success");
    redirect("admin.php");
    exit();
}

if(isset($_GET['setInactive'])){
    $productID = $_GET['setInactive'];
    $setInactive = query("UPDATE products SET active = 'Inactive' WHERE id = '$productID'");
    confirm($setInactive);
    set_message("You have set Product #: $productID to 'Inactive'.", "success");
    redirect("admin.php");
    exit();
}

if(isset($_GET['setActive'])){
    $productID = $_GET['setActive'];
    $setActive = query("UPDATE products SET active = 'Active' WHERE id = '$productID'");
    confirm($setActive);
    set_message("You have set Product #: $productID to 'Active'.", "success");
    redirect("admin.php");
    exit();
}

if(isset($_GET['update'])){
    $productID = escape($_GET['update']);
    $getProductInfo = query("SELECT * FROM products WHERE id = '$productID'");
    confirm($getProductInfo);
    while($row = fetch_array($getProductInfo)){
        $image = $row['image'];
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $image4 = $row['image4'];
        $title = $row['title'];
        $description = $row['description'];
        $keywords = $row['keywords'];
        $price = $row['price'];
        $qty = $row['qty'];
        $forSale = $row['forSale'];
        $active = $row['active'];
        $altImage = $row['altImage'];
        $altImage1 = $row['altImage1'];
        $altImage2 = $row['altImage2'];
        $altImage3 = $row['altImage3'];
        $altImage4 = $row['altImage4'];
    }
}


if(isset($_POST['add'])){
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    $keywords = escape($_POST['keywords']);
    $price = escape($_POST['price']);
    $qty = escape($_POST['qty']);
    $forSale = escape($_POST['sale']);
    $active = escape($_POST['active']);
    $altImage = escape($_POST['altImage']);
    $altImage1 = escape($_POST['altImage1']);
    $altImage2 = escape($_POST['altImage2']);
    $altImage3 = escape($_POST['altImage3']);
    $altImage4 = escape($_POST['altImage4']);

    if ($_FILES['image']['name']) {
        $img = $_FILES['image']['name'];
        dealwithimage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['size'],
            $_FILES['image']['error'], $dir);
    }
    if ($_FILES['image1']['name']) {
        $img1 = $_FILES['image1']['name'];
        dealwithimage($_FILES['image1']['name'], $_FILES['image1']['tmp_name'], $_FILES['image1']['size'],
            $_FILES['image1']['error'], $dir);
    }
    if ($_FILES['image2']['name']) {
        $img2 = $_FILES['image2']['name'];
        dealwithimage($_FILES['image2']['name'], $_FILES['image2']['tmp_name'], $_FILES['image2']['size'],
            $_FILES['image2']['error'], $dir);
    }
    if ($_FILES['image3']['name']) {
        $img3 = $_FILES['image3']['name'];
        dealwithimage($_FILES['image3']['name'], $_FILES['image3']['tmp_name'], $_FILES['image3']['size'],
            $_FILES['image3']['error'], $dir);
    }
    if ($_FILES['image4']['name']) {
        $img4 = $_FILES['image4']['name'];
        dealwithimage($_FILES['image4']['name'], $_FILES['image4']['tmp_name'], $_FILES['image4']['size'],
            $_FILES['image4']['error'], $dir);
    }

    $addProduct = query("INSERT INTO products (image, altImage, description, title, keywords, price, qty, forSale, active, image1, altImage1, image2, altImage2, image3, altImage3, image4, altImage4) VALUES ('$img', '$altImage', '$description', '$title', '$keywords', '$price', '$qty', '$forSale', '$active', '$img1', '$altImage1', '$img2', '$altImage2', '$img3', '$altImage3', '$img4', '$altImage4')");
    confirm($addProduct);
    set_message("You have successfully added the product.", "success");
    redirect("products.php");
    exit();

}

if(isset($_POST['update'])){
    $title = escape($_POST['title']);
    $description = escape($_POST['description']);
    $keywords = escape($_POST['keywords']);
    $price = escape($_POST['price']);
    $qty = escape($_POST['qty']);
    $forSale = escape($_POST['sale']);
    $active = escape($_POST['active']);
    $altImage = escape($_POST['altImage']);
    $altImage1 = escape($_POST['altImage1']);
    $altImage2 = escape($_POST['altImage2']);
    $altImage3 = escape($_POST['altImage3']);
    $altImage4 = escape($_POST['altImage4']);

    if ($_FILES['image']['name']) {
        $img = $_FILES['image']['name'];
        dealwithimage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['size'],
            $_FILES['image']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM products WHERE id = '$productID'");
        while ($row = fetch_array($getOldImage)) {
            $img = $row['image'];
        }
    }
    if ($_FILES['image1']['name']) {
        $img1 = $_FILES['image1']['name'];
        dealwithimage($_FILES['image1']['name'], $_FILES['image1']['tmp_name'], $_FILES['image1']['size'],
            $_FILES['image1']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM products WHERE id = '$productID'");
        while ($row = fetch_array($getOldImage)) {
            $img1 = $row['image1'];
        }
    }
    if ($_FILES['image2']['name']) {
        $img2 = $_FILES['image2']['name'];
        dealwithimage($_FILES['image2']['name'], $_FILES['image2']['tmp_name'], $_FILES['image2']['size'],
            $_FILES['image2']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM products WHERE id = '$productID'");
        while ($row = fetch_array($getOldImage)) {
            $img2 = $row['image2'];
        }
    }
    if ($_FILES['image3']['name']) {
        $img3 = $_FILES['image3']['name'];
        dealwithimage($_FILES['image3']['name'], $_FILES['image3']['tmp_name'], $_FILES['image3']['size'],
            $_FILES['image3']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM products WHERE id = '$productID'");
        while ($row = fetch_array($getOldImage)) {
            $img3 = $row['image3'];
        }
    }
    if ($_FILES['image4']['name']) {
        $img4 = $_FILES['image4']['name'];
        dealwithimage($_FILES['image4']['name'], $_FILES['image4']['tmp_name'], $_FILES['image4']['size'],
            $_FILES['image4']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM products WHERE id = '$productID'");
        while ($row = fetch_array($getOldImage)) {
            $img4 = $row['image4'];
        }
    }

    $addProduct = query("UPDATE products SET image = '$img', altImage = '$altImage', description = '$description', title = '$title', keywords = '$keywords', price = '$price', qty = '$qty', forSale = '$forSale', active = '$active', image1 = '$img1', altImage1 = '$altImage1', image2 = '$img2', altImage2 = '$altImage2', image3 = '$img3', altImage3 = '$altImage3', image4 = '$img4', altImage4 = '$altImage4' WHERE id = '$productID'");
    confirm($addProduct);
    set_message("You have successfully updated the product.", "success");
    redirect("products.php?update=$productID");
    exit();

}








?>

<body style="font-family: 'Patrick Hand', cursive;">
<?php
include "adminIncludes/navbars.php";
?>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center;">

                <?php
                display_message();
                if(isset($_GET['update'])){
                    echo "<h1 class='text-center title' style='margin-top: 25px;font-size: 80px;font-family: Courgette, cursive;'>Update Product</h1>";
                } else {
                    echo "<h1 class='text-center title' style='margin-top: 25px;font-size: 80px;font-family: Courgette, cursive;'>Add Product</h1>";
                }
                if($image){
                    echo "<img src='$dir/$image' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                } else {
                    echo "<img src='../assets/img/nophoto.jpg' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                }
                ?>

            </div>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input name="image" type="file" class="form-control"></div>
                </div>
                <div class="col">
                    <div class="form-group"><input value="<?php echo $altImage ?>" name="altImage" class="form-control form-control" type="text" placeholder="Alt Image Text"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><textarea name="description" class="form-control" placeholder="Description"><?php echo $description ?></textarea></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input name="title" value="<?php echo $title ?>" class="form-control form-control" type="text" placeholder="Title"></div>
                </div>
                <div class="col">
                    <div class="form-group"><input name="keywords" value="<?php echo $keywords ?>" class="form-control form-control" type="text" placeholder="Keywords"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input value="<?php echo $price ?>" name="price" class="form-control form-control" type="number" step="any" placeholder="Price"></div>
                </div>
                <div class="col">
                    <div class="form-group"><input name="qty" value="<?php echo $qty ?>" class="form-control form-control" type="number" step="1" placeholder="Qty"></div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" name="sale" id="sale">

                            <?php
                            if($forSale == 'For Sale'){
                                echo "<option value='For Sale' selected>For Sale</option>
                                    <option value='Not For Sale'>Not For Sale</option>";
                            } elseif ($forSale == 'Not For Sale'){
                                echo "<option value='For Sale'>For Sale</option>
                                      <option value='Not For Sale' selected>Not For Sale</option>";
                            } else {
                                echo "<option value=''>Please select an option</option>
                                <option value='For Sale'>For Sale</option>
                                <option value='Not For Sale'>Not For Sale</option>";
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" name="active" id="">
                        <?php
                        if($active == 'Active'){
                            echo "<option value='Active' selected>Active</option>
                                    <option value='Inactive'>Inactive</option>";
                        } elseif ($active == 'Inactive'){
                            echo "<option value='Active'>Active</option>
                                      <option value='Inactive' selected>Inactive</option>";
                        } else {
                            echo "<option value=''>Please select an option</option>
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row" style="margin-bottom: 32px;">
                <div class="col-3" style="text-align: center;">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <?php
                            if($image1){
                                echo "<img src='$dir/$image1' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            } else {
                                echo "<img src='../assets/img/nophoto.jpg' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            }
                            ?>
                            <div class="form-group"><input name="image1" type="file" style="display: block;"></div>
                            <div class="form-group"><input name="altImage1" value="<?php echo $altImage1 ?>" class="form-control" type="text" style="display: block;" placeholder="Alt Image Text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <?php
                            if($image2){
                                echo "<img src='$dir/$image2' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            } else {
                                echo "<img src='../assets/img/nophoto.jpg' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            }
                            ?>
                            <div class="form-group"><input name="image2" type="file" style="display: block;"></div>
                            <div class="form-group"><input value="<?php echo $altImage2 ?>" name="altImage2" class="form-control" type="text" style="display: block;" placeholder="Alt Image Text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <?php
                            if($image3){
                                echo "<img src='$dir/$image3' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            } else {
                                echo "<img src='../assets/img/nophoto.jpg' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            }
                            ?>
                            <div class="form-group"><input name="image3" type="file" style="display: block;"></div>
                            <div class="form-group"><input name="altImage3" value="<?php echo $altImage3 ?>" class="form-control" type="text" style="display: block;" placeholder="Alt Image Text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-3" style="text-align: center;">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <?php
                            if($image4){
                                echo "<img src='$dir/$image4' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            } else {
                                echo "<img src='../assets/img/nophoto.jpg' style='height: 250px;margin-bottom: 32px;margin-top: 32px;'>";
                            }
                            ?>
                            <div class="form-group"><input name="image4" type="file" style="display: block;"></div>
                            <div class="form-group"><input name="altImage4" value="<?php echo $altImage4 ?>" class="form-control" type="text" style="display: block;" placeholder="Alt Image Text"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <?php
                        if(isset($_GET['update'])){
                            echo "<div style='text-align: center;'><button name='update' class='btn btn-dark' type='submit'>Update Product</button></div>";
                        } else {
                            echo "<div style='text-align: center;'><button name='add' class='btn btn-dark' type='submit'>Add Product</button></div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>

<?php
include "adminIncludes/footers.php";
}
?>