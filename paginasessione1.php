<?php

	session_start();

	echo "<form action = ".$_SERVER['PHP_SELF']." method = 'post' >
			<p> Username <input type = 'text' name = 'username'> </p>
			<p> Password <input type = 'text' name = 'password'> </p>
			<p> <input type = 'submit'> </p>
		  </form> ";
		  
	if ($_POST)
	{
		$username = $_POST['username'];
		$_SESSION['username'] = $username;
		
		echo "Ciao, ".$username;
		
		echo "<p><a href = 'paginasessione2.php'> Vai alla seconda pagina </a> </p>";
		
	}
	
?>
	
	
		  
	