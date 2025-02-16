<?php
session_start();

if(isset($_SESSION['users'])){
    header('Location:/home');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
   <style>
       .bg-gradient-custom {
           background: linear-gradient(to bottom right, #28A745, #56D98A);
       }

       .bg-custom-light {
           background-color: #4CAF50;
       }

       .btn-gradient-custom {
           background: linear-gradient(to right, #28A745, #56D98A);
       }

       .btn-social {
           display: flex;
           align-items: center;
           justify-content: center;
           width: 100%;
           padding: 0.625rem;
           border: 1px solid #E2E8F0;
           border-radius: 0.375rem;
           transition: all 0.3s ease;
       }

       .btn-social:hover {
           background-color: #F0FFF4;
       }

       .btn-social i {
           margin-right: 0.5rem;
       }
   </style>
</head>

<body>
<header class="fixed w-full bg-white shadow">
   <div class="max-w-5xl mx-auto p-4 flex justify-between items-center">
       <a href="publication" class="text-2xl font-bold text-[#28A745] flex items-center">
           <svg class="h-8 w-8 mr-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-label="Accueil" role="img" focusable="false">
               <path d="M16 1c2.008 0 3.463.963 4.751 3.269l.533 1.025c1.954 3.83 6.114 12.54 7.1 14.836l.145.353c.667 1.591.91 2.472.91 3.494 0 2.776-1.684 4.64-4.668 5.134a3.739 3.739 0 0 1-.477.048c-1.845 0-3.391-.959-4.8-2.488-1.41 1.529-2.956 2.488-4.8 2.488-.16 0-.32-.016-.477-.048C7.736 28.617 6 26.783 6 24.006c0-1.022.243-1.903.91-3.494l.165-.402c.958-2.29 5.113-11.037 7.073-14.83l.54-1.036C15.962 1.964 17.416 1 19.424 1z" fill="#28A745"></path>
           </svg>
           airbnb
       </a>
       <nav class="hidden md:flex gap-4">
           <a href="../../Views/index.php" class="hover:text-[#28A745] mt-2">Accueil</a>
           <a href="#about" class="hover:text-[#28A745] mt-2">À propos de</a>
           <a href="#courses" class="hover:text-[#28A745] mt-2">Cours</a>
           <a href="../Views/auth/Login.php" class="rounded-full overflow-hidden w-10 h-10">
               <i class="fas fa-user-circle text-3xl text-[#28A745]"></i>
           </a>
       </nav>
       <button class="md:hidden">☰</button>
   </div>
</header>

<div class="bg-gradient-custom min-h-screen py-20">
   <div class="container mx-auto px-4">
       <div class="flex justify-center">
           <div class="w-full max-w-2xl">
               <div class="bg-white rounded-lg shadow-2xl">
                   <div class="bg-custom-light text-center p-8 rounded-t-lg">
                       <div class="text-white text-2xl font-bold mb-2">
                           <i class="fas fa-home me-2"></i>airbnb
                       </div>
                       <h4 class="text-white font-bold text-xl">Créer un compte</h4>
                   </div>

                   <div class="p-8">
                       <!-- Social Login Buttons -->
                       <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                           <button class="btn-social text-[#1877F2]">
                               <i class="fab fa-facebook-f text-xl"></i>
                               S'inscrire avec Facebook
                           </button>
                           <button class="btn-social text-[#4285F4]">
                               <i class="fab fa-google text-xl"></i>
                               S'inscrire avec Google
                           </button>
                       </div>

                       <!-- Separator -->
                       <div class="flex items-center my-6">
                           <div class="flex-grow border-t border-gray-300"></div>
                           <span class="mx-4 text-gray-500">ou</span>
                           <div class="flex-grow border-t border-gray-300"></div>
                       </div>

                       <form method="POST" action="/register" class="space-y-6">
                           <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                               <div>
                                   <input type="text" name="username" 
                                       class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none" 
                                       placeholder="Nom d'utilisateur" required>
                               </div>
                               <div>
                                   <input type="email" name="email" 
                                       class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none" 
                                       placeholder="Email" required>
                               </div>
                           </div>

                           <input type="password" name="password" 
                               class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none" 
                               placeholder="Mot de passe" required>

                           <div>
                               <label class="block text-[#28A745] font-medium mb-2">Rôle</label>
                               <select name="role" 
                                   class="w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none" required>
                                   <option value="">Choisir un rôle</option>
                                   <option value="Voyageurs">Voyageur</option>
                                   <option value="Proprietaires">Propriétaire</option>
                               </select>
                           </div>

                           <button type="submit" name="submit" 
                               class="btn-gradient-custom text-white w-full py-2.5 rounded-md transition duration-300 hover:opacity-90">
                               Créer mon compte
                           </button>
                       </form>

                       <div class="text-center mt-6">
                           <p class="text-gray-600">Déjà inscrit ? 
                               <a href="login" class="text-[#28A745] hover:text-[#15396A] transition duration-300">
                                   Connectez-vous
                               </a>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</body>
</html>