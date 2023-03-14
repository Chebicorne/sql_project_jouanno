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

// Récupération de l'ID de l'abonné à afficher
$id = $_GET['id'];

// Construction de la requête SQL pour récupérer les informations de l'abonné
$sql = "SELECT * FROM abonne WHERE id = $id";
$resultat = mysqli_query($connexion, $sql);

// Vérification du résultat
if (mysqli_num_rows($resultat) == 1) {
  $abonne = mysqli_fetch_assoc($resultat);
  ?>
  <h1 class="text-3xl text-center mb-4">Informations de l'abonné</h1>
  <div class="flex flex-col items-center">
    <form class="w-1/2" method="post" action="modifier_abonne.php">
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-prenom">
            Prénom
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-prenom" name="prenom" type="text" value="<?= $abonne['prenom'] ?>" required>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nom">
            Nom
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
            id="grid-nom" name="nom" type="text" value="<?= $abonne['nom'] ?>" required>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-date-naissance">
            Date de naissance
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
            id="grid-date-naissance" name="date_naissance" type="date" value="<?= $abonne['date_naissance'] ?>" required>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-adresse">
            Adresse
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-adresse" name="adresse" type="text" value="<?= $abonne['adresse'] ?>" required>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label for="code_postal" class="block text-gray-700 font-bold mb-2">Code postal:</label>
          <input type="text" id="code_postal" name="code_postal" value="<?= $abonne['code_postal'] ?>"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">

          <label for="ville" class="block text-gray-700 font-bold mb-2">Ville:</label>
          <input type="text" id="ville" name="ville" value="<?= $abonne['ville'] ?>"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label for="date_inscription" class="block text-gray-700 font-bold mb-2">Date d'inscription:</label>
          <input type="date" id="date_inscription" name="date_inscription" value="<?= $abonne['date_inscription'] ?>"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">

          <label for="date_fin_abo" class="block text-gray-700 font-bold mb-2">Date de fin d'abonnement:</label>
          <input type="date" id="date_fin_abo" name="date_fin_abo" value="<?= $abonne['date_fin_abo'] ?>"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
        </div>
      </div>
  </div>

  <div class="flex items-center justify-between">
    <button type="submit"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Enregistrer
    </button>

    <a href="index.php"
      class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Annuler
    </a>
  </div>
  </form>
  <?php
} else {
  echo "Aucun abonné trouvé.";
}
mysqli_close($connexion);
?>
</div>

</body>

</html>