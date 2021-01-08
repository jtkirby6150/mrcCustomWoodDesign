<?php include "../includes/functions.php";
adminHeaders("MRC Custom Wood Design - Admin");
include "../includes/init.php";
if(!isset($_SESSION['username'])){
    set_message("Sorry, you must be logged in to view that page.");
    redirect("../login.php");
    exit();
} else {

$dir = "../assets/img/products";
?>

<body style="font-family: 'Patrick Hand', cursive;">
    <?php include "adminIncludes/navbars.php"; ?>
    <div class="container">
    <?php display_message(); ?>
    <h1 class="text-center title" style="margin-top: 25px;margin-bottom: 75px; font-size: 80px;font-family: Courgette, cursive;">Welcome, <?php echo strtoupper($_SESSION['username']); ?></h1>
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1" style="color: rgb(0,0,0);background: #cfe9f9;border-color: #000000;">All Items</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2" style="border-color: #000000;background: #cfe9f9;color: rgb(0,0,0);">Active Items</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3" style="color: rgb(0,0,0);background: #cfe9f9;border-color: #000000;">Inactive Items</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4" style="color: rgb(0,0,0);background: #cfe9f9;border-color: rgb(0,0,0);">Company Info</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <p>This is all items "Active" and "Inactive".</p>
                    <div class="form-group"><a href="products.php" name="register" tabindex="6" class="btn btn-secondary" type="submit" style="background: rgb(0,77,146);">Add New Item</a></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item (include image title short descr.</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>For Sale?</th>
                                    <th>Active?</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getProductList = query("SELECT * FROM products");
                            confirm($getProductList);
                            while($row = fetch_array($getProductList)){
                                $productID = $row['id'];
                                $image = $row['image'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $price = number_format($row['price'], 2, '.', ',');
                                $qty = $row['qty'];
                                $sale = $row['forSale'];
                                $active = $row['active'];

                                echo "<tr>
                                    <td>
                                    <p>$title</p>
                                            <img src='$dir/$image' style='height: 250px;'>
                                        <p>$description</p>
                                    </td>
                                    <td>&dollar;$price</td>
                                    <td>$qty</td>
                                    <td>$sale</td>
                                    <td>$active</td>
                                    <td>
                                    <a href='products.php?update=$productID'><i class='fa fa-pencil' style='font-size: 32px;color: rgb(83,174,109);'></i></a>
                                    <a href='products.php?delete=$productID' onclick='return checkDelete()'><i class='fa fa-trash' style=' margin-left: 15px; font-size: 32px;color: var(--danger);'></i></a>";
                                if($active == 'Inactive'){
                                    echo "<br><br><a href='products.php?setActive=$productID' class='btn btn-info'>Set Active</a>";
                                } elseif($active == 'Active') {
                                    echo "<br><br><a href='products.php?setInactive=$productID' class='btn btn-info'>Set Inactive</a>";
                                }
                                echo "</td></tr>";
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-2">
                    <p>This list is all 'Active' items on the site.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item (include image title short descr.</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>For Sale?</th>
                                    <th>Active?</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getProductList = query("SELECT * FROM products WHERE active = 'Active'");
                            confirm($getProductList);
                            while($row = fetch_array($getProductList)){
                                $productID = $row['id'];
                                $image = $row['image'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $price = number_format($row['price'], 2, '.', ',');
                                $qty = $row['qty'];
                                $sale = $row['forSale'];
                                $active = $row['active'];

                                echo "<tr>
                                    <td>
                                    <p>$title</p>
                                            <img src='$dir/$image' style='height: 250px;'>
                                        <p>$description</p>
                                    </td>
                                    <td>&dollar;$price</td>
                                    <td>$qty</td>
                                    <td>$sale</td>
                                    <td>$active</td>
                                    <td>
                                    <a href='products.php?update=$productID'><i class='fa fa-pencil' style='font-size: 32px;color: rgb(83,174,109);'></i></a>
                                    <a href='products.php?delete=$productID' onclick='return checkDelete()'><i class='fa fa-trash' style=' margin-left: 15px; font-size: 32px;color: var(--danger);'></i></a>";
                                if($active == 'Inactive'){
                                    echo "<br><br><a href='products.php?setActive=$productID' class='btn btn-info'>Set Active</a>";
                                } elseif($active == 'Active') {
                                    echo "<br><br><a href='products.php?setInactive=$productID' class='btn btn-info'>Set Inactive</a>";
                                }
                                echo "</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-3">
                    <p>Content for tab 3.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item (include image title short descr.</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>For Sale?</th>
                                    <th>Active?</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getProductList = query("SELECT * FROM products WHERE active = 'Inactive'");
                            confirm($getProductList);
                            while($row = fetch_array($getProductList)){
                                $productID = $row['id'];
                                $image = $row['image'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $price = number_format($row['price'], 2, '.', ',');
                                $qty = $row['qty'];
                                $sale = $row['forSale'];
                                $active = $row['active'];

                                echo "<tr>
                                    <td>
                                    <p>$title</p>
                                            <img src='$dir/$image' style='height: 250px;'>
                                        <p>$description</p>
                                    </td>
                                    <td>&dollar;$price</td>
                                    <td>$qty</td>
                                    <td>$sale</td>
                                    <td>$active</td>
                                    <td>
                                    <a href='products.php?update=$productID'><i class='fa fa-pencil' style='font-size: 32px;color: rgb(83,174,109);'></i></a>
                                    <a href='products.php?delete=$productID' onclick='return checkDelete()'><i class='fa fa-trash' style=' margin-left: 15px; font-size: 32px;color: var(--danger);'></i></a>";
                                if($active == 'Inactive'){
                                    echo "<br><br><a href='products.php?setActive=$productID' class='btn btn-info'>Set Active</a>";
                                } elseif($active == 'Active') {
                                    echo "<br><br><a href='products.php?setInactive=$productID' class='btn btn-info'>Set Inactive</a>";
                                }
                                echo "</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-4">
                    <p>This list is all 'Active' items on the site.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact Info</th>
                                    <th>Address</th>
                                    <th>Facebook</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>

                            <?php
                            if(isset($_POST['updateCompanyInfo'])){
                                $title = escape($_POST['name']);
                                $phone = escape($_POST['phone']);
                                $email = escape($_POST['email']);
                                $address = escape($_POST['address']);
                                $city = escape($_POST['city']);
                                $state = escape($_POST['state']);
                                $zip = escape($_POST['zip']);
                                $facebook = escape($_POST['facebook']);

                                if ($_FILES['image']['name']) {
                                    $img = $_FILES['image']['name'];
                                    dealwithimage($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['size'],
                                        $_FILES['image']['error'], $dir);
                                } else {
                                    $getOldImage = query("SELECT * FROM company_info WHERE id = 1");
                                    while ($row = fetch_array($getOldImage)) {
                                        $img = $row['logo'];
                                    }
                                }

                                $updateCompany = query("UPDATE company_info SET name = '$title', phone = '$phone', email = '$email', address = '$address', city = '$city', state = '$state', zip = '$zip', facebook = '$facebook', logo = '$img' WHERE id = 1");
                                confirm($updateCompany);
                                set_message("You have successfully updated your company information.", "success");
                                redirect("admin.php");
                                exit();
                            }
                            ?>



                            <form method="post" enctype="multipart/form-data">
                            <tbody>
                            <?php
                            $getCompany = query("SELECT * FROM company_info WHERE id = 1");
                            confirm($getCompany);
                            while($row = fetch_array($getCompany)) {
                                $compName = $row['name'];
                                $compPhone = $row['phone'];
                                $compEmail = $row['email'];
                                $compAddress = $row['address'];
                                $compCity = $row['city'];
                                $compState = $row['state'];
                                $compZip = $row['zip'];
                                $compFacebook = $row['facebook'];
                                $compLogo = $row['logo'];

                                echo "<tr>
                                <td>
                                    <input class='form-control' name='name' type='text' placeholder='Company Name' value='$compName'>
                                    <img src='$dir/$compLogo' style='height: 250px;'>
                                    <input type='file' name='image'>
                                </td>
                                <td>
                                <input class='form-control' type='text' name='phone' placeholder='Phone' value='$compPhone'>
                                <br><input class='form-control' type='email' name='email' placeholder='Email' value='$compEmail'>
                                </td>
                                <td>
                                <input class='form-control' type='text' name='address' value='$compAddress'>
                                <br><input class='form-control' type='text' name='city' value='$compCity'>
                                <br><input class='form-control' type='text' name='state' value='$compState'>
                                <br><input class='form-control' type='text' name='zip' value='$compZip'>
                                </td>
                                <td><input type='text' class='form-control' name='facebook' value='$compFacebook' placeholder='Facebook'></td>
                                <td>
                                <button type='submit' name='updateCompanyInfo' class='btn btn-block btn-info'>Update Company Info</button></td>
                            </tr>";
                            }
                            ?>


                            </tbody>
                        </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php include "adminIncludes/footers.php";
}