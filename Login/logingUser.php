<?php

    require "../home/config.php";

    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // user loging
        $usermail = $_POST['user_mail'];
        $userpass = $_POST['user_pass'];

        // search db for user loging
        $sql = "SELECT * FROM register WHERE email = '$usermail' AND password = '$userpass'";
        $result = mysqli_query($con, $sql);

        $check = mysqli_fetch_array($result);


        function alert($msg){
            echo "<script type='text/javascript'> alert('" . $msg . "'); 
            window.location = 'login.html';
            </script>";
        }
  

        if(isset($check)){
            $_SESSION["Userpass"] = $userpass;
            $_SESSION["Usermail"] = $usermail;
            header("location: ../sell_car/sell.html");
            $_SESSION['Adminpass'] = NULL;
        }else{
           alert("Please check your E-mail and Password !");
           
        }

        
        
    }

    
?>