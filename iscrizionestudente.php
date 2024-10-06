<!doctype html>
<html lang="it">
	<head>
		<link rel="stylesheet" href="stile1.css">
	</head> 
	<body>
	<div id = "container">
	<?php
	
		echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
				<p> <label for=nome>Nome</label><input type=text name='nome' id=nome> </p>
				<p> <label for=cognome>Cognome</label><input type=text name='cognome' id=cognome> </p>
				<p> <label for=data>Data di nascita</label><input type=date name='data' id=data> </p>
				<p> <input type=submit value='Registrati'>
			</form>";
			
		if ($_POST)
		{
			$connessione = new mysqli('localhost','root','','educational_games');
			
			if (mysqli_connect_errno())
			{
				die('Errore di connessione! <a href=iscrizionestudente.php> Riprova </a>');
			}
			
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$data = $_POST['data'];
			
			$query = "INSERT INTO studenti(nome,cognome, data_nascita) VAlUES ('$nome','$cognome','$data')";
			
			$risultato = $connessione -> query($query) or die('Registrazione fallita. <a href=iscrizionestudente.php> Riprova </a>');
			if ($risultato) echo 'Registrazione avvenuta correttamente! <a href=main_educationalgames.html> Torna al menù principale </a>';
			
			$connessione -> close();
		}
	?>
	</div>
	
	</body>
</html>