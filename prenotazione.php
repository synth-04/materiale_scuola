<?php

	session_start();

	echo "<html>
			<head>
				<link rel='stylesheet' href='stile.css'>
			</head>
			<body>";
		$connessione = new mysqli('localhost','root','','car_pooling');
		
		if (mysqli_connect_errno()) 
		{
			die('Errore di connessione al database.');
		}
		
		$cod_viaggio = $_POST['cod_viaggio'];
		$cod_pass = $_POST['cod_pass'];
		
		$query1 = "SELECT * FROM viaggi v WHERE id_viaggio = $cod_viaggio AND disponibilità=1;";
					
		$risultato = $connessione -> query($query1) or die('Errore query 1!');

		if (mysqli_num_rows($risultato) == 0) {
			echo "Viaggio non disponibile";
		}
		else
		{
			$query2 = <<<_END 
			INSERT INTO prenotazioni (id_passeggero,id_viaggio,orario_prenotazione)
			VALUES ($cod_pass, $cod_viaggio, CURRENT_TIMESTAMP);
			_END;

			$risultato = $connessione -> query($query2) or die('Errore query 2!');
			
			if ($risultato) echo <<<_END
			<strong>Prenotazione effettuata!<strong>
			<p> È stato un inviato un promemoria all'indirizzo ".$_SESSION['email']." 
			<p><a href=visualizzaviaggi.php>Torna indietro </a> </p>
			_END;
		}
		
		$connessione -> close();

		echo <<<_END

		</body>
		</html>

		_END;

?>
