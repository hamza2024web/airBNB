<?php

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
                    <li><a href="/proprietaire" class="flex items-center space-x-4 p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
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
                    <li><a href="/listreservations" class="flex items-center space-x-4 p-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                            <span class="text-xl">📅</span> <!-- Changed icon -->
                            <span class="font-medium">List des Reservations</span>
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
            <header class="bg-white/80 backdrop-blur-md p-8 rounded-2xl mb-8 flex justify-between items-center border border-white/20 shadow-lg">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Tableau de Bord</h2>
                    <p class="text-gray-500">Gérez vos réservations</p>
                </div>
                <div class="flex items-center gap-6">
                    <button id="exportExcel" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Exporter
                    </button>
                </div>
            </header>

            <!-- Enhanced Properties Table -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Mes Reservations
                </h3>
                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">username</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">email</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">date de début</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">date de fin</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">date de paiment</th>
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
                                            <?= $result["username"] ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600"><?= $result["email"] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600"><?= $result["reservationdatedebut"] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600"><?= $result["reservationdatefin"] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600"><?= $result["date_de_paiment"] ?></div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        document.getElementById('exportExcel').addEventListener('click', function() {
            // Get visible rows
            const rows = Array.from(document.querySelectorAll('tbody tr')).filter(row =>
                row.style.display !== 'none'
            );

            // Transform the data
            const data = rows.map(row => {
                return {
                    'Title of Annonce': row.querySelector('td:nth-child(1)').textContent.trim(),
                    'Photo URL': row.querySelector('td:nth-child(2) img')?.src || 'No Image',
                    'Username': row.querySelector('td:nth-child(3)').textContent.trim(),
                    'Email': row.querySelector('td:nth-child(4)').textContent.trim(),
                    'Date De Debut': row.querySelector('td:nth-child(5)').textContent.trim(),
                    'Date De Fin': row.querySelector('td:nth-child(6)').textContent.trim(),
                    'Date De Paiment': row.querySelector('td:nth-child(7)').textContent.trim()
                };
            });

            // Create worksheet and convert it to CSV
            const worksheet = XLSX.utils.json_to_sheet(data);
            const csvOutput = XLSX.utils.sheet_to_csv(worksheet);

            // Create and download CSV file
            const blob = new Blob([csvOutput], {
                type: 'text/csv;charset=utf-8;'
            });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.setAttribute('download', 'list_reservations.csv');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        // Créer la feuille Excel
        const worksheet = XLSX.utils.json_to_sheet(data);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Liste des Réservations");

        // Styliser l'en-tête
        const range = XLSX.utils.decode_range(worksheet['!ref']);

        // Style pour l'en-tête
        const headerStyle = {
            font: {
                bold: true,
                color: {
                    rgb: "FFFFFF"
                }
            },
            fill: {
                fgColor: {
                    rgb: "4338CA"
                }
            },
            alignment: {
                horizontal: 'center',
                vertical: 'center'
            }
        };

        // Appliquer le style à l'en-tête
        for (let C = range.s.c; C <= range.e.c; ++C) {
            const address = XLSX.utils.encode_cell({
                r: 0,
                c: C
            });
            if (!worksheet[address]) continue;
            worksheet[address].s = headerStyle;
        }

        // Ajuster la largeur des colonnes
        const columnWidths = data.reduce((acc, row) => {
            Object.entries(row).forEach(([key, value], index) => {
                const valueLength = value ? value.toString().length : 0;
                acc[index] = Math.max(acc[index] || 0, valueLength, key.length);
            });
            return acc;
        }, []);

        worksheet['!cols'] = columnWidths.map(width => ({
            width: width + 2
        }));

        // Style pour les cellules de données
        for (let R = 1; R <= range.e.r; ++R) {
            for (let C = range.s.c; C <= range.e.c; ++C) {
                const address = XLSX.utils.encode_cell({
                    r: R,
                    c: C
                });
                if (!worksheet[address]) continue;

                worksheet[address].s = {
                    font: {
                        name: "Arial"
                    },
                    alignment: {
                        vertical: 'center'
                    },
                    border: {
                        top: {
                            style: 'thin',
                            color: {
                                rgb: "E5E7EB"
                            }
                        },
                        bottom: {
                            style: 'thin',
                            color: {
                                rgb: "E5E7EB"
                            }
                        },
                        left: {
                            style: 'thin',
                            color: {
                                rgb: "E5E7EB"
                            }
                        },
                        right: {
                            style: 'thin',
                            color: {
                                rgb: "E5E7EB"
                            }
                        }
                    }
                };
            }
        }

        // Générer et télécharger le fichier
        const date = new Date().toLocaleDateString('fr-FR').replace(/\//g, '-');
        XLSX.writeFile(workbook, `liste_etudiants_${date}.xlsx`);
    </script>

</body>

</html>