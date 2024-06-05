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
    <!-- CHECK OUT MODAL -->
    <?php
        include "checkout.php";
    ?>
    <!-- Main body -->
    <h1 class="hyellow text-center mt-3">Sale</h1>
    <div class="container text-center">
    <img src="img/sale.jpg" alt="" class="w-75 m-auto rounded-pill byellow">
        <div class="row g-5 mt-5">
            <?php
                include "doodles-db.php";
                $sqlBatch = "SELECT * FROM products_tbl WHERE Product_Sale = 'On Sale'";
                $resultBatch = $conn->query($sqlBatch);
                while ($batchShow = $resultBatch->fetch_assoc()) {
                    echo "
                    <div class='col-3 col-xl-3 col-lg-4 col-md-6 col-12'>
                        <form method='POST' action='all-product-getter.php'>
                            <div class='card cyellow darkpurple text-center m-auto' style='width: 18rem;color: black !important;'>
                                <img src='img/$batchShow[Product_Image]' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                <h5 class='card-title hyellow fs-3'>$batchShow[Product_Name]</h5>
                                <p class='card-text'>&#8369;$batchShow[Product_Price]</p>
                                <input type='hidden' name='id' value='$batchShow[Product_ID]'> 
                                <input class='btn bpink yellow' type='submit' value='Buy Now' name='Order'>
                                </div>
                            </div>
                        </form>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
    <!-- FOOTER -->
    <?php
        include "footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>