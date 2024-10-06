<?php
include 'db.php';  // Include la connessione al database

// Query per recuperare gli articoli dal più recente al più vecchio
$sql = "SELECT * FROM articoli ORDER BY creato DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra di navigazione -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog Informatica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Articoli</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contatti</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Griglia Articoli -->
    <div class="container">
        <h1 class="my-4">Articoli Recenti</h1>
        <div class="row">
            <?php
            // Controlla se ci sono articoli nel risultato
            if ($result->num_rows > 0) {
                // Output di ogni articolo
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4 shadow-sm">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['titolo']) . '</h5>';
                    echo '<p class="card-text">' . substr(htmlspecialchars($row['content']), 0, 150) . '...</p>';
                    echo '<a href="articolo.php?id=' . $row['id'] . '" class="btn btn-primary">Leggi di più</a>';
                    echo '<div class="mt-2 text-muted">Pubblicato il ' . date('d/m/Y', strtotime($row['creato'])) . '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nessun articolo trovato.</p>';
            }
            ?>
        </div>
    </div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Blog Informatica.</p>
            <p>Creato con <a href="https://getbootstrap.com" class="text-light">Bootstrap</a>.</p>
        </div>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Chiudi la connessione
$conn->close();
?>

