<?php
    $row = $_POST['id'];
    $conn = mysqli_connect("localhost","root","","product-manager");
    $delete = "delete from product where name = '$row'";
    $result = mysqli_query($conn,$delete);
    if($result == 1)
    echo 1;
    else
    echo 0;
?>