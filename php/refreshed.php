<?php
    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];
    $conn = mysqli_connect("localhost","root","","product-manager");
    $update = "update product set name = '$name', category = '$category', price = '$price'";
    $ud = mysqli_query($conn, $update);
    header("location://localhost/products-manager/php/index.php");
?>