<!DOCTYPE html>
<html>
<head>
    <title>Inserisci movimento</title>
    <link rel=stylesheet href="style1.css">
</head>

<body>
<div id="container">
    <h1>Inserisci Movimento</h1>

<form method=post action = "<?php echo $_SERVER['PHP_SELF']; ?>" >
	<p> ID Correntista: <input type=text name='id_correntista'> </p>
	<p> ID Conto: <input type=text name='id_conto'> </p>
	<p> Tipo: <input type=radio name='tipo' value='Prelievo'> Prelievo 
	<input type=radio name='tipo' value='Versamento'> Versamento </p>
	<p> Importo: <input type=text name='importo'> </p>
	<p> <input type=submit value='Inserisci movimento'> </p>
	</form>
	
<?php
	
if ($_POST)
{
	$connessione = new mysqli('localhost','root','','banca');
	
	if (mysqli_connect_errno()) {
		echo('Connessione al database fallita!');
		exit;
	}
	
	$idcorrentista=$_POST['id_correntista'];
	$idconto=$_POST['id_conto'];
	$tipo=$_POST['tipo'];
	$importo=$_POST['importo'];

	$connessione -> begin_transaction();
	
	$query1 = "
		INSERT INTO Movimenti(id_correntista, id_conto,importo,tipo)
		VALUES ('$idcorrentista','$idconto','$importo','$tipo')";
		
	$risultato1 = $connessione -> query($query1);
	
	if ($tipo == 'Prelievo')
	{
		$query2 = "
		UPDATE Conti_corrente SET saldo = saldo - $importo
		WHERE id_conto = $idconto";}
	
	elseif ($tipo == 'Versamento')
	{
		$query2 = "
		UPDATE Conti_corrente SET saldo = saldo + $importo
		WHERE id_conto = $idconto";}	
	
	$risultato2 = $connessione -> query($query2);
	
	if ($risultato1 && $risultato2)
	{
		$connessione -> commit();
		echo "Operazione effettuata correttamente";
	}
	else
	{
		$connessione -> rollback();
		echo "Errore nell'inserimento!";
	}
	
	$connessione -> close();
	
}

?>

</div>
</body>
</html>