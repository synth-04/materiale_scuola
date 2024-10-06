<?php

	session_start();
	
	echo <<<_END
	<html>
		<head>
			<link rel='stylesheet' href='stile.css'>
		</head>
		<body>
		<h1> Cerca i viaggi!</h1>

		<form method=post action=".$_SERVER['PHP_SELF'].">
			<p><label for=data> Data di partenza </label> <input type=date name=data id=data> </p>
			<p> <label for=città_partenza> Città di partenza </label> <input type=text name=città_partenza id=città_partenza> </p>
			<p> <label for=città_arrivo> Città di arrivo </label> <input type=text name=città_arrivo id=città_arrivo> </p>
			<p> <input type=submit value='Trova viaggi!'> </p>
		</form>
	_END;
				
	if ($_POST)
	{
		$connessione = new mysqli('localhost','root','','car_pooling');
		
		if (mysqli_connect_errno()) 
		{
			die('Errore di connessione al database.');
		}
		
		$data=$_POST['data'];
		$città_partenza=$_POST['città_partenza'];
		$città_arrivo=$_POST['città_arrivo'];
		
		$query = <<<_END

		SELECT a.nome nome, a.cognome cognome, v.orario orario, v.contributo_richiesto contributo, v.id_viaggio id
		FROM autisti a 
		JOIN viaggi v ON a.id_autista = v.id_autista
		WHERE v.città_partenza = '$città_partenza' AND v.città_arrivo = '$città_arrivo'
		AND v.data = '$data' AND v.disponibilità = 1
		ORDER BY v.orario ASC;

		_END;
					
		$risultato = $connessione -> query($query) or die('Ricerca fallita!');
		
		echo "<table>
				<tr>
					<th>Nome autista </th>
					<th>Orario viaggio </th>
					<th>Contributo richiesto </th>
				</tr>";
		
		foreach ($risultato as $riga)
		{
			echo <<<_END 
			<tr>
				<td>".$riga['nome']." ".$riga['cognome']."</td>
				<td>".$riga['orario']." </td>
				<td>".$riga['contributo']." </td>
				<td>
					<form action=prenotazione.php method=post>
						<input type=hidden name=cod_pass value=".$_SESSION['cod_pass'].">
						<input type=hidden name=cod_viaggio value=".$riga['id'].">
						<input type=submit value='Prenota ora!'>
					</form>
				</td>
			</tr>
			_END;
		}
		
		echo "</table>";
		
		$connessione -> close();
		
	}

?>

</body>
</html>
									