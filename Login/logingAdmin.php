<?php

    require "../home/config.php";

    session_start();

    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
        // admin login
        // note: admin has no database, only pre-set password (adminCJ) for login and email for display admin name
        // using this password any one can go and edit admin page    
        $adminmail = $_POST['admin_mail'];
        $adminpass = $_POST['admin_pass'];

        //pre-set admin password
        $adPass = "adminCJ";   
        
        function alert($msg){
            echo "<script type='text/javascript'> alert('" . $msg . "'); 
                    window.location = 'login.html';
                </script>";
        }


        $_SESSION['Adminmail'] = $adminmail;        
        // for loing admin page
        if($adPass == $adminpass){
            $_SESSION["Adminpass"] = $adminpass;
            header("location: ../member_list/m_list.php ");
            $_SESSION["Userpass"] = NULL;
            $_SESSION["Usermail"] = NULL;
        }else{
            alert("Login only for Admin ! Please check your admin Password !");
        }
        
    }

    

?>