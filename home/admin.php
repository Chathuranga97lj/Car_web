<?php

    require "config.php";

    session_start();
    //$_SESSION['Adminpass'] = NULL;
    //$_SESSION['Userpass'] = NULL;
    //$_SESSION['Usermail'] = NULL;

    function alert($msg){
        echo "<script type='text/javascript'> 
        
        	alert('" . $msg . "'); 
    
        window.location = '../login/login.html';
        </script>";
    }

    if(NULL !== $_SESSION['Adminpass']){
        $_SESSION['Userpass'] = NULL;
        $_SESSION['Usermail'] = NULL;
        header("location: ../member_list/m_list.php");   
        
    }else{
        //header("location: ../login/login.html");

        alert("Please log in your Admin account");
    }
  


?>