<!DOCTYPE html>
<html>
<head>
    <title>Ricerca Conto Corrente</title>
    <link rel=stylesheet href="style1.css">
</head>

<body>
<div id="container">
    <h1>Lista Movimenti</h1>

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
		SELECT cc.ID_conto as ID, m.ID_movimento as ID_mov, m.importo as Importo, m.tipo as Tipo, m.data as Data
		FROM Conti_corrente cc
		JOIN Movimenti m ON m.id_conto = cc.ID_conto
		WHERE cc.ID_conto = $id
		";
		
		$risultato = $connessione -> query($query) or die('Query fallita');
		
		echo "<table>
		<tr> <th>Numero movimento </th>
			<th> Data </th>
			<th> Tipo </th>
			<th>Importo </th> </tr>";
		
		if ($risultato -> num_rows > 0)
		{
			foreach ($risultato as $riga)
			{
			echo 	"<tr><td>".$riga['ID_mov']."</td>
						<td>".$riga['Data']."</td>
						<td>".$riga['Tipo']."</td>
						<td>".$riga['Importo']."</td> </tr>";
			}
		}
		
		$connessione -> close();
		
	}
	
?>

</div>
</body>
</html>