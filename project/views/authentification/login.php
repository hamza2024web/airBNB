<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .bg-gradient-custom {
            background: linear-gradient(to bottom right, #28A745, #56D98A);
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-social i {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>
    <header class="fixed w-full bg-white shadow">
        <div class="max-w-5xl mx-auto p-4 flex justify-between items-center">
            <a href="publication" class="text-2xl font-bold text-[#2    8A745] flex items-center">
                <svg class="h-8 w-8 mr-2" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-label="Accueil" role="img" focusable="false">
                    <path d="M16 1c2.008 0 3.463.963 4.751 3.269l.533 1.025c1.954 3.83 6.114 12.54 7.1 14.836l.145.353c.667 1.591.91 2.472.91 3.494 0 2.776-1.684 4.64-4.668 5.134a3.739 3.739 0 0 1-.477.048c-1.845 0-3.391-.959-4.8-2.488-1.41 1.529-2.956 2.488-4.8 2.488-.16 0-.32-.016-.477-.048C7.736 28.617 6 26.783 6 24.006c0-1.022.243-1.903.91-3.494l.165-.402c.958-2.29 5.113-11.037 7.073-14.83l.54-1.036C15.962 1.964 17.416 1 19.424 1z" fill="#28A745"></path>
                </svg>
                airbnb
            </a>
            <nav class="hidden md:flex gap-4">
                <a href="" class="hover:text-[#28A745] mt-2">Accueil</a>
                <a href="#about" class="hover:text-[#28A745] mt-2">À propos</a>
                <a href="#courses" class="hover:text-[#28A745] mt-2">Cours</a>
                <a href="../Views/auth/Register.php" class="rounded-full overflow-hidden w-10 h-10">
                    <i class="fas fa-user-circle text-3xl text-[#28A745]"></i>
                </a>
            </nav>
            <button class="md:hidden">☰</button>
        </div>
    </header>

    <div class="bg-gradient-custom min-h-screen py-20">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full max-w-md">
                    <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
                        <div class="bg-[#28A745] text-center p-8">
                            <div class="text-white text-3xl font-bold mb-2">
                                <i class="fas fa-home me-2"></i>airbnb
                            </div>
                            <h4 class="text-white font-bold text-xl">Connexion</h4>
                        </div>

                   <div class="p-8">
                       <!-- Boutons de connexion sociale -->
                       <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                           <button class="btn-social text-[#1877F2]">
                               <i class="fab fa-facebook-f text-xl"></i>
                               Se connecter avec Facebook
                           </button>
                           <button class="btn-social text-[#4285F4]">
                               <i class="fab fa-google text-xl"></i>
                               Se connecter avec Google
                           </button>
                       </div>

                       <!-- Séparateur -->
                       <div class="flex items-center my-6">
                           <div class="flex-grow border-t border-gray-300"></div>
                           <span class="mx-4 text-gray-500">ou</span>
                           <div class="flex-grow border-t border-gray-300"></div>
                       </div>

                            <form method="POST" action="/login" class="space-y-6">
                                <div>
                                    <input type="email" name="email" 
                                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none transition duration-150" 
                                        placeholder="Email" required>
                                </div>

                                <div>
                                    <input type="password" name="password" 
                                        class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none transition duration-150" 
                                        placeholder="Mot de passe" required>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-[#28A745] focus:ring-[#28A745] border-gray-300 rounded">
                                        <label for="remember" class="ml-2 block text-sm text-gray-600">Se souvenir de moi</label>
                                    </div>
                                    <a href="#" class="text-sm text-[#28A745] hover:text-[#15396A] transition duration-300">Mot de passe oublié ?</a>
                                </div>

                                <button type="submit" name="submit" 
                                    class="btn-gradient-custom text-white w-full py-2 rounded-md transition duration-300 hover:opacity-90 shadow-md">
                                    Se connecter
                                </button>
                            </form>

                       <div class="text-center mt-6">
                           <p class="text-gray-600">Pas encore de compte ? 
                               <a href="/register" class="text-[#1A4B84] hover:text-[#15396A] transition duration-300">
                                   Inscrivez-vous
                               </a>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
</body>
</html>