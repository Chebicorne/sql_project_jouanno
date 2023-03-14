<head>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<?php
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

// Récupération des informations du formulaire
$titre = $_GET['titre'];
$auteur = $_GET['auteur'];
$editeur = $_GET['editeur'];
$disponible = $_GET['disponible'];

// Construction de la requête SQL
$sql = "SELECT livre.titre, auteur.nom AS auteur, editeur.nom AS editeur, livre.genre, livre.categorie, emprunt.date_retour
        FROM livre
        INNER JOIN auteur ON livre.id_auteur = auteur.id
        INNER JOIN editeur ON livre.id_editeur = editeur.id
        LEFT JOIN emprunt ON livre.id = emprunt.id_livre
        WHERE livre.titre LIKE '%$titre%'
        AND auteur.nom LIKE '%$auteur%'
        AND editeur.nom LIKE '%$editeur%'";

if ($disponible == 'disponible') {
  $sql .= " AND emprunt.date_retour IS NULL";
} else if ($disponible == 'non disponible') {
  $sql .= " AND emprunt.date_retour IS NOT NULL";
}

// Exécution de la requête
$resultat = mysqli_query($connexion, $sql);

// Affichage des résultats
if (mysqli_num_rows($resultat) > 0) {
  $livres_par_page = 20;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page - 1) * $livres_par_page;

  $sql .= " LIMIT $livres_par_page OFFSET $offset";
  $resultat = mysqli_query($connexion, $sql);

  ?>
  <h1 class="text-3xl text-center mb-4">Résultat de la recherche</h1>
  <div class="flex justify-center">
    <table class="">
      <thead>
        <tr>
          <th class="px-4 py-2">Titre</th>
          <th class="px-4 py-2">Auteur</th>
          <th class="px-4 py-2">Editeur</th>
          <th class="px-4 py-2">Genre</th>
          <th class="px-4 py-2">Catégorie</th>
          <th class="px-4 py-2">Date de retour</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultat)): ?>
          <tr>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['titre'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['auteur'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['editeur'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['genre'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['categorie'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['date_retour'] ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php
  // Pagination
  $sql = "SELECT COUNT(*) as total FROM livre
            INNER JOIN auteur ON livre.id_auteur = auteur.id
            INNER JOIN editeur ON livre.id_editeur = editeur.id
            LEFT JOIN emprunt ON livre.id = emprunt.id_livre
            WHERE livre.titre LIKE '%$titre%'
            AND auteur.nom LIKE '%$auteur%'
            AND editeur.nom LIKE '%$editeur%'";

  if ($disponible == 'disponible') {
    $sql .= " AND emprunt.date_retour IS NULL";
  } else if ($disponible == 'non disponible') {
    $sql .= " AND emprunt.date_retour IS NOT NULL";
  }

  $resultat = mysqli_query($connexion, $sql);
  $row = mysqli_fetch_assoc($resultat);
  $total_livres = $row['total'];
  $total_pages = ceil($total_livres / $livres_par_page);

  echo "<div class='pagination text-center'>";
  for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a class='p-1' href='recherche.php?titre=$titre&auteur=$auteur&editeur=$editeur&disponible=$disponible&page=$i'>$i</a>";
  }
  echo "</div>";
} else {
  echo "<div class=>Aucun livre trouvé.</div>";
}

// Fermeture de la connexion
mysqli_close($connexion);
?>