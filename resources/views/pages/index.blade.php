<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnalogueShifts</title>
    <!-- TailwindCSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Heroicons for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.6/outline/heroicons-outline.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="text-center p-6">
        <!-- Logo (optional) -->
        <div class="mb-4">
            <svg class="w-16 h-16 text-blue-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-3l4-4 4 4h-3v4zm0 4h.01"></path>
            </svg>
        </div>

        <!-- Welcome message -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Welcome to AnalogueShifts!</h1>

        <!-- Buttons to the different pages -->
        <div class="space-y-4">
            <a href="/api" class="block bg-green-600 text-white py-2 px-4 rounded-full text-lg hover:bg-green-700">API BASE</a>
            <a href="/docs" class="block bg-purple-600 text-white py-2 px-4 rounded-full text-lg hover:bg-purple-700">DOCUMENTATION</a>
            <a href="/engine" class="block bg-blue-600 text-white py-2 px-4 rounded-full text-lg hover:bg-blue-700">HEALTH STATUS</a>
        </div>
    </div>

</body>
</html>
