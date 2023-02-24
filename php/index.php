<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register your products in our database</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../script/script.js"></script>
    <script src="../../jquery.min.js"></script>
</head>
<body>
    <!--front form where a user registers thier products-->
    <div class="outer">
        <div class="front">
            <form action="insert.php" method="post">
                <table >
                    <tr>
                        <th>name</th>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <th>category</th>
                        <td><input type="text" name="category" id="category"></td>
                    </tr>
                    <tr>
                        <th>price</th>
                        <td><input type="number" name="price" id="price"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
        <!--modal box-->
        <div id="modal-box">
            <div id="modal-form">
                <h1>update data</h1>
                <form action="refreshed.php" method="post">
                <table id="table-modal">
                    
                </table>
            </form>
            </div>
        </div>

        <!--back form from where the registered products lists shows and 
        from where user can peform the crud operations-->
        <div class="back">
            <table border="5">
                <tr>
                   <th>name</th>
                   <th>category</th>
                   <th>price</th> 
                </tr>
            
            <?php    
                $conn = mysqli_connect("localhost","root","","product-manager");
                $select = "select * from product";
                $result = mysqli_query($conn,$select);
                $num = mysqli_num_rows($result);
                for($i = 0; $i < $num; $i++){
                    $row = mysqli_fetch_array($result);
            ?>
            
                <tr>
                    <td ><?php echo $row['name']?></td>
                    <td><?php echo $row['category']?></td>
                    <td><?php echo $row['price']?></td>
                    <td><button class="update-button" data-id="<?php echo $row['name']?>">update</button></td>
                    <td><button class="delete-button" data-id="<?php echo $row['name']?>">delete</button></td>
                </tr>
            </table>
                <?php
                } 
                mysqli_close($conn);
                ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
        $(".delete-button").click(function(){
            var key = $(this).data("id");
            var element = $(this);
            //ajax code to send data in php file
            $.ajax({
                url:"delete.php",
                type:"POST",
                data: {id:key},
                success: function(data){
                    if(data == 1){
                        $(element).closest("tr").fadeOut();
                    }
                    else
                        alert("row can't be deleted");
                }
            })
        });
    });
        $(".update-button").click(function(){
            var key = $(this).data("id");
            $("#modal-box").show();
             //ajax code to send data in php file
             $.ajax({
                url:"update.php",
                type:"POST",
                data: {id:key},
                success: function(data){
                    if(data){
                        $("#table-modal").html(data);
                    }
                }
        });
        $("#submit").click(function(){
            $.ajax({
                url:"refreshed.php",
                type:"POST",
                data:{name:name,category:category,price:price},
                success:function(data){
                    if(data==1)
                    $("#modal-box").hide();
                }
            });
        });
    });
    </script>
</body>
</html>