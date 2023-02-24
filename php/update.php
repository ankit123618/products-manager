<?php
    $key = $_POST["id"];
    //echo $key;
    
    $conn = mysqli_connect("localhost","root","","product-manager");
    $select = "select * from product where name = '$key'";
    $result = mysqli_query($conn,$select);
    //$num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $n=$row['name'];
    $p=$row['category'];
    $c=$row['price'];
    $output = "<tr>
    <th>name</th>
    <td><input type='text' name='name' id='name' value=' $n'></td>
</tr>
<tr>
    <th>category</th>
    <td><input type='text' name='category' id='category' value='$p'></td>
</tr>
<tr>
    <th>price</th>
    <td><input type='number' name='price' id='price' value='$c'</td>
</tr>
<tr>
    <td><input type='submit' value='submit' id='submit'></td>
</tr>";
    echo $output;  

?>