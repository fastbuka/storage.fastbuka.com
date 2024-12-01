<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastBuka-Storage</title>
    <!-- TailwindCSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Heroicons for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/1.0.6/outline/heroicons-outline.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6 text-center uppercase">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">API Backend Engine Status</h1>
        
        <!-- Engine Status Icon and Message -->
        <div class="flex items-center justify-center">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-3l4-4 4 4h-3v4zm0 4h.01"></path>
            </svg>
        </div>
        <p class="text-lg text-green-600 font-semibold mt-2">Engine Running Smoothly</p>
        <p class="text-gray-500 mt-1">The API backend engine is currently active and performing well.</p>

        <!-- Status Indicators -->
        <div class="flex justify-around mt-6 text-sm">
            <div class="text-center">
                <svg class="w-6 h-6 text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
                <p>Requests: <span class="text-gray-700 font-semibold">Healthy</span></p>
            </div>
            <div class="text-center">
                <svg class="w-6 h-6 text-yellow-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                <p>Latency: <span class="text-gray-700 font-semibold">Normal</span></p>
            </div>
            <div class="text-center">
                <svg class="w-6 h-6 text-red-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <p>Errors: <span class="text-gray-700 font-semibold">Low</span></p>
            </div>
        </div>
    </div>
</body>
</html>