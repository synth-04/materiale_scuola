<?php
// Connessione al database
include 'db.php';

// Recupero ID dall'URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query per ottenere l'articolo specifico
$sql = "SELECT * FROM articoli WHERE id = ?";
$query = $conn->prepare($sql);
$query->bind_param('i', $id);
$query->execute();
$risultato = $query->get_result();

// Controlla se l'articolo esiste
if ($risultato->num_rows > 0) {
    $articolo = $risultato->fetch_assoc();
} else {
    echo "<p>Articolo non trovato.</p>";
    exit();
}

$query->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($articolo['titolo']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="blog.php">Blog Informatica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="blog.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenuto dell'articolo -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title"><?php echo htmlspecialchars($articolo['titolo']); ?></h1>
                    <p class="text-muted">Pubblicato il <?php echo date('d/m/Y', strtotime($articolo['creato'])); ?></p>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($articolo['content'])); ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href="blog.php" class="btn btn-primary">Torna alla Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer (puoi usare lo stesso della pagina principale) -->
<footer class="bg-dark text-light py-4 mt-5">
    <div class="container text-center">
        <p>&copy; 2024 Blog Informatica. Tutti i diritti riservati.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
