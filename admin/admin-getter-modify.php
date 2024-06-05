<?php
    session_start();

    if (!isset($_SESSION['level'])) {
        header("Location: ../doodles-login.php");
    }
    else if($_SESSION['level'] != 1){
        header("Location: ../doodles-login.php");
    }
?>
<?php
    include "../doodles-db.php";
    $id = $_POST['ID'];
    
    if (isset($_POST['DELETE'])) {
        $deleteProduct = "DELETE FROM products_tbl WHERE Product_ID = $id";
        $conn->query($deleteProduct);
        header("Location: index.php");
    }
    if (isset($_POST['UPDATE'])) {
        $name = $_POST['productName'];
        $price = $_POST['productPrice'];
        $XL = $_POST['Xlarge'];
        $Large = $_POST['Large'];
        $Medium = $_POST['Medium'];
        $Small = $_POST['Small'];
        $Timeline = $_POST['Timeline'];
        $Category = $_POST['Category'];
        $Description = $_POST['description'];
        $Sale = $_POST['Sale'];
        // $directory = "../img/";
        // $image = $directory . basename($_FILES['image']['name']);

        // move_uploaded_file($_FILES['image']['tmp_name'], $image);
        // echo "$image";
        $updateProductStmt = "UPDATE products_tbl SET Product_Name = '$name', Product_Price = '$price', Product_Xlarge_Qty = '$XL', Product_Large_Qty = '$Large', Product_Medium_Qty = '$Medium', Product_Small_Qty = '$Small', Product_Timeline = '$Timeline', Product_Category = '$Category', Product_Sale = '$Sale', Product_Desc = '$Description' WHERE Product_ID = $id";
        
        $conn->query($updateProductStmt);
        header("Location: index.php");
    }
?>