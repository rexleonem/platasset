<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

// $file = $_FILES['image']['name'];
// $file_loc = $_FILES['image']['tmp_name'];
// $folder="images/"; 
// $new_file_name = strtolower($file);
// $final_file=str_replace(' ','-',$new_file_name);

$name=$_POST['name'];
$email=$_POST['email'];
$pwd=$_POST['password'];
$pwd1=$_POST['confirm_password'];
if ($pwd === $pwd1) {
    $password=md5($pwd);
} else {
    echo "Passwords don't match";
}

$gender="Undefined";
$phone=$_POST['phone'];
$username=$_POST['username'];

// if(move_uploaded_file($file_loc,$folder.$final_file))
// 	{
// 		$image=$final_file;
//     }
// $notitype='Create Account';
// $reciver='Admin';
// $sender=$email;

// $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
// $querynoti = $dbh->prepare($sqlnoti);
// $querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
// $querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
// $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
// $querynoti->execute();    
    
$sql ="INSERT INTO users(name, email, username, password, gender, mobile, status) VALUES(:name, :email, :username, :password, :gender, :phone, 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
$query-> bindParam(':phone', $phone, PDO::PARAM_STR);
// $query-> bindParam(':image', $image, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Registration Sucessfull!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>