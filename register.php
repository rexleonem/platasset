<?php
	require 'db.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$pwd = $_POST['password'];
		$pwd1 = $_POST['confirm_password'];
		$phone = $_POST['phone'];
		$status = '1';

		if($name == '')
			$errMsg = 'Enter your name';
        if($username == '')
			$errMsg = 'Enter username';
        if($email == '')
			$errMsg = 'Enter email';
        if($pwd == '')
			$errMsg = 'Enter password';
        if($pwd1 == '')
			$errMsg = 'Confirm password';
        if ($pwd === $pwd1) {
            $password = md5($pwd);
        } else {
            $errMsg = 'Passwords do not match';
        }
		if($phone == '')
			$errMsg = 'Enter a phone number';

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO users (name, username, email, password, phone, status) VALUES (:name, :username, :email, :password, :phone, :status)');
				$stmt->execute(array(
					':name' => $name,
					':username' => $username,
					':email' => $email,
					':password' => $password,
					':phone' => $phone,
					':status' => $status,
					));
				header('Location: index.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="index.php">Login</a>';
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="Platinum Asset">
    <!--<meta name="keywords" content="blockit, uikit3, indonez, handlebars, scss, vanilla javascript">-->
    <meta name="author" content="Platinum Asset">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#313131" />
    <!-- Site Properties -->
    <title>Sign up - Platinum Asset</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="asset/css/vendors/uikit.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    <main>
        <!-- section content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-container uk-container-expand">
                <div class="uk-grid" data-uk-height-viewport="expand: true">
                    <div class="uk-width-3-5@m uk-background-cover uk-background-center-right uk-visible@m uk-box-shadow-xlarge" style="background-image: url(asset/img/in-signin-image.jpg);">
                    </div>
                    <div class="uk-width-expand@m uk-flex uk-flex-middle">
                        <div class="uk-grid uk-flex-center">
                            <div class="uk-width-3-5@m">
                                <div class="in-padding-horizontal@s">
                                    <!-- module logo begin -->
                                    <?php
                                        if(isset($errMsg)){
                                            echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                                        }
                                    ?>                                    
                                    <a class="uk-logo" href="index-2.html">
                                        <img class="uk-margin-small-right in-offset-top-10" src="asset/img/in-lazy.gif" data-src="asset/img/in-logo-2.svg" alt="wave" width="134" height="23" data-uk-img>
                                    </a>
                                    <!-- module logo begin -->
                                    <p class="uk-text-lead uk-margin-top uk-margin-remove-bottom">Register for an account</p>
                                    <p class="uk-text-small uk-margin-remove-top uk-margin-medium-bottom">Already have an account? <a href="index.php">Log in here</a></p>
                                    <!-- register form begin -->
                                    <form class="uk-grid uk-form" action="" method="post">
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                            
                                            <input type="text" name="name" placeholder="Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>" autocomplete="off" class="uk-input uk-border-rounded"/>
                                        </div>
                                                                                <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-envelope fa-sm"></span>
                                        <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" class="uk-input uk-border-rounded"/>
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"></span>
                                             <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="uk-input uk-border-rounded"/>
                                        </div>
                                       
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="uk-input uk-border-rounded" />
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"></span>
                                            <input type="password" name="confirm_password" placeholder="Confirm Password" value="<?php if(isset($_POST['confirm_password'])) echo $_POST['confirm_password'] ?>" class="uk-input uk-border-rounded" />
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-phone fa-sm"></span>
                                            <input type="text" name="phone" placeholder="Phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'] ?>" autocomplete="off" class="uk-input uk-border-rounded"/>
                                        </div>
                                        
                                        <div class="uk-margin-small uk-width-1-1">
                                            <input type="submit" name='register' value="Register"  class='uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left' />
                                        </div>
                                    </form>
                                    <!-- register form end -->
                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
    <!-- Javascript -->
    <script src="asset/js/vendors/uikit.min.js"></script>
    <script src="asset/js/vendors/indonez.min.js"></script>
</body>


</html>