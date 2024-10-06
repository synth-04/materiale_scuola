<!doctype html>
<html lang="it">
	<head>
		<link rel="stylesheet" href="stile1.css">
	</head> 
	<body>
	<div id = "container" class="profilo">
	<?php
		session_start();
		
		$nome = $_SESSION['nome'];
			
		if ($_SESSION)
		{
			$connessione = new mysqli('localhost','root','','educational_games');
			
			if (mysqli_connect_errno())
			{
				die('Errore di connessione! <a href=iscrizionestudente.php> Riprova </a>');
			}
			
			$query = "SELECT * FROM studenti WHERE nome = '$nome'";
			
			$risultato = $connessione -> query($query) or die('Query fallita. <a href=accedistudente.php> Riprova </a>');
			
			// Riquadro informazioni personali
			
			if ($risultato)
				foreach ($risultato as $riga)
					{
						echo "<p><strong>Informazioni personali: </strong> <br>
							  Nome: ".$riga['nome']." <br>
							  Cognome: ".$riga['cognome']." <br>
								Data di nascita: ".$riga['data_nascita']." <br> </p>";
							  
					}
				$query2 = "SELECT classi.nome nome, partecipa.data_iscrizione data_iscrizione FROM classi 
							JOIN partecipa ON classi.id_classe = partecipa.id_classe
							JOIN studenti ON studenti.id_studente = partecipa.id_studente
							WHERE studenti.nome = '$nome'";
							
			// Riquadro classi
							
				$risultato2 = $connessione -> query($query2) or die('Query fallita. <a href=accedistudente.php> Riprova </a>');
				if ($risultato2)
				foreach ($risultato2 as $riga)
					{
						echo "<p><strong> Classi </strong> <br>
							  Classe: ".$riga['nome']." <br> 
							  Data Iscrizione: ".$riga['data_iscrizione']."</p>";
							  
					}
					
			// Riquadro giochi attivi
				$query3 = "SELECT videogiochi.nome nome, gioca.monete monete FROM videogiochi
							JOIN istanze_videogiochi ON videogiochi.id_videogioco =istanze_videogiochi.id_videogioco
							JOIN gioca ON istanze_videogiochi.id_istanza = gioca.id_istanza
							JOIN studenti ON studenti.id_studente = gioca.id_studente
							WHERE studenti.nome = '$nome'";
							
				$risultato3 = $connessione -> query($query3) or die('Query fallita. <a href=accedistudente.php> Riprova </a>');
				if ($risultato3)
				foreach ($risultato3 as $riga)
					{
						echo "<p><strong> Giochi attivi </strong> <br>
							  Nome : ".$riga['nome']."  <br>
							  Monete raccolte: ".$riga['monete']."</p>";
							  
					}			
			$connessione -> close();
		}
	?>
	</div>
</body>
</html>