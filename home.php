<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "test1";

$con = mysqli_connect($host, $user, $password, $dbname);

if(!$con){
    die("Connection failed: " .mysqli_connect_error());
}

if (isset($_POST["search"])){
    $brand = $_POST['dropdown1'];
    $cond = $_POST['dropdown2'];

    $sql = "SELECT  model, price, description, image FROM sell WHERE brand='$brand' && cond = '$cond' ";

    $result = mysqli_query($con, $sql);

     
}else{
    $sql = "SELECT brand, model, cond, price, description, image FROM sell WHERE brand='nissan' && cond='Unregistered' ";

    $result = mysqli_query($con, $sql);

}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./home/home.css" />
</head>

<body>
    <div class="full-page">
        <div class="navbar">
            <div id="logo">
                <img src="./img/logo.png" width="250" height="250"></img>
            </div>
            <nav>
               
                    <ul id="MenuItems" >
                        <form action="">
                            <li><a href="./home/admin.php" >Admin</a></li>
                        </form>
                        
                        <form action="">
                            <li><a href="./home/user.php">User Gallery</a></li>
                        </form>
                        <li><a href="./reg/reg.html">Register</a></li>
                        <li><a href="./Login/login.html">Login</a></li>
                </ul>
               
            </nav>
        </div>
        <h1>Hyper Car Sales Pvt Ltd</h1>

        <form method = 'POST'>
            
        <div class="search-form">
            <h2>Find your dream Car in here !</h2>
            <div id="modle">
                <label>Select Brand</label>
                <select name = "dropdown1">
                    <option value="toyota" >Toyota</option>
                    <option value="honda" >Honda</option>
                    <option value="nissan" >Nissan</option>
                </select>
            </div>

            <div id="condition">
                <label>Select Condition</label>
                <select name="dropdown2">
                    <option value="Brandnew" >Brand New</option>
                    <option value="Registered">Registered</option>
                    <option value="Unregistered">unregistered</option>
                </select>
            </div>
            <div id="btn">
                <button type='submit' class="searchbtn" name='search'>Search</button>
            </div>
        
        
        
        
        <form>

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
                    
                    <span>Model:</span> <?php echo $row['model']; ?><br>
                    
                    <span>Price:</span> <?php echo $row['price']; ?><br>
                    <span>Description:</span> <?php echo $row['description']; ?><hr><br><br>
                </div>
                </div>  
                <?php 
            }
          }
        ?> 
            
        </div>

        <footer>      
                <p>Copyright @ 2021 and Design by Chathuranga</p>
    
        </footer>
    </div>
</body>
</html>