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

/// Récupération des informations du formulaire
$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$date_naissance = $_GET['date_naissance'];
$adresse = $_GET['adresse'];
$code_postal = $_GET['code_postal'];
$ville = $_GET['ville'];
$date_inscription = $_GET['date_inscription'];
$date_fin_abo = $_GET['date_fin_abo'];

$sql = "SELECT id, prenom, nom, date_naissance, adresse, code_postal, ville, date_inscription, date_fin_abo
        FROM abonne
        WHERE prenom LIKE '%$prenom%'
        AND nom LIKE '%$nom%'
        AND date_naissance LIKE '%$date_naissance%'
        AND adresse LIKE '%$adresse%'
        AND code_postal LIKE '%$code_postal%'
        AND ville LIKE '%$ville%'
        AND date_inscription LIKE '%$date_inscription%'
        AND date_fin_abo LIKE '%$date_fin_abo%'";


// Exécution de la requête
$resultat = mysqli_query($connexion, $sql);

// Affichage des résultats
if (mysqli_num_rows($resultat) > 0) {
  $abonnes_par_page = 20;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page - 1) * $abonnes_par_page;

  $sql .= " LIMIT $abonnes_par_page OFFSET $offset";
  $resultat = mysqli_query($connexion, $sql);

  ?>
  <h1 class="text-3xl text-center mb-4">Résultat de la recherche</h1>
  <div class="flex justify-center">
    <table class="">
      <thead>
        <tr>
          <th class="px-4 py-2">Id</th>
          <th class="px-4 py-2">Prénom</th>
          <th class="px-4 py-2">Nom</th>
          <th class="px-4 py-2">Date de naissance</th>
          <th class="px-4 py-2">Adresse</th>
          <th class="px-4 py-2">Code postal</th>
          <th class="px-4 py-2">Ville</th>
          <th class="px-4 py-2">Date d'inscription</th>
          <th class="px-4 py-2">Date de fin d'abonnement</th>
          <th class="px-4 py-2">Statut</th>
          <th class="px-4 py-2">Voir fiche</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($resultat)): ?>
          <tr>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['id'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['prenom'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['nom'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['date_naissance'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['adresse'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['code_postal'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['ville'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['date_inscription'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= $row['date_fin_abo'] ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <?= strtotime($row['date_fin_abo']) < time() ? '<span class="text-green-600">En cours</span>' : '<span class="text-red-600">Expiré</span>' ?>
            </td>
            <td class="border-y divide-y px-4 py-4">
              <a href="abonne.php?id=<?= $row['id'] ?>">Voir fiche</a>
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php
  // Pagination
  $sql = "SELECT COUNT(*) as total FROM abonne
          WHERE prenom LIKE '%$prenom%'
          AND nom LIKE '%$nom%'";

  $resultat = mysqli_query($connexion, $sql);
  $row = mysqli_fetch_assoc($resultat);
  $total_abonnes = $row['total'];
  $total_pages = ceil($total_abonnes / $abonnes_par_page);

  echo "<div class='pagination text-center'>";
  for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a class='p-1' href='recherche_abonne.php?prenom=$prenom&nom=$nom&page=$i'>$i</a>";
  }
  echo "</div>";
?>
<?php
} else {
  echo "<div>Aucun abonné trouvé.</div>";
}

// Fermeture de la connexion
mysqli_close($connexion);
?>