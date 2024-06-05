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

    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $XL = $_POST['XLarge'];
    $Large = $_POST['Large'];
    $Medium = $_POST['Medium'];
    $Small = $_POST['Small'];
    $Timeline = $_POST['Timeline'];
    $Category = $_POST['Category'];
    $Sale = $_POST['Sale'];
    $directory = "../img/";
    $image = $directory . basename($_FILES['image']['name']);
    $description = $_POST['description'];

    move_uploaded_file($_FILES['image']['tmp_name'], $image);
    $insertProductStmt = "INSERT INTO products_tbl (Product_Name, Product_Price, Product_Xlarge_Qty, Product_Large_Qty, Product_Medium_Qty, Product_Small_Qty, Product_Timeline, Product_Category, Product_Sale, Product_Image, Product_Desc) VALUES ('$name', '$price', '$XL', '$Large', '$Medium', '$Small', '$Timeline', '$Category', '$Sale', '$image', '$description')";
    $conn->query($insertProductStmt);
    header("Location: admin-add-products.php");
?>