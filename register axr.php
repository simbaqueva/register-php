<?php
session_start();
if(isset($_session['usr_id'])) {
	header("locattion:index.php");
}
include_once 'dbconnect.php';
//set validation error flag as false
$error=false;
//check if from is submitted
if (isset($_post['signup'])) {
$name = mysqli_real_escape_string($$con_$POST['name']);	
$email = mysqli_real_escape_string($$con_$POST['email']);
$password = mysqli_real_escape_string($$con_$POST['password']);
$cpassword = mysqli_real_escape_string($$con_$POST['cpassword']);
//name can contain only alpha characters and space 
if (!preg_match("/^[a-zA-Z]+$/",$name)) {
	$error = true;
	$name_error = "name must contain only alphabets and space";
}	
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	$error = true;
	$email_error = "please enter valid email ID";

}

if(strlen($password) < 6) {
	$error = true;
	$password_error = "password nust be minium of 6 characters";

}

if(!password != $cpassword) {
	$error = true;
	$cpassword_error = "password and confirm password doesn't match";
}

if (!error) {
	if(mysqli_query($con,"INSERT INTO users(name,email,password")VALUES('".$name , '",'".$email.'","'.md5($password).'")")) {
		$successmsg ="successfully registered! <a href='login.php'>click here to login</a>";
	}else {
		$errormsg = "error in registering...please try again later!";
	}

	}
}
?>

<!DOCTYPE html>

<html>

<head>

<title> user registration script </title>

<meta content="width=divice-width,initial-scale=1.0"name="viewport">
<link rel="stylessheet" href="css/booststrap.min,css"type="text/css"/>
</head>
<body>

<nav class="navbar navbar-default"role="navigation">
<div class="container-fluid">
<!--add header-->
<div class="navbar-header">
<button type="buttonclass"navbar-toggle="collapse"data-target="#navbar1">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php">koding made simple></a>
</div>
<!--menu items-->
<div class="collapse navbar-collapse"id="navbar1">
<ul class="nav navbar-nav navbar-right">
<li><a href="login.php">login</a></li>
<li class="active"><a href="register.php">sign up</a></li>
</ul>
</div>
</div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 well">


<from role="from" action="<?PHP ECHO $_SERVER['PHP_SELF'];?>"method="post"name="signupform">
<fieldset>
<legend>sign up</legend>

<div class="form-grup">
<label for="name">Name</label>

<input type="text" name="name" placeholder="enter full name"required value="<?php if($error)echo $name;?>"class="form-control" />

<span class="text-danger"><?php if(isset($name_error)) echo $name_error;?></span>

</div>

<div class="form-group">
  <label for="name">Email</label>

  <input type="text" name="email" placeholder="email"required value="<?php if($error) echo $email; ?>"
class="form-control" />

   <span class="text-danger"><?php if(isset($email_error)) echo $email_error; ?></span>

   </div>

    <div class="form-group">
    <label for="name">password</label>

    input type="password" name="password" placeholder="password" required class="form-control" />

    <span class="text-danger"><?php if(isset($password_error)) echo $password_error; ?></span> 

    </div>

    <div class="form-group">
    <label dor="name">confirm password></label>
    <input type="password" name="cpassword" placeholder="confirm password" required class="form-control" />

          <span class="text-danger"><?php if(isset($cpassword_error)) echo $cpassword_error; ?></span>
          </div>
            




