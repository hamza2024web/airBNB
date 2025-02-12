<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LankaStay - Payment Complete</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-2xl mx-auto bg-white p-8 border-2 border-gray-200 rounded-xl">
        <!-- Logo -->
        <div class="text-center mb-12">
            <h1 class="text-2xl">
                <span class="text-blue-600">Lanka</span>Stay.
            </h1>
        </div>

        <!-- Progress Steps -->
        <div class="flex justify-center items-center gap-6 mb-12">
            <div class="w-10 h-10 rounded-full bg-emerald-400 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-400 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-400 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <!-- Success Message -->
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-blue-900 mb-2">Yay! Payment Completed</h2>
        </div>

        <!-- Success Icon -->
        <div class="max-w-[200px] mx-auto mb-12">
            <svg class="w-full" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="80" fill="#F3F4F6"/>
                <rect x="40" y="60" width="120" height="20" rx="4" fill="#E5E7EB"/>
                <rect x="40" y="90" width="90" height="20" rx="4" fill="#E5E7EB"/>
                <rect x="40" y="120" width="70" height="20" rx="4" fill="#E5E7EB"/>
                <circle cx="160" cy="160" r="20" fill="#10B981"/>
                <path d="M152 160l4 4 8-8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <!-- Information Text -->
        <div class="text-center space-y-2 mb-8">
            <p class="text-blue-600">Please check your email & phone Message.</p>
            <p class="text-gray-500">We have sent all the information</p>
        </div>

        <!-- Dashboard Button -->
        <div class="text-center">
            <button onclick="window.location.href='dashboard.html'" class="text-gray-400 hover:text-gray-600 transition-colors">
                Go to Dashboard
            </button>
        </div>
    </div>

    <script>
        // Add any required JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // You can add animations or additional functionality here
            console.log('Success page loaded');
        });
    </script>
</body>
</html>