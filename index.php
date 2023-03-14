<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recherche de livres et d'abonnés</title>
  <link rel="stylesheet" href="https://cdn.tailwindcss.com/dist/tailwind.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- Book search form -->
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Recherche de livres</h1>
    <form method="GET" action="recherche_livre.php">
      <div class="flex flex-wrap mb-4">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titre">
            Titre
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="titre" name="titre" type="text" placeholder="Entrez le titre">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="auteur">
            Nom de l'auteur
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="auteur" name="auteur" type="text" placeholder="Entrez le nom de l'auteur">
        </div>
      </div>
      <div class="flex flex-wrap mb-4">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="editeur">
            Nom de l'éditeur
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="editeur" name="editeur" type="text" placeholder="Entrez le nom de l'éditeur">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="disponible">
            Disponible ou non disponible
          </label>
          <select
            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="disponible" name="disponible">
            <option value="disponible">Disponible</option>
            <option value="non disponible">Non disponible</option>
          </select>
        </div>
      </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit">
          Rechercher
        </button>
      </div>
    </form>
  </div>
  <!-- Subscriber search form -->
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold my-4">Recherche d'abonnés</h1>
    <form method="GET" action="recherche_abonne.php">
      <div class="flex flex-wrap mb-4">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="prenom">
            Prénom
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="prenom" name="prenom" type="text" placeholder="Entrez le prénom">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nom">
            Nom de famille
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="nom" name="nom" type="text" placeholder="Entrez le nom de famille">
        </div>
      </div>
      <div class="flex flex-wrap mb-4">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="ville">
            Ville
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="ville" name="ville" type="text" placeholder="Entrez la ville">
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="code_postal">
            Code postal
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="code_postal" name="code_postal" type="text" placeholder="Entrez le code postal">
        </div>
      </div>
      <div class="flex items-center justify-between">
        <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit">
          Rechercher
        </button>
      </div>
    </form>
  </div>

</body>

</html>