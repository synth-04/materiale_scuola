<?php

	session_start();
	
	echo <<<_END 
	<html>
		<head>
			<link rel='stylesheet' href='stile.css'>
		</head>
		<body>
	_END;
			
	if ($_POST)
	{
		$connessione = new mysqli('localhost','root','','car_pooling');
		
		if (mysqli_connect_errno()) 
		{
			die('Errore di connessione al database.');
		}
		
		$nome=$_POST['nome'];
		
		$query = <<<_END 
		SELECT id_passeggero cod_pass, email
		FROM passeggeri p
		WHERE p.nome = '$nome'
		_END;
					
		$risultato = $connessione -> query($query) or die('Ricerca fallita!');
		if (mysqli_num_rows($risultato) == 1)
		{
			echo <<<_END

			<h1> Benvenuto! </h1>
			<p> <a href=visualizzaviaggi.php> Visualizza e prenota viaggi </a> </p>

			_END;
			foreach ($risultato as $riga)
			{
				$_SESSION['cod_pass'] = $riga['cod_pass'];
				$_SESSION['email'] = $riga['email'];
			}
		}
		else
		{
			echo "Nome di registrazione non presente. <a href=accedipasseggero.php> Torna indietro </a>";
		}
		
		$connessione -> close();
		
	}
	echo <<<_END
		</body>
	</html>
	_END;

?>
