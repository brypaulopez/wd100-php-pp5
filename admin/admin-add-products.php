<?php
    session_start();

    if (!isset($_SESSION['level'])) {
        header("Location: ../doodles-login.php");
    }
    else if($_SESSION['level'] != 1){
        header("Location: ../doodles-login.php");
    }
?>
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
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
                include "admin-navbar.php";
            ?>
            <div class="col-lg-10 ">
            <form class="row g-4 bpurple m-5" action="admin-getter.php" method="POST" enctype="multipart/form-data">
                <h1 class="hpurple">Insert Products</h1>
                <div class="col-6">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="productName" required>
                </div>
                <div class="col-6">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" name="productPrice" required>
                </div>
                <div class="col-3">
                    <label for="xlargeQty" class="form-label">XL size Quantity</label>
                    <input type="number" class="form-control" name="XLarge" required>
                </div>
                <div class="col-3">
                    <label for="largeQty" class="form-label">Large size Quantity</label>
                    <input type="number" class="form-control" name="Large" required>
                </div>
                <div class="col-3">
                    <label for="mediumQty" class="form-label">Medium size Quantity</label>
                    <input type="number" class="form-control" name="Medium" required>
                </div>
                <div class="col-3">
                    <label for="smallQty" class="form-label">Small size Quantity</label>
                    <input type="number" class="form-control" name="Small" required>
                </div>
                <label class="col-1 col-form-label" for="Timeline">Timeline</label>
                <div class="col-4">
                    <select class="form-select" aria-label="Default select example" name="Timeline" required>
                        <option>Old</option>
                        <option>New</option>
                    </select>
                </div>
                <label class="col-1 col-form-label" for="Category">Category</label>
                <div class="col-4">
                    <select class="form-select" aria-label="Default select example" name="Category" required>
                        <option>T-Shirts</option>
                        <option>Jackets</option>
                        <option>Bottoms</option>
                        <option>Head Wear</option>
                    </select>
                </div>
                <div class="col-2 form-check" required>
                    <input class="form-check-input" type="checkbox" value="On Sale" name="Sale">
                    <label class="form-check-label" for="Sale">
                        On sale
                    </label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Not on Sale" name="Sale">
                    <label class="form-check-label" for="Sale">
                        Not On sale
                    </label>
                </div>
                <div class="col-12 text-center d-flex justify-content-center align-items-center flex-wrap">
                    <div class="col-12">
                        <h2 class="hpurple">Images</h2>
                    </div>
                    <div class="col-7">
                        <input type="file" name="image" class="form-control" required>
                        <textarea class="form-control mt-2" name="description" id="" placeholder="Enter Product Description.."></textarea>
                    </div>
                    <input class="btn bpurple yellow col-6 m-3" type="submit" value="Upload" id="showBtn">
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>




