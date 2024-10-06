<!DOCTYPE html>
<html>
<head>
    <title>Inserisci movimento</title>
    <link rel=stylesheet href="style1.css">
</head>

<body>
<div id="container">
    <h1>Inserisci Bonifico</h1>

<form method=post action = "<?php echo $_SERVER['PHP_SELF']; ?>" >
	<p> ID Ordinante: <input type=text name='id_correntista'> </p>
	<p> ID Conto di Prelevamento: <input type=text name='id_conto_prelevamento'> </p>
	<p> ID Conto di Prelevamento: <input type=text name='id_conto_versamento'> </p>
	<p> Tipo: <input type=text name='tipo'> </p>
	<p> Importo: <input type=text name='importo'> </p>
	<p> <input type=submit value='Inserisci bonifico'> </p>
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
	$idcontoprelevamento=$_POST['id_conto_prelevamento'];
	$idcontoversamento=$_POST['id_conto_versamento'];
	$tipo=$_POST['tipo'];
	$importo=$_POST['importo'];

	$connessione -> begin_transaction();
	
	$query1 = "
		INSERT INTO Bonifici(id_correntista, id_conto_prelevamento, id_conto_versamento, importo,tipo)
		VALUES ('$idcorrentista','$idcontoprelevamento','$idcontoversamento','$importo','$tipo')";
		
	$risultato1 = $connessione -> query($query1);

	$query2 = "
		UPDATE Conti_corrente SET saldo = saldo - $importo
		WHERE ID_conto = $idcontoprelevamento";	
	
	$risultato2 = $connessione -> query($query2);
	
	$query3 = "
		UPDATE Conti_corrente SET saldo = saldo + $importo
		WHERE ID_conto = $idcontoversamento";
	
	$risultato3 = $connessione -> query($query3);
	
	if ($risultato1 && $risultato2 && $risultato3)
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