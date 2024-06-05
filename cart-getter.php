<?php
    session_start();
    if (!isset($_SESSION['level'])) {
        header("Location: doodles-login.php");
    }
    else if($_SESSION['level'] != 0){
        header("Location: doodles-login.php");
    }
    include "doodles-db.php";
    $id = $_POST['id'];
    // echo "$productId $userId";

    $specificProduct = "SELECT * FROM products_tbl WHERE Product_ID = $id";
    $specificResult = $conn->query($specificProduct);
    $specificShow = $specificResult->fetch_assoc();

    // getting data to cart
    $cartID = $specificShow['Product_ID'];
    $userCartID = $_SESSION['id'];
    $cartName = $specificShow['Product_Name'];
    $cartQty = $_POST['quantity'];
    $cartPrice = $specificShow['Product_Price'];
    $cartSize = $_POST['options'];
    $cartImage = $specificShow['Product_Image'];
    echo "$cartID $userCartID $cartName $cartQty $cartPrice $cartSize $cartImage";

        //  if else for checking qty if available
    if ($cartSize == 'xlarge' AND $specificShow['Product_Xlarge_Qty'] >= $cartQty) {
        $insertProductCart = "INSERT INTO order_tbl (Order_User_ID, Order_Name, Order_Qty, Order_Price, Order_Size, Order_Image) VALUES ('$userCartID', '$cartName', '$cartQty', '$cartPrice', '$cartSize', '$cartImage')";
        $conn->query($insertProductCart);
        // Updating Product base on what the customer's quantity
        $qty = $specificShow['Product_Xlarge_Qty'];
        $updateProduct = "UPDATE products_tbl SET Product_Xlarge_Qty = $qty-$cartQty WHERE Product_ID = $id";
        $conn->query($updateProduct);
    }
    else if ($cartSize == 'large' AND $specificShow['Product_Large_Qty'] >= $cartQty) {
        $insertProductCart = "INSERT INTO order_tbl (Order_User_ID, Order_Name, Order_Qty, Order_Price, Order_Size, Order_Image) VALUES ('$userCartID', '$cartName', '$cartQty', '$cartPrice', '$cartSize', '$cartImage')";
        $conn->query($insertProductCart);
        $qty = $specificShow['Product_Large_Qty'];
        $updateProduct = "UPDATE products_tbl SET Product_Large_Qty = $qty-$cartQty WHERE Product_ID = $id";
        $conn->query($updateProduct);
    }
    else if ($cartSize == 'medium' AND $specificShow['Product_Medium_Qty'] >= $cartQty) {
        $insertProductCart = "INSERT INTO order_tbl (Order_User_ID, Order_Name, Order_Qty, Order_Price, Order_Size, Order_Image) VALUES ('$userCartID', '$cartName', '$cartQty', '$cartPrice', '$cartSize', '$cartImage')";
        $conn->query($insertProductCart);
        $qty = $specificShow['Product_Medium_Qty'];
        $updateProduct = "UPDATE products_tbl SET Product_Medium_Qty = $qty-$cartQty WHERE Product_ID = $id";
        $conn->query($updateProduct);
    }
    else if ($cartSize == 'small' AND $specificShow['Product_Small_Qty'] >= $cartQty){
        $insertProductCart = "INSERT INTO order_tbl (Order_User_ID, Order_Name, Order_Qty, Order_Price, Order_Size, Order_Image) VALUES ('$userCartID', '$cartName', '$cartQty', '$cartPrice', '$cartSize', '$cartImage')";
        $conn->query($insertProductCart);
        $qty = $specificShow['Product_Small_Qty'];
        $updateProduct = "UPDATE products_tbl SET Product_Small_Qty = $qty-$cartQty WHERE Product_ID = $id";
        $conn->query($updateProduct);
    }
    else {
        header("Location: all-product.php");
    }
    header("Location: all-product.php");
?>