<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test1";

$con = mysqli_connect($host, $user, $password, $dbname);

if(!$con){
    die("Connection failed: " .mysqli_connect_error());
}

    $sql = "SELECT f_name, l_name, nic, city, con_no, email FROM register";

    $result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="m_list.css">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
            <div>
                <a id='home' href="../home.php">Home</a>
            </div>

            <nav>
                <ul id="MenuItems">
                    <li><a>Admin Page</a></li>
                </ul>
            </nav>
        </div>  

        <div id="heading">
            <h1>Admin page</h1>
        </div> 
        
        <?php 
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div>
                    
                    <div id='details'>
                        <h2>---User Details---</h2>
                         <!-- Displaying Data Read From Database -->
                        <span>First name :</span> <?php echo $row['f_name']; ?><br>
                        <span>Last name :</span> <?php echo $row['l_name']; ?><br>
                        <span>NIC :</span> <?php echo $row['nic']; ?><br>
                        <span>City :</span> <?php echo $row['city']; ?><br>
                        <span>Phone No :</span> <?php echo $row['con_no']; ?><br>
                        <span>E-mail :</span> <?php echo $row['email']; ?><br><hr><br><br>
                    </div>
                </div>  
                <?php 
            }
          } 
    
        ?>        

    </div>


</body>
</html>