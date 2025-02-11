<?php

use App\Controllers\Proprietaire\DashboardController;
use App\Controllers\Proprietaire\ProprietaireController;


if (isset($_POST["disponibilite"])) {
    $id = $_POST["id"];
    $newdisponibilite = $_POST["disponibilite"];

    $disponibiliteController = new ProprietaireController();
    $disponibiliteController->disponabilite($id, $newdisponibilite);
}
$fetchAnnonces = new DashboardController();
$results = $fetchAnnonces->annonces();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Propriétaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Enhanced Sidebar -->
        <aside class="w-64 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white p-6 shadow-xl">
            <h1 class="text-2xl font-bold mb-8 border-b border-blue-600 pb-4">DashBoard</h1>
            <nav>
                <ul class="space-y-6">
                    <li><a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 transition-all duration-200">
                            <span>🏠</span>
                            <span class="font-medium">Accueil</span>
                        </a></li>
                    <li><a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 transition-all duration-200">
                            <span>📋</span>
                            <span class="font-medium">Messages</span>
                        </a></li>
                    <li><a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 transition-all duration-200">
                            <span>📊</span>
                            <span class="font-medium">Statistiques</span>
                        </a></li>
                    <li><a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-600 transition-all duration-200">
                            <span>⚙️</span>
                            <span class="font-medium">Déconnexion</span>
                        </a></li>
                </ul>
            </nav>
        </aside>

        <!-- Enhanced Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <header class="bg-white p-6 shadow-lg rounded-xl mb-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">Tableau de Bord</h2>
                <div class="flex items-center space-x-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        + Nouvelle Propriété
                    </button>
                </div>
            </header>

            <!-- Enhanced Stats Section -->
            <div class="grid grid-cols-3 gap-8 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-blue-500">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Propriétés</h3>
                    <p class="text-3xl font-bold text-gray-800">12</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-green-500">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Propriétés Louées</h3>
                    <p class="text-3xl font-bold text-gray-800">8</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border-l-4 border-yellow-500">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Propriétés Disponibles</h3>
                    <p class="text-3xl font-bold text-gray-800">4</p>
                </div>
            </div>

            <!-- Enhanced Properties List -->
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Mes Propriétés</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Title</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Photo</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Prix</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Disponibilité</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Catégorie</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $result) { ?>
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4"><?= $result["title"] ?></td>
                                    <td class="px-6 py-4">
                                        <img src="<?= $result["photo"] ?>" alt="Annonce Photo" class="w-20 h-20 rounded-lg shadow-md object-cover">
                                    </td>
                                    <td class="px-6 py-4 text-gray-600"><?= $result["description"] ?></td>
                                    <td class="px-6 py-4 font-semibold text-gray-800"><?= $result["prix"] ?>€/mois</td>
                                    <td class="px-6 py-4">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $result["id"] ?>">
                                            <?php if ($result["disponibilite"] === "Disponible") { ?>
                                                <a href="/disponibilite">
                                                    <button type="submit" name="disponibilite" value="Disponible"
                                                        class="px-4 py-2 text-sm font-semibold text-white bg-yellow-500 rounded-lg shadow hover:bg-yellow-600 transition-colors duration-200">
                                                        Disponible
                                                    </button>
                                                </a>
                                            <?php } elseif ($result["disponibilite"] === "Réservé") { ?>
                                                <a href="/disponibilite">
                                                    <button type="submit" name="disponibilite" value="Réservé"
                                                        class="px-4 py-2 text-sm font-semibold text-white bg-green-500 rounded-lg shadow hover:bg-green-600 transition-colors duration-200">
                                                        Réservé
                                                    </button>
                                                </a>
                                            <?php } elseif ($result["disponibilite"] === "En attente") { ?>
                                                <a href="/disponibilite">
                                                    <button type="submit" name="disponibilite" value="En attente"
                                                        class="px-4 py-2 text-sm font-semibold text-white bg-orange-500 rounded-lg shadow hover:bg-orange-600 transition-colors duration-200">
                                                        En attente
                                                    </button>
                                                </a>
                                            <?php } elseif ($result["disponibilite"] === "Vendu") { ?>
                                                <a href="/disponibilite">
                                                    <button type="submit" name="disponibilite" value="Vendu"
                                                        class="px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-lg shadow hover:bg-red-600 transition-colors duration-200">
                                                        Vendu
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600"><?= $result["categoryname"] ?></td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200"
                                            onclick="showAnnonces('<?= $result['title'] ?>', '<?= $result['photo'] ?>', '<?= $result['description'] ?>', '<?= $result['prix'] ?>', '<?= $result['disponibilite'] ?>', '<?= $result['categoryname'] ?>')">
                                            View More
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="annonceDetails" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
                    <h2 class="text-2xl font-bold text-gray-800" id="detailTitle"></h2>
                    <img id="detailPhoto" src="" alt="Photo" class="w-full h-64 object-cover rounded-lg my-4">
                    <p class="text-gray-600" id="detailDescription"></p>
                    <p class="font-bold text-lg text-blue-600 mt-2">Prix: <span id="detailPrix"></span> €/mois</p>
                    <p class="font-bold text-md text-green-600 mt-2">Disponibilité: <span id="detailDisponibilite"></span></p>
                    <p class="text-gray-500 mt-2">Catégorie: <span id="detailCategory"></span></p>

                    <button onclick="closeAnnonces()" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Fermer
                    </button>
                </div>
            </div>

        </main>
    </div>
    <script>
        function showAnnonces(title, photo, description, prix, disponibilite, category) {
            document.getElementById("detailTitle").innerText = title;
            document.getElementById("detailPhoto").src = photo;
            document.getElementById("detailDescription").innerText = description;
            document.getElementById("detailPrix").innerText = prix;
            document.getElementById("detailDisponibilite").innerText = disponibilite;
            document.getElementById("detailCategory").innerText = category;

            document.getElementById("annonceDetails").classList.remove("hidden");
        }

        function closeAnnonces() {
            document.getElementById("annonceDetails").classList.add("hidden");
        }
    </script>

</body>

</html>