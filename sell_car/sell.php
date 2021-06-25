<?php


$host = "localhost";
$user = "root";
$password = "";
$dbname = "test1";

$con = mysqli_connect($host, $user, $password, $dbname);

session_start();
$usermail = $_SESSION['Usermail'];

if(!$con){
    die("Connection failed: " .mysqli_connect_error());
} /*else{
    echo "connected ";
}
*/   

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $cond = $_POST['dropdown'];
    $price = $_POST['price'];
    $description = $_POST['descrip'];

    //$sql = "INSERT INTO sell " . "(brand, model, cond, price, description)" . "VALUES('$brand', '$model', '$cond', '$price', '$description')";
    //mysqli_select_db($con, 'test1');
    //mysqli_query($con, $sql);



if(isset($_POST['upload'])){
    $filename = $_FILES['file']['name'];
    $target_dir = "upload/";

    if($filename != ''){

      $target_file = $target_dir.basename($_FILES['file']['name']);

      //file extension
      $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      //valid file extention
      $extensions_arr = array("jpg", "jpeg","png", "gif");

      //check extention
      if(in_array($extension, $extensions_arr)){

        //convert base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));

        $image = "data::image/".$extension.";base64,".$image_base64;

        //$query = "INSERT INTO sell(image) VALUES('".$image."')";
        //mysqli_query($con, $query);

        $sql = "INSERT INTO sell " . "(mail, brand, model, cond, price, description, image)" . "VALUES('$usermail','$brand', '$model', '$cond', '$price', '$description', '$image')";
        mysqli_select_db($con, 'test1');
        mysqli_query($con, $sql);
        header("location: sell.html");
      }
   }
  }


?>