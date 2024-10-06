<!DOCTYPE html>
<html>
<head>
    <title>Ricerca Conto Corrente</title>
    <link rel=stylesheet href="style1.css">
</head>

<body>
<div id="container">
    <h1>Ricerca Conto Corrente</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <p>Inserisci numero di conto</p>
        <p><input type="text" name="id"></p>
        <p><input type="submit" value="Ricerca"></p>
    </form>

<?php
		
	if ($_POST)
	{
		$connessione = new mysqli('localhost','root','','banca');
		
		if (mysqli_connect_errno())
		{
			echo('Errore di connessione');
			exit;
		}
		
		$id=$_POST['id'];
		
		$query = "
		SELECT cc.ID_conto as ID, c.nome as Nome, c.cognome as Cognome, cc.saldo as Saldo 
		FROM Conti_corrente cc
		JOIN Intestato i ON i.id_conto = cc.ID_conto
		JOIN Correntisti c ON i.id_correntista = c.ID_correntista
		WHERE cc.ID_conto = $id
		";
		
		$risultato = $connessione -> query($query) or die('Query fallita');
		
		if ($risultato -> num_rows > 0)
		{
			foreach ($risultato as $riga)
			{
			echo "<p> Conto: ".$riga['ID']."</p>
			<p> Intestatario: ".$riga['Nome']." ".$riga['Cognome']." </p>
			<p> Saldo: ".$riga['Saldo']." ";
			}
		}
		
		$connessione -> close();
		
	}

?>

</div>
</body>
</html>