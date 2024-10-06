<!doctype html>
<html lang="it">
	<head>
		<link rel="stylesheet" href="stile1.css">
	</head> 
	<body>
	<?php
	
		echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
				<fieldset>
				<legend>Sei uno studente o un docente?</legend>

				  <div>
					<input type='radio' id='studente' name='tipo' value='studente' checked />
					<label for='studente'>Studente</label>
				  </div>

				  <div>
					<input type='radio' id='docente' name='tipo' value='docente' />
					<label for='docente'>Docente</label>
				  </div>
				  
				</fieldset>
				<div>
					<input type='submit' value='Procedi'>
				</div>
			</form>";
	?>
	
	</body>
</html>