<?php
    session_start();

    if (!isset($_SESSION['level'])) {
        header("Location: ../doodles-login.php");
    }
    else if($_SESSION['level'] != 1){
        header("Location: ../doodles-login.php");
    }
?>
<!-- admin template -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doodles Clothing</title>
    <!-- for favicon -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/213e54b3b6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid ">
        <div class="row flex-nowrap">
            <?php
                include "admin-navbar.php";
            ?>
            <div class="col-lg-10 ">
                <!-- CONTENT -->
                <div class="col-lg-12 text-center rounded" style="">
                    <h1 class="hpurple mt-5">Welcome Admin!</h1>
                    <?php
                        include "../doodles-db.php";
                    ?>
                    <h1 class="hpurple">Product List</h1>
                    <div class="row g-5 pt-0 p-5">
                        <?php
                            $productsStmt = "SELECT * FROM products_tbl";
                            $productsResult = $conn->query($productsStmt);
                            while ($productsShow = $productsResult->fetch_assoc()) {
                                echo "
                                    <div class='col-4 '>
                                    <form action='admin-getter-modify.php' class='text-center' method = 'POST'>
                                    <div class='row p-0 bgreen'>
                                        <div class='col-6 pe-0'>
                                            <div class='card w-100'>
                                                <input type='hidden' name='ID' value='$productsShow[Product_ID]' style='width: 30px !important;'>
                                                <img src='$productsShow[Product_Image]' class='card-img-top w-100' alt='' style='height: 200px !important;'>
                                                <input type='file' name='image' class='form-control'>
                                                <div class='card-body'>
                                                    <div class='row'>
                                                        <p class='card-title col-6 p-0'><input type='text' value='$productsShow[Product_Name]' name='productName' style='width: 100px !important;'></p>
                                                        <p class='card-title col-6 p-0'><input type='number' value='$productsShow[Product_Price]' name='productPrice' style='width: 70px !important;'></p>
                                                    </div>
                                                    <p class='card-text text-center row'>
                                                    <label class='form-label' for='Xlarge'>XL Qty</label>
                                                    <input type='number' class='bpurple' value='$productsShow[Product_Xlarge_Qty]' name='Xlarge'>
                                                    <label class='form-label' for='Large'>Large Qty</label>
                                                    <input type='number' class='bpurple' value='$productsShow[Product_Large_Qty]' name='Large'>
                                                    <label class='form-label' for='Medium'>Medium Qty</label>
                                                    <input type='number' class='bpurple' value='$productsShow[Product_Medium_Qty]' name='Medium'>
                                                    <label class='form-label' for='Small'>Small Qty</label>
                                                    <input type='number' class='bpurple' value='$productsShow[Product_Small_Qty]' name='Small'>
                                                    <input class='btn bpurple yellow' type='submit' value='Delete' id='showBtn' name='DELETE'>
                                                    <input class='btn bpurple yellow' type='submit' value='Update' id='showBtn' name='UPDATE'>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-6 bg-white ps-0'>
                                            <label class='form-label' for='Category'>Category</label>
                                            <select class='form-select' aria-label='Default select example' name='Category'>
                                                <option selected>$productsShow[Product_Category]</option>
                                                <option>T-Shirts</option>
                                                <option>Jackets</option>
                                                <option>Bottoms</option>
                                                <option>Head Wear</option>
                                            </select>
                                            <textarea class='form-control mt-2' name='description' id='' placeholder='Enter Product Description...' style='height: 200px !important;' >$productsShow[Product_Desc]</textarea>
                                            <label class='form-label' for='Timeline'>Timeline</label>
                                            <select class='form-select' aria-label='Default select example' name='Timeline'>
                                                <option selected>$productsShow[Product_Timeline]</option>
                                                <option>Old</option>
                                                <option>New</option>
                                            </select>
                                            <label class='form-label' for='Sale'>Sale</label>
                                            <select class='form-select' aria-label='Default select example' name='Sale'>
                                                <option>On Sale</option>
                                                <option>Not On Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
