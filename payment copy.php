<?php
session_start();
// error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


	if(isset($_POST['submit']))
  {
	
	$amount=$_POST['amount'];
	$payment=$_POST['payment'];
	$useremail=htmlentities($_SESSION['alogin']);
	$plan="Bronze";
	$status="Pending";
	$date = date("D M d, Y G:i");



		$sql="insert into transaction (amount, payment, useremail,plan,status,date) values (:amount,:payment,:useremail,:plan,:status,:date)";
		$query = $dbh->prepare($sql);
		$query-> bindParam(':amount', $amount, PDO::PARAM_STR);
		$query-> bindParam(':payment', $payment, PDO::PARAM_STR);
		$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
		$query-> bindParam(':plan', $plan, PDO::PARAM_STR);
		$query-> bindParam(':status', $status, PDO::PARAM_STR);
		$query-> bindParam(':date', $date, PDO::PARAM_STR);
		$query->execute(); 
		$msg="Awaiting Payment";
		
	}    
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Make Deposit</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

	<script type= "text/javascript" src="../vendor/countries.js"></script>
	<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
<?php
// 		$sql = "SELECT * from users where id = :editid";
// 		$query = $dbh -> prepare($sql);
// 		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
// 		$query->execute();
// 		$result=$query->fetch(PDO::FETCH_OBJ);
// 		$cnt=1;	
// ?>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<?php
				$sql = "SELECT * from admin;";
				$query = $dbh -> prepare($sql);
				$query->execute();
				$result=$query->fetch(PDO::FETCH_OBJ);
				$cnt=1;					
				?>
				<center><h3>Make a payment of <strong>$<?php echo $amount?></strong> to <strong><?php echo $result->btc_wallet?></strong> to activate your plan.</h3></center>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>
</html>
<?php 
} 
?>