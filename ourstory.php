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
    <div class="container text-center mt-5">
    <img src="img/about-us.png" alt="" class="w-75 m-auto rounded-pill bpink">
        <div class="row g-5 mt-5">
            <div class="col-10 m-auto bpink rounded-pill">
                <h2 class="hpink">Our Story</h2>
                <p>Doodle Clothing is a local reseller website based in the Philippines that offers high-quality, discounted clothing from popular brands. Founded in 2022, our mission is to provide our customers with access to stylish and affordable apparel without compromising on quality.</p>
            </div>
            <div class="col-10 m-auto mt-3 bpurple rounded-pill">
                <h2 class="hpurple">Our Passion for Fashion</h2>
                <p>As fashion enthusiasts ourselves, we understand the importance of looking and feeling your best. That's why we scour the market for the best deals on trendy and timeless pieces from brands like Gnarly, DBTK, Hghmnds, and many others. By leveraging our connections and negotiating skills, we're able to offer these products at prices that are just slightly above our own cost, ensuring that our customers get the most value for their money.</p>
            </div>
            <div class="col-10 m-auto mt-3 bcyan rounded-pill">
                <h2 class="hcyan">Our Commitment to Sustainability</h2>
                <p>At Doodle Clothing, we believe in the importance of sustainable fashion. We carefully select our brand partners to ensure that they align with our values of environmental responsibility and ethical production. By offering pre-owned or discounted items, we're able to reduce waste and give new life to clothing that might otherwise end up in landfills.</p>
            </div>
            <div class="col-10 m-auto mt-3 bgreen rounded-pill">
                <h2 class="hgreen">Our Dedication to Customer Satisfaction</h2>
                <p>We are committed to providing our customers with an exceptional shopping experience. From the moment you visit our website to the day your order arrives, we strive to make the process as smooth and enjoyable as possible. Our team of dedicated professionals is always on hand to answer your questions, address your concerns, and ensure that you're completely satisfied with your purchase.</p>
            </div>
            <div class="col-10 m-auto mt-3 byellow rounded-pill">
                <h2 class="hyellow">Join the Doodle Clothing Community</h2>
                <p>Whether you're a fashion-forward individual or simply looking to save on your wardrobe essentials, we invite you to explore the world of Doodle Clothing. Browse our curated collection, discover new brands, and join our community of savvy shoppers who are passionate about sustainable and affordable fashion.</p>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <?php
        include "footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>