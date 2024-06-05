<?php
    session_start();
    if (!isset($_SESSION['level'])) {
        header("Location: doodles-login.php");
    }
    else if($_SESSION['level'] != 0){
        header("Location: doodles-login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doodles Clothing</title>
    <!-- for favicon -->
    <link rel="stylesheet" href="style.css">
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
    <!-- NAVBAR -->
    <?php
        include "navbar.php";
    ?>
    <!-- CART MODAL -->
    <?php
        include "cart.php";
    ?>
    <div class="container mt-5">
    <?php
        include "doodles-db.php";
        $id = $_POST['id'];

        $specificProduct = "SELECT * FROM products_tbl WHERE Product_ID = $id";
        $specificResult = $conn->query($specificProduct);
        $specificShow = $specificResult->fetch_assoc();
        echo "
            <div class='row'>
                <form action='cart-getter.php' method ='POST' class='row'>
                    <div class='col-md-12 col-lg-6 p-5'>
                        <img src='img/$specificShow[Product_Image]' alt='' class='w-100 byellow rcyellow'>
                    </div>
                    <div class='col-md-12 col-lg-6 p-5'>
                        <h1 class='hpurple'>$specificShow[Product_Name]</h1>
                        <p class='fs-5'>&#8369;$specificShow[Product_Price]</p>
                        <p class='fs-5 bcyan p-2 mt-2'>$specificShow[Product_Desc]</p>
                        <div class='row text-center mt-3'>
                            <h2 class='hblack fs-1'>Size</h2>
                            <div class='radio-check col-md-3 col-6'>
                                <input type='radio' value='small' class='btn-check' name='options' id='option1' >
                                <label class='btn green col-12' for='option1'>S</label>
                            </div>
                            <div class='radio-check col-md-3 col-6'>
                                <input type='radio' value='medium' class='btn-check' name='options' id='option2'>
                                <label class='btn green col-12' for='option2'>M</label>
                            </div>
                            <div class='radio-check col-md-3 col-6'>
                                <input type='radio' value='large' class='btn-check' name='options' id='option3'>
                                <label class='btn green col-12' for='option3'>L</label>
                            </div>
                            <div class='radio-check col-md-3 col-6'>
                                <input type='radio' value='xlarge' class='btn-check' name='options' id='option4'>
                                <label class='btn green col-12' for='option4'>XL</label>
                            </div>
                        </div>
                        <div class='row text-center m-auto mt-3'>
                            <h2 class='hblack fs-1'>Quantity</h2>
                            <div class='btn yellow col-2 fs-1 text-center m-auto minusClass me-0'> - </div>
                            <div class='col-6 col-md-3'>
                                <input type='number' id='qty-id' value='1' name='quantity' class='hblack fs-4 col-1 mx-0 my-1 text-center m-auto form-control w-100 p-3'>
                            </div>
                            <div class='btn yellow col-2 fs-1 text-center m-auto plusClass ms-0'> + </div>
                        </div>
                        <input type='hidden' name ='id' value='$specificShow[Product_ID]'>
                        <input type='submit' name='Cart' value='Add to Cart' class='btn purple col-12 mt-3'>
                    </div>
                </form>
            </div>
        ";
    ?>
    </div>
    <!-- FOOTER -->
    <?php
        include "footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</html>