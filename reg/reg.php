<?php



    // validate inputs
    $f_name = val($_POST['f_name']);
    $l_name = val($_POST['l_name']);
    $nic = val($_POST['nic']);
    $city = val($_POST['city']);
    $con_no = val($_POST['con_no']);
    $email = val($_POST['email']);
    $pass = val($_POST['pass']);
    $con_pass = val($_POST['con_pass']);

    function val($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $host = "localhost";
    $user = "root";
    $dbpassword = "";
    $dbname = "test1";

    $con =  new mysqli($host, $user, $dbpassword, $dbname);

    $sql = "INSERT INTO  register (f_name, l_name, nic, city, con_no, email, password, con_password)
            VALUES ('$f_name', '$l_name', '$nic', '$city', '$con_no', '$email', '$pass', '$con_pass')";


    if($con->query($sql)===TRUE){
        //echo "new record created!";
        header("location: reg.html");
    }else{
        echo "Error " . $sql . $con->error;
    }

    $con->close();

?>