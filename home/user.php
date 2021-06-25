<?php

    require "config.php";

    session_start();
    //$_SESSION['Adminpass'] = NULL;
    //$_SESSION['Userpass'] = NULL;
    //$_SESSION['Usermail'] = NULL;

    function alert($msg){
        echo "<script type='text/javascript'> alert('" . $msg . "'); 
        window.location = '../login/login.html';
        </script>";
    }

    
    if(NULL !== $_SESSION['Userpass'] && $_SESSION['Usermail']){
        $_SESSION['Adminpass'] = NULL;
        header("location: ../car_list/c_list.php");
        
    }else{
        alert("Please log in your User account");
    }

?>