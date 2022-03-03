<?php 

session_start();
include_once 'functions.php';

$_user_id = $_SESSION['id']??0;
if($_user_id){
    header('Location: words.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vocabulary Builder</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="home">
<div class="container" id="main">
    <div class="row">
            <h1 class="maintitle"><i class="fas fa-language"></i></br>My Vocabularies</h1>
    </div>
    <div class="row navigation">
    	<div class="column column-60 column-offset-20">
    		<div class="formaction">
    			<a href="#" id="login">Login</a> | <a href="#" id="register">Register Account</a>
    		</div>
    		<div class="formc">
    			<form id="form01" action="tasks.php" method="POST">
    				<h3>Login</h3>
    				<fieldset>
    					<label for="email">Email</label>
    					<input type="text" name="email" id="email" placeholder="Email Address">
    					<label for="password">Password</label>
    					<input type="password" name="password" id="password" placeholder="Password">
    					<p><?php 
    						$status = $_GET['status'] ?? 0;
    						if ($status){
    							echo getStatusMessage($status);
    						}
    					 ?></p>
    					<input class="button-primary" type="submit" value="submit">
    					<input type="hiden" name="action" id="action" value="login" class="hiden">
    				</fieldset>
    			</form>
    		</div>
    	</div>
    </div>
</div>
</body>
<script src="//code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="assets/js/script.js"></script>
</html>