<?php
header('Refresh: 3; URL=index.php');
// Connexion à la base de données
$serveur = "127.0.0.1:3306";
$utilisateur = "root";
$mdp = "password";
$nom_bdd = "abonne";

$connexion = mysqli_connect($serveur, $utilisateur, $mdp, $nom_bdd);

// Vérification de la connexion
if (!$connexion) {
  die("La connexion a échoué : " . mysqli_connect_error());
}

// Récupération des données du formulaire
$id = $_POST['id'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$date_naissance = $_POST['date_naissance'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$date_inscription = $_POST['date_inscription'];
$date_fin_abo = $_POST['date_fin_abo'];

// Affichage des données récupérées (pour vérification)
echo "ID : " . $id . "<br>";
echo "Prénom : " . $prenom . "<br>";
echo "Nom : " . $nom . "<br>";
echo "Date de naissance : " . $date_naissance . "<br>";
echo "Adresse : " . $adresse . "<br>";
echo "Code postal : " . $code_postal . "<br>";
echo "Ville : " . $ville . "<br>";
echo "Date d'inscription : " . $date_inscription . "<br>";
echo "Date de fin d'abonnement : " . $date_fin_abo . "<br>";

// Construction de la requête SQL pour modifier l'abonné
$sql = "UPDATE abonne SET prenom = '$prenom', nom = '$nom', date_naissance = '$date_naissance', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', date_inscription = '$date_inscription', date_fin_abo = '$date_fin_abo' WHERE id = $id";

// Exécution de la requête SQL
if (mysqli_query($connexion, $sql)) {
  echo "L'abonné a été modifié avec succès.";
} else {
  echo "Une erreur est survenue lors de la modification de l'abonné : " . mysqli_error($connexion);
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);

?>