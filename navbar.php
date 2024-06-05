<?php
    if (!isset($_SESSION['level'])) {
        header("Location: doodles-login.php");
    }
    else if($_SESSION['level'] != 0){
        header("Location: doodles-login.php");
    }
    include "doodles-db.php";
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/doodles-logo-bg.png" alt="" class="w-50 px-5"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu bcyan" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="shirts.php">Shirts</a></li>
                        <li><a class="dropdown-item" href="jackets.php">Jacket</a></li>
                        <!-- <li><hr class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="head_wear.php">Head wear</a></li>
                        <li><a class="dropdown-item" href="bottoms.php">Bottoms</a></li>
                    </ul>
                    </li>
                <li class="nav-item">
                <a class="nav-link" href="sale.php">Sale</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="ourstory.php">Our Story</a>
                </li>
            </ul>
            <form class="d-flex">
                
                <button class="pink ms-4 cart-btn" type ="button" data-bs-toggle="modal" data-bs-target="#cartModal"><span class="cart-count">
                    <?php
                        $id = $_SESSION['id'];
                        $cartQuery = "SELECT * FROM user_tbl INNER JOIN order_tbl ON user_tbl.User_ID = order_tbl.Order_User_ID WHERE order_tbl.Order_User_ID = $id";
                        $cartResult = $conn->query($cartQuery);
                        $cartRow = $cartResult->num_rows;
                        echo "<h6 class='hpink'>$cartRow</h6>";
                    ?>
                </span><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #2874B4;"></i></button>
                <button class="btn yellow ms-2"><a class="btn yellow p-0" href="doodles-logout.php">Logout</button></a>
            </form>
            </div>
    </nav>