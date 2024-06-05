<?php
    include "doodles-db.php";

    $id = $_POST['id'];

    // for cart
    $cartProducts = "SELECT * FROM order_tbl WHERE Order_ID = $id";
    $cartResult = $conn->query($cartProducts);
    $cartShow = $cartResult->fetch_assoc();
    $cartQty = $cartShow['Order_Qty'];
    $name = $cartShow['Order_Name'];
    $cartSize = $cartShow['Order_Size'];

    // for product update
    $specificProduct = "SELECT * FROM products_tbl WHERE Product_Name = '$name'";
    $specificResult = $conn->query($specificProduct);
    $specificShow = $specificResult->fetch_assoc();
    $specificRow = $specificResult->num_rows;

    // echo "$cartQty $name $cartSize $specificRow";

    // remove the actual order and also update the products_tbl qty by adding the qty by the removed cart
    if ($cartSize == 'xlarge' AND $specificRow == 1) {
        // Update
        $qty = $specificShow['Product_Xlarge_Qty'];
        $updateProductStmt = "UPDATE products_tbl SET Product_Xlarge_Qty = $qty+$cartQty WHERE Product_Name = '$name'";
        $conn->query($updateProductStmt);
        // Delete
        $deleteProduct = "DELETE FROM order_tbl WHERE Order_ID = $id";
        $conn->query($deleteProduct);
    }
    else if ($cartSize == 'large' AND $specificRow == 1) {
        // Update
        $qty = $specificShow['Product_Large_Qty'];
        $updateProductStmt = "UPDATE products_tbl SET Product_Large_Qty = $qty+$cartQty WHERE Product_Name = '$name'";
        $conn->query($updateProductStmt);
        // Delete
        $deleteProduct = "DELETE FROM order_tbl WHERE Order_ID = $id";
        $conn->query($deleteProduct);
    }
    else if ($cartSize == 'medium' AND $specificRow == 1) {
        // Update
        $qty = $specificShow['Product_Medium_Qty'];
        $updateProductStmt = "UPDATE products_tbl SET Product_Medium_Qty = $qty+$cartQty WHERE Product_Name = '$name'";
        $conn->query($updateProductStmt);
        // Delete
        $deleteProduct = "DELETE FROM order_tbl WHERE Order_ID = $id";
        $conn->query($deleteProduct);
    }
    else if ($cartSize == 'small' AND $specificRow == 1) {
        // Update
        $qty = $specificShow['Product_Small_Qty'];
        $updateProductStmt = "UPDATE products_tbl SET Product_Small_Qty = $qty+$cartQty WHERE Product_Name = '$name'";
        $conn->query($updateProductStmt);
        // Delete
        $deleteProduct = "DELETE FROM order_tbl WHERE Order_ID = $id";
        $conn->query($deleteProduct);
    }
    else {
        echo "<h1>There's a duplicate in the system Data, we will check on this asap.</h1>";
    }
    header("Location: index.php");
?>