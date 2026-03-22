<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Barber Services</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1511920170033-f8396924c348') center/cover no-repeat fixed;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4">

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="w-full max-w-4xl bg-black/80 backdrop-blur-md text-white p-6 md:p-10 rounded-xl shadow-2xl">

        <!-- TITULO -->
        <h1 class="text-center text-3xl md:text-5xl font-light tracking-widest mb-8">
            BARBER SERVICES
        </h1>

        <!-- LISTA -->
        <div class="space-y-4 text-lg md:text-xl">

            <!-- ITEM -->
            <div class="flex justify-between border-b border-gray-600 pb-2">
                <div>
                    <p>Corte Clásico</p>
                </div>
                <span>$60</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <div>
                    <p>Corte Urbano</p>
                    <p class="text-sm text-gray-400">(Taper, Fade, Navaja)</p>
                </div>
                <span>$60</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <p>Recorte Barba</p>
                <span>$40</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <div>
                    <p>Paquete Basic</p>
                    <p class="text-sm text-gray-400">(Barba + Afeitado)</p>
                </div>
                <span>$60</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <div>
                    <p>Paquete Premium</p>
                    <p class="text-sm text-gray-400">(Toalla caliente)</p>
                </div>
                <span>$80</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <div>
                    <p>Paquete VIP</p>
                    <p class="text-sm text-gray-400">(Spa + mascarilla)</p>
                </div>
                <span>$120</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <p>Arreglo de Ceja</p>
                <span>$35</span>
            </div>

            <div class="flex justify-between border-b border-gray-600 pb-2">
                <p>Mascarilla Facial</p>
                <span>$45</span>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="mt-10 text-center text-sm text-gray-300">
            <p class="mt-2">📍 {{ $user->name }}</p>
            <p>📧 {{ $user->email }}</p>
        </div>

    </div>

</body>

</html>
