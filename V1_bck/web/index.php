<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les fichiers</title>
</head>
<body>

<?php
// Fonction pour lire le contenu d'un fichier
function lireContenu($nomFichier) {
    $contenu = file_get_contents($nomFichier);
    return $contenu !== false ? $contenu : "Erreur lors de la lecture du fichier.";
}

// Fonction pour écrire le contenu dans un fichier
function ecrireContenu($nomFichier, $nouveauContenu) {
    // Vérifier si le champ est rempli
    if (!empty($nouveauContenu)) {
        $resultat = file_put_contents($nomFichier, $nouveauContenu);
        return $resultat !== false ? "Contenu mis à jour avec succès." : "Erreur lors de la mise à jour du fichier.";
    } else {
        return "Le champ est vide. Aucune mise à jour effectuée.";
    }
}

// Noms des fichiers
$testFichier = "test.txt";
$verifFichier = "verif.txt";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nouveauContenuTest = $_POST["nouveauContenuTest"];
    $nouveauContenuVerif = $_POST["nouveauContenuVerif"];

    // Écrire le nouveau contenu dans les fichiers
    $messageTest = ecrireContenu($testFichier, $nouveauContenuTest);
    $messageVerif = ecrireContenu($verifFichier, $nouveauContenuVerif);

    echo "<p> $messageTest </p>";
    echo "<p> $messageVerif </p>";
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="nouveauContenuTest">Nouveau contenu pour test.txt:</label>
    <input type="text" name="nouveauContenuTest" id="nouveauContenuTest">
    <input type="submit" value="Mettre à jour test.txt">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="nouveauContenuVerif">Nouveau contenu pour verif.txt:</label>
    <input type="text" name="nouveauContenuVerif" id="nouveauContenuVerif">
    <input type="submit" value="Mettre à jour verif.txt">
</form>

</body>
</html>