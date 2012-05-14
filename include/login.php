<?

if (isset($_POST['login'])) {

		if (isset($_SESSION['admin'])) {
				header('Location:admin.php');
		} else if (isset($_POST['email'] && isset($_POST['password']))) {
				session_start();
				session_register('admin');
				$_SESSION['email'] = $_POST['email'];
				header('Location:admin.php');		
				
				?>
				<script>
					window.location = "admin.php";
				</script>
				<?
				
		} else {
				echo "<h3>Invalid login.</h3>";
		}
} // end if isset(login)	
	
	$do = $_GET['do'];
	if ($do == 'logout') {
			session_destroy(); 						//end admin session (effectively log out)
			header('Location:index.php'); // and return to index/main
	} 
	
?>