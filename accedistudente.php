<!doctype html>
<html lang="it">
	<head>
		<link rel="stylesheet" href="stile1.css">
	</head> 
	<body>
	<div id = "container">
<?php
		session_start();
		
		echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
				<p> <label for=nome>Inserisci il tuo nome</label><input type=text name='nome' id=nome> </p>
				<p> <input type=submit value='Accedi'>
			</form>";
			
		if ($_POST)
		{
			$connessione = new mysqli('localhost','root','','educational_games');
			
			if (mysqli_connect_errno())
			{
				die('Errore di connessione! <a href=iscrizionestudente.php> Riprova </a>');
			}
			
			$nome = $_POST['nome'];
			
			$query = "SELECT * FROM studenti WHERE nome = '$nome'";
			
			$risultato = $connessione -> query($query) or die('Accesso fallito. <a href=accedistudente.php> Riprova </a>');
			if ($risultato) 
			{
				echo 'Benvenuto! <a href=profilo.php> Vai al tuo profilo </a>';
				$_SESSION['nome']=$nome;
			}
			
			$connessione -> close();
		}
	?>
	</div>
	
</body>
</html>