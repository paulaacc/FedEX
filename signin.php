<?php	
	session_start();

	if($_POST['username'] == 'fedex.admin' && $_POST['password'] == 'fedex.admin'){
	    $_SESSION['username'] = "fedex.admin";
	    header('Location:' . "http://localhost/fedex/web/dashboard.php");
    }
?>