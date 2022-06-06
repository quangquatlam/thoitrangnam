<?php
    session_start();
    if(isset( $_GET["id"]) && isset($_GET["sl"])){
        $id = $_GET["id"];
        $sl = $_GET["sl"];
        $_SESSION['cart'][$id]['soluong'] = $sl;
    }
    if(isset($_GET['id_del'])){
        $id_del=$_GET['id_del'];
        unset( $_SESSION['cart'][$id_del]);
        header("Location:giohang.php");
    }
?>