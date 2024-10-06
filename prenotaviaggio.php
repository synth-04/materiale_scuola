<html>
	<head>
		<link rel='stylesheet' href='stile.css'>
	</head>
	<body>
		<h1> Prenotazioni </h1>

<?php
	
	echo	"<form method=post action=".$_SERVER['PHP_SELF'].">
				<p><label for=cod_pass> Inserisci il tuo codice passeggero <input type=text name=cod_pass id=cod_pass> </p>
				<p><label for=cod_viaggio> Inserisci codice viaggio </label> <input type=text name=cod_viaggio id=cod_viaggio> </p>
				<p> <input type=submit value='Prenota!'> </p>";
				
	if ($_POST)
	{
		$connessione = new mysqli('localhost','root','','car_pooling');
		
		if (mysqli_connect_errno()) 
		{
			die('Errore di connessione al database.');
		}
		
		$cod_viaggio=$_POST['cod_viaggio'];
		$cod_pass=$_POST['cod_pass'];
		
		$query1 = "SELECT * FROM viaggi v WHERE id_viaggio = $cod_viaggio AND disponibilità=1;";
					
		$risultato = $connessione -> query($query1) or die('Errore query 1!');

		if (mysqli_num_rows($risultato) == 0) {
			echo "Viaggio non disponibile";
		}
		else
		{
			$query2 = "INSERT INTO prenotazioni (id_passeggero,id_viaggio,orario_prenotazione)
						VALUES ($cod_pass,$cod_viaggio,CURRENT_TIMESTAMP);";
			$risultato = $connessione -> query($query2) or die('Errore query 2!');
			if ($risultato) echo "Prenotazione effettuata!";
		}
		
		$connessione -> close();
		
	}

	?>

</body>
</html>								