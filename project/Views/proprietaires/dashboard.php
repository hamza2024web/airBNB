<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Propriétaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white p-5">
            <h1 class="text-xl font-bold mb-6">Dashboard</h1>
            <nav>
                <ul>
                    <li class="mb-4"><a href="#" class="hover:text-gray-300">🏠 Accueil</a></li>
                    <li class="mb-4"><a href="#" class="hover:text-gray-300">📋 Mes Propriétés</a></li>
                    <li class="mb-4"><a href="#" class="hover:text-gray-300">📊 Statistiques</a></li>
                    <li class="mb-4"><a href="#" class="hover:text-gray-300">⚙️ Paramètres</a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <header class="bg-white p-4 shadow rounded mb-6 flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Tableau de Bord</h2>
            </header>
            
            <!-- Stats Section -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">Total Propriétés</h3>
                    <p class="text-3xl font-bold"></p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">Propriétés Louées</h3>
                    <p class="text-3xl font-bold"></p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">Propriétés Disponibles</h3>
                    <p class="text-3xl font-bold"></p>
                </div>
            </div>
            
            <!-- Properties List -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-4">Mes Propriétés</h3>
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3">Title</th>
                            <th class="border p-3">Photo</th>
                            <th class="border p-3">Description</th>
                            <th class="border p-3">Prix</th>
                            <th class="border p-3">Disponabilité</th>
                            <th class="border p-3">Categorie</th>
                            <th class="border p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="border p-3"></td>
                            <td class="border p-3 text-green-600"></td>
                            <td class="border p-3"></td>
                            <td class="border p-3">€/mois</td>
                            <td class="border p-3"></td>
                            <td class="border p-3"></td>
                            <td class="border p-3"><button class="text-blue-600">Modifier</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>