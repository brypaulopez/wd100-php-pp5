<?php
    session_start();
    if (!isset($_SESSION['level'])) {
        header("Location: doodles-login.php");
    }
    else if($_SESSION['level'] != 0){
        header("Location: doodles-login.php");
    }
?>
<?php
    include "doodles-db.php";

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    // User
    $checkUser = "SELECT * FROM user_tbl WHERE user_name = '$username' AND user_password = '$password' AND user_level = 0 ";
    // Admin
    $checkAdmin = "SELECT * FROM user_tbl WHERE user_name = '$username' AND user_password = '$password' AND user_level = 1 ";
    // User Row count for checking and query
    $userResult = $conn->query($checkUser);
    $userRow = $userResult->num_rows;
    // Admin Row count for checking and query
    $adminResult = $conn->query($checkAdmin);
    $adminRow = $adminResult->num_rows;

    if ($userRow) {
        $userShow = $userResult->fetch_assoc();

        $_SESSION['id'] = $userShow['User_ID'];
        $_SESSION['level'] = $userShow['User_Level'];
        $_SESSION['username'] = $userShow['User_Name'];
        
        header("Location: index.php");
    }
    else if ($adminRow) {
        // ../PHP_PP5/admin/index.php
        $adminShow = $adminResult->fetch_assoc();
        $_SESSION['id'] = $adminShow['User_ID'];
        $_SESSION['level'] = $adminShow['User_Level'];
        $_SESSION['username'] = $adminShow['User_Name'];
        header("Location: ../PHP_PP5/admin/index.php");
    }
    else {
        header("Location: doodles-login.php");
    }
?>