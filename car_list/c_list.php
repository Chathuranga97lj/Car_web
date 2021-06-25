<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test1";

$con = mysqli_connect($host, $user, $password, $dbname);

if(!$con){
    die("Connection failed: " .mysqli_connect_error());
}

session_start();
$usermail = $_SESSION['Usermail'];

//$images_sql = "SELECT * FROM sell ORDER BY mail";

//$result = mysqli_query($con, $images_sql);



//$row = mysqli_fetch_array($result);

$sql = "SELECT brand, model, cond, price, description, image FROM sell WHERE mail='$usermail' ";

$result = mysqli_query($con, $sql);




//$image = $row['image'];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car List</title>
    <link rel="stylesheet" href="c_list.css" />
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a href="../home.php">Home</a>
            </div>

            <nav>
                <ul id="MenuItems">
                    <li><a>Your Porfile</a></li>
                </ul>
            </nav>
        </div>  
        <div id="heading">
            <h1>Your Selling Cars</h1>  
        </div> 

      
        <?php 
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $image = $row['image'];
                ?>
                <div>
                <img src="<?=$image ?>" width='300px' heigth='300px'>
                <div id='details'>
                <h2>---Details---</h2>
                <!-- Displaying Data Read From Database -->
                    <span>Brand:</span> <?php echo $row['brand']; ?><br>
                    <span>Model:</span> <?php echo $row['model']; ?><br>
                    <span>Condition:</span> <?php echo $row['cond']; ?><br>
                    <span>Price:</span> <?php echo $row['price']; ?><br>
                    <span>Description:</span> <?php echo $row['description']; ?><hr><br><br>
                </div>
                </div>  
                <?php 
            }
          } 
    
        ?>        
            
        
        
        
    </div>

    
</body>

</html>

<?php
mysql_close($con);

?>