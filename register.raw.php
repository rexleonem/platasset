<?php
	require 'db.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$btc_wallet = $_POST['btc_wallet'];

		if($name == '')
			$errMsg = 'Enter your name';
        if($username == '')
			$errMsg = 'Enter username';
		if($email == '')
			$errMsg = 'Enter email';
		if($password == '')
			$errMsg = 'Enter password';
		if($btc_wallet == '')
			$errMsg = 'Enter a btc wallet';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO users (name, username, email, password, btc_wallet) VALUES (:name, :username, :email, :password, :btc_wallet)');
				$stmt->execute(array(
					':name' => $name,
					':username' => $username,
					':email' => $email,
					':password' => $password,
					':btc_wallet' => $btc_wallet
					));
				header('Location: login.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>

<html>
<head><title>Register</title></head>
	<style>
	html, body {
		margin: 1px;
		border: 0;
	}
	</style>
<body>
	<div align="center">
		<div style=" border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:10px;"><b>Register</b></div>
			<div style="margin: 15px">
				<form action="" method="post">
					<input type="text" name="name" placeholder="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['username'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" /><br/><br />
					<input type="text" name="btc_wallet" placeholder="BTC Wallet" value="<?php if(isset($_POST['btc_wallet'])) echo $_POST['btc_wallet'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='register' value="Register" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
