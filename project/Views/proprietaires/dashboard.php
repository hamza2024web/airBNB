<?php

use App\Controllers\Proprietaire\DashboardController;
use App\Controllers\Proprietaire\ProprietaireController;

$fetchAnnonces = new DashboardController();
$allProprietes = $fetchAnnonces->numbresProprietes();
$numbreAnnocesReserve = $fetchAnnonces->numbreReserve();
$numbreAnnocesDisponibile = $fetchAnnonces->numbreDisponible();
$annoncesRevenu = $fetchAnnonces->annoncesRevenu();
$tauxOccupation = $fetchAnnonces->tauxOccupation();
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
        <!-- Enhanced Sidebar with better gradient and hover effects -->
        <aside class="w-72 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white shadow-2xl">
            <h1 class="text-3xl font-bold px-8 py-6 border-b border-blue-700/50">DashBoard</h1>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li><a href="#" class="flex items-center space-x-4 p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <span class="text-xl">🏠</span>
                            <span class="font-medium">Accueil</span>
                        </a></li>
                    <li><a href="#" class="flex items-center space-x-4 p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <span class="text-xl">📋</span>
                            <span class="font-medium">Messages</span>
                        </a></li>
                    <li><a href="/statistique" class="flex items-center space-x-4 p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <span class="text-xl">📊</span>
                            <span class="font-medium">Statistiques</span>
                        </a></li>
                    <li><a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-600 transition">
                            <span class="text-xl">⚙️</span>
                            <span class="font-medium">Déconnexion</span>
                        </a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content with improved spacing and shadows -->
        <main class="flex-1 p-8 overflow-y-auto">
            <header class="bg-white p-8 shadow-lg rounded-2xl mb-8 flex justify-between items-center border border-gray-100">
                <h2 class="text-3xl font-bold text-gray-800">Tableau de Bord</h2>
                <div class="flex items-center space-x-4">
                    <button class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        + Nouvelle Propriété
                    </button>
                </div>
            </header>

            <!-- Enhanced Properties Table -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Mes Propriétés
                </h3>
                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Prix</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Disponibilité</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach ($results as $result) { ?>
                                <tr class="hover:bg-gray-50/75 transition-all duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900"><?= $result["title"] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="<?= $result["photo"] ?>" alt="Annonce Photo"
                                            class="w-24 h-24 rounded-xl shadow-md object-cover hover:shadow-xl transition-all duration-200 transform hover:scale-105">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-xs truncate hover:text-clip hover:overflow-visible">
                                            <?= $result["description"] ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-lg font-semibold text-blue-600"><?= $result["prix"] ?>€<span class="text-sm text-gray-500">/mois</span></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            <?php
                                            switch ($result["disponibilite"]) {
                                                case 'Disponible':
                                                    echo 'bg-green-100 text-green-800 ring-1 ring-green-600/20';
                                                    break;
                                                case 'Réservé':
                                                    echo 'bg-blue-100 text-blue-800 ring-1 ring-blue-600/20';
                                                    break;
                                                case 'En attente':
                                                    echo 'bg-yellow-100 text-yellow-800 ring-1 ring-yellow-600/20';
                                                    break;
                                                case 'Vendu':
                                                    echo 'bg-red-100 text-red-800 ring-1 ring-red-600/20';
                                                    break;
                                            }
                                            ?>">
                                            <?= $result["disponibilite"] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600"><?= $result["categoryname"] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="/disponibilite" method="POST" class="flex flex-wrap gap-2">
                                            <input type="hidden" name="id" value="<?= $result["id"] ?>">
                                            <?php if ($result["disponibilite"] !== "Disponible") { ?>
                                                <button type="submit" name="disponibilite" value="Disponible"
                                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-green-500 rounded-lg shadow-sm hover:bg-green-600 transition-all duration-200 hover:shadow-md">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Disponible
                                                </button>
                                            <?php } ?>
                                            <?php if ($result["disponibilite"] !== "Réservé") { ?>
                                                <button type="submit" name="disponibilite" value="Réservé"
                                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-blue-500 rounded-lg shadow-sm hover:bg-blue-600 transition-all duration-200 hover:shadow-md">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Réservé
                                                </button>
                                            <?php } ?>
                                            <?php if ($result["disponibilite"] !== "En attente") { ?>
                                                <button type="submit" name="disponibilite" value="En attente"
                                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-yellow-500 rounded-lg shadow-sm hover:bg-yellow-600 transition-all duration-200 hover:shadow-md">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    En attente
                                                </button>
                                            <?php } ?>
                                            <?php if ($result["disponibilite"] !== "Vendu") { ?>
                                                <button type="submit" name="disponibilite" value="Vendu"
                                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-white bg-red-500 rounded-lg shadow-sm hover:bg-red-600 transition-all duration-200 hover:shadow-md">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Vendu
                                                </button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                            onclick="showAnnonces('<?= $result['title'] ?>', '<?= $result['photo'] ?>', '<?= $result['description'] ?>', '<?= $result['prix'] ?>', '<?= $result['disponibilite'] ?>', '<?= $result['categoryname'] ?>')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                            Voir plus
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Enhanced Modal -->
            <div id="annonceDetails" class="hidden fixed inset-0 bg-gray-900/75 backdrop-blur-sm flex justify-center items-center z-50">
                <div class="bg-white p-6 md:p-8 rounded-2xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 line-clamp-2" id="detailTitle"></h2>
                        <button onclick="closeAnnonces()" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Image Container -->
                    <div class="relative mb-6 rounded-xl overflow-hidden shadow-lg">
                        <img id="detailPhoto" src="" alt="Property Photo" class="w-full h-72 object-cover transition-transform duration-300 hover:scale-105">
                        <div class="absolute top-4 right-4">
                            <span class="px-4 py-2 bg-blue-600 text-white rounded-full font-bold shadow-lg">
                                <span id="detailPrix"></span> €/mois
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-xl">
                            <div class="flex items-center space-x-2 mb-2">
                                <div class="w-3 h-3 rounded-full" id="availabilityDot"></div>
                                <p class="font-semibold">
                                    Disponibilité: <span id="detailDisponibilite" class="font-normal"></span>
                                </p>
                            </div>
                            <p class="text-gray-600">
                                Catégorie: <span id="detailCategory" class="font-medium"></span>
                            </p>
                        </div>

                        <div class="prose max-w-none">
                            <p class="text-gray-600 leading-relaxed" id="detailDescription"></p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 flex justify-end">
                        <button onclick="closeAnnonces()" class="px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0">
                            Fermer
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showAnnonces(title, photo, description, prix, disponibilite, category) {

            const modal = document.getElementById("annonceDetails");
            const modalContent = document.getElementById("modalContent");

            document.getElementById("detailTitle").innerText = title;
            document.getElementById("detailPhoto").src = photo;
            document.getElementById("detailDescription").innerText = description;
            document.getElementById("detailPrix").innerText = prix;
            document.getElementById("detailDisponibilite").innerText = disponibilite;
            document.getElementById("detailCategory").innerText = category;

            const availabilityDot = document.getElementById("availabilityDot");
            availabilityDot.className = "w-3 h-3 rounded-full";
            availabilityDot.classList.add(
                disponibilite.toLowerCase().includes('disponible') ? 'bg-green-500' : 'bg-red-500'
            );

            modal.classList.remove("hidden");

            requestAnimationFrame(() => {
                modalContent.classList.remove("scale-95", "opacity-0");
                modalContent.classList.add("scale-100", "opacity-100");
            });
        }

        function closeAnnonces() {
            const modal = document.getElementById("annonceDetails");
            const modalContent = document.getElementById("modalContent");

            modalContent.classList.remove("scale-100", "opacity-100");
            modalContent.classList.add("scale-95", "opacity-0");

            setTimeout(() => {
                modal.classList.add("hidden");
                modalContent.classList.remove("scale-95", "opacity-0");
            }, 300);
        }

        document.getElementById("annonceDetails").addEventListener("click", (e) => {
            if (e.target.id === "annonceDetails") {
                closeAnnonces();
            }
        });

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && !document.getElementById("annonceDetails").classList.contains("hidden")) {
                closeAnnonces();
            }
        });
    </script>
</body>

</html>