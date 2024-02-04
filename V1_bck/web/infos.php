<?php
// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données POST
    $info1 = isset($_POST['info1']) ? $_POST['info1'] : '';
    $info2 = isset($_POST['info2']) ? $_POST['info2'] : '';
    $info3 = isset($_POST['info3']) ? $_POST['info3'] : '';
    $info4 = isset($_POST['info4']) ? $_POST['info4'] : '';
    $info5 = isset($_POST['info5']) ? $_POST['info5'] : '';

    // Écrire les données dans le fichier list.txt
    $data = "Info1: $info1\nInfo2: $info2\nInfo3: $info3\nInfo4: $info4\nInfo5: $info5\n";

    // Ouvrir le fichier en mode écriture (a pour ajouter)
    $file = fopen('list.txt', 'a');

    // Écrire les données dans le fichier
    fwrite($file, $data);

    // Fermer le fichier
    fclose($file);

    // Répondre avec un message de succès
    echo "Données écrites avec succès dans list.txt";
} else {
    // Répondre avec un message d'erreur si la requête n'est pas de type POST
    http_response_code(400);
    echo "Erreur : Requête non valide.";
}
?>
