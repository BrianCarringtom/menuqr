<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Menú Elegante</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FUENTES PRO -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:wght@300;400&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(rgba(10, 10, 10, 0.75), rgba(10, 10, 10, 0.85)),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836') center/cover no-repeat fixed;
            color: #f5f5f5;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }

        /* SEPARADOR PRO */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #facc15, transparent);
            margin-top: 6px;
        }

        /* EFECTO HOVER SUAVE */
        .menu-item:hover .divider {
            background: linear-gradient(to right, transparent, #fde68a, transparent);
        }
    </style>
</head>

<body class="min-h-screen px-6 py-16">

    <div class="max-w-4xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-6xl tracking-widest">
                {{ $user->name }}
            </h1>

            <p class="text-gray-400 mt-3 text-sm tracking-[0.3em] uppercase">
                MENÚ PREMIUM
            </p>

            <div class="w-24 h-[1px] bg-yellow-500 mx-auto mt-6"></div>
        </div>

        <!-- PIZZAS -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Pizzas
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Pizza Pepperoni</h3>
                        <span class="text-lg text-yellow-400">$120</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Clásica pizza con queso mozzarella y pepperoni crujiente.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Pizza Hawaiana</h3>
                        <span class="text-lg text-yellow-400">$130</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Jamón, piña dulce y queso gratinado.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Pizza Especial</h3>
                        <span class="text-lg text-yellow-400">$150</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Combinación de carnes, vegetales frescos y queso premium.
                    </p>
                </div>

            </div>
        </div>

        <!-- BEBIDAS -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Bebidas
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Refresco</h3>
                        <span class="text-lg text-yellow-400">$30</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Variedad de sabores: cola, naranja, limón.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Agua Natural</h3>
                        <span class="text-lg text-yellow-400">$20</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Agua purificada y fresca.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Jugo Natural</h3>
                        <span class="text-lg text-yellow-400">$40</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Jugos frescos de naranja, fresa o mango.
                    </p>
                </div>

            </div>
        </div>

        <!-- COMIDA -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Comida
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Hamburguesa Clásica</h3>
                        <span class="text-lg text-yellow-400">$90</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Carne jugosa, lechuga, tomate y queso.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Hot Dog Especial</h3>
                        <span class="text-lg text-yellow-400">$60</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Salchicha premium con toppings especiales.
                    </p>
                </div>

            </div>
        </div>

        <!-- ENSALADAS -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Ensaladas
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Ensalada César</h3>
                        <span class="text-lg text-yellow-400">$85</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Lechuga, crutones, queso parmesano y aderezo César.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Ensalada Mixta</h3>
                        <span class="text-lg text-yellow-400">$70</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Vegetales frescos con aderezo ligero.
                    </p>
                </div>

            </div>
        </div>

        <!-- POSTRES -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Postres
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Pastel de Chocolate</h3>
                        <span class="text-lg text-yellow-400">$50</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Suave pastel con intenso sabor a chocolate.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Helado Artesanal</h3>
                        <span class="text-lg text-yellow-400">$45</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Sabores variados preparados de forma artesanal.
                    </p>
                </div>

            </div>
        </div>

        <!-- ALCOHOL -->
        <div>
            <h2 class="text-3xl md:text-4xl mb-10 text-yellow-500 tracking-wide">
                Alcohol
            </h2>

            <div class="space-y-10">

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Cerveza</h3>
                        <span class="text-lg text-yellow-400">$45</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Nacional e importada bien fría.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Vino</h3>
                        <span class="text-lg text-yellow-400">$120</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Copa de vino tinto o blanco.
                    </p>
                </div>

                <div class="menu-item">
                    <div class="flex justify-between items-end">
                        <h3 class="text-xl md:text-2xl">Cocteles</h3>
                        <span class="text-lg text-yellow-400">$90</span>
                    </div>
                    <div class="divider"></div>
                    <p class="text-gray-400 text-sm mt-2">
                        Preparados especiales como mojito, margarita y más.
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>

</html>