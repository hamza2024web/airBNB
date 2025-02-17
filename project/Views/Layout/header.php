<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book ME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/ " class="text-2xl font-bold text-indigo-600 hover:text-indigo-500">Book ME</a>
            </div>

            <!-- Navbar -->
            <nav class="hidden md:flex space-x-8  items-center">
                <a href="/home" class="text-gray-700 hover:text-indigo-600">Home</a>
                <a href="/about" class="text-gray-700 hover:text-indigo-600">About</a>
                <a href="/publication" class="text-gray-700 hover:text-indigo-600">Accommodations</a>
                <a href="/login" class="text-gray-700 hover:text-indigo-600">Login</a>
                <a href="/register" class="text-white bg-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-500">Sign Up</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="md:hidden focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </header>