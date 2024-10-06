<?php
	
	// Form
	
	echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
			<p> Inserisci nome fornitore </p> 
			<p> <input type = 'text' name = 'nome'> </p>
			<p> <input type='submit' value='Inserisci'>
			<input type='reset' value='Annulla'> </p>
		</form>";
		
	if ($_POST)
	{
		$connessione = new mysqli('localhost','root','','azienda_compito');
		
		if (mysqli_connect_errno())
		{
			echo "Connessione al database non riuscita";
			exit;
		}
		
		$nome = $_POST['nome'];
		
		$query = "INSERT INTO Fornitori(nome) VALUES ('$nome')";
		$risultato = $connessione -> query($query) or exit("Query fallita!");
		if ($risultato) echo "Registrazione avvenuta correttamente";
		
		$connessione -> close();
		
	}
		
?>