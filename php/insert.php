 <!--insertion code -->
 <?php
        $name=$_POST['name'];
        $category=$_POST['category'];
        $price=$_POST['price'];
        $conn = mysqli_connect("localhost","root","","product-manager");
        $insert = "insert into product values('$name','$category','$price')";
        $query = mysqli_query($conn,$insert);
        if ($query)
        header("location://localhost/products-manager/php/index.php");
?>