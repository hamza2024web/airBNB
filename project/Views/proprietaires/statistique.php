<?php

use App\Controllers\Proprietaire\DashboardController;

$fetchAnnonces = new DashboardController();
$allProprietes = $fetchAnnonces->numbresProprietes();
$numbreAnnocesReserve = $fetchAnnonces->numbreReserve();
$numbreAnnocesDisponibile = $fetchAnnonces->numbreDisponible();
$annoncesRevenu = $fetchAnnonces->annoncesRevenu();
$tauxOccupation = $fetchAnnonces->tauxOccupation();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white shadow-2xl p-5">
            <h1 class="text-2xl font-bold mb-8">📊 Dashboard</h1>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="/proprietaire" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/20 transition">
                            <span>🏠</span> <span class="font-medium">Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-white/20 transition">
                            <span>📩</span> <span class="font-medium">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="/statistique" class="flex items-center space-x-3 p-3 rounded-lg bg-white/20">
                            <span>📊</span> <span class="font-medium">Statistiques</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-red-600 transition">
                            <span>🚪</span> <span class="font-medium">Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-semibold text-gray-800">Statistiques</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Rechercher..." class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="flex items-center space-x-2">
                        <img src="https://via.placeholder.com/40" alt="User" class="rounded-full">
                        <span class="text-gray-700">John Doe</span>
                    </div>
                </div>
            </header>

            <!-- Statistics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Propriétés -->
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-600 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-home text-3xl text-blue-600"></i>
                        <div>
                            <h3 class="text-lg font-medium text-gray-600">Total Propriétés</h3>
                            <p class="text-4xl font-bold text-gray-800"><?= $allProprietes; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Propriétés Louées -->
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-600 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-check-circle text-3xl text-green-600"></i>
                        <div>
                            <h3 class="text-lg font-medium text-gray-600">Propriétés Louées</h3>
                            <p class="text-4xl font-bold text-gray-800"><?= $numbreAnnocesReserve; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Propriétés Disponibles -->
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-door-open text-3xl text-yellow-500"></i>
                        <div>
                            <h3 class="text-lg font-medium text-gray-600">Propriétés Disponibles</h3>
                            <p class="text-4xl font-bold text-gray-800"><?= $numbreAnnocesDisponibile ?></p>
                        </div>
                    </div>
                </div>

                <!-- Revenu Total -->
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-600 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-euro-sign text-3xl text-purple-600"></i>
                        <div>
                            <h3 class="text-lg font-medium text-gray-600">Revenu Total</h3>
                            <p class="text-4xl font-bold text-gray-800"><?= $annoncesRevenu ?>€</p>
                        </div>
                    </div>
                </div>

                <!-- Taux d'Occupation -->
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-red-600 hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-chart-line text-3xl text-red-600"></i>
                        <div>
                            <h3 class="text-lg font-medium text-gray-600">Taux d'occupation</h3>
                            <p class="text-4xl font-bold text-gray-800"><?= $tauxOccupation ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>