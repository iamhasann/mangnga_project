<?php
include "../connect/connect_db.php";  //เชื่อมต่อ database
$get_name=$_REQUEST['fname'];
$get_type=$_REQUEST['ftype'];
$get_color=$_REQUEST['fcolor'];
$get_dealer=$_REQUEST['fdealer'];
$get_price=$_REQUEST['fprice'];
$get_age=$_REQUEST['fage'];
$filename = $_FILES["fimg"]["name"];
/* ทดสอบการส่งข้อมูลจากไฟล์ที่ชื่อ product_form_insert.php
echo $get_name;
echo $get_type;
echo $get_dealer;
*/
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fimg"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fimg"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fimg"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fimg"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 
try{
$sql_insert = "INSERT INTO `product_tb`
 VALUES ('','$get_name','$get_type','$get_color','$get_dealer','$get_price','$get_age','$filename')";
 
    $conn->exec($sql_insert);
    echo "บันทึกข้อมูลเรียบร้อยเเล้ว";
echo "<script>window.location.href='product_select.php';</script>";
 
 
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
 
$conn = null;
 
?>
