<?php
	
	// Form
	
	echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
			<p> Inserisci codice fornitore </p> 
			<p> <input type = 'text' name = 'codice'> </p>
			<p> <input type='submit' value='Ricerca'>
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
		
		$codice = $_POST['codice'];
		
		$query = "SELECT * FROM fornitori WHERE ID_fornitore = $codice";
		$risultato = $connessione -> query($query) or exit("Query fallita!");
		
		echo "<table>
				<tr>
				<th> Codice </th>
				<th> Nome </th>
				</tr>";
				
		if ($risultato) 
			foreach ($risultato as $riga) {
				echo "<tr><td>".$riga['ID_fornitore']."</td>
					<td> <td>".$riga['nome']."</td> </tr>";
			}
			
		echo "</table>";
		
		$connessione -> close();
		
	}
		
?>