<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carringtom PRO</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #00f2fe;
            /* Cian eléctrico para mayor contraste */
            --dark: #050b14;
            /* Fondo oscuro profundo */
            --card: #0b1528;
            /* Variación para tarjetas */
            --text: #cbd5e1;
            --white: #ffffff;
            --outline-color: #2563eb;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--dark);
            color: white;
            overflow-x: hidden;
        }

        section {
            position: relative;
            z-index: 2;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* SCROLL */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--primary), var(--secondary));
            border-radius: 20px;
        }

        /* NAVBAR */
        header {
            position: fixed;
            width: 92%;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            padding: 16px 28px;
            border-radius: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(5, 11, 20, 0.75);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        header h2 {
            font-size: 28px;
            font-weight: 800;
            color: var(--white);
            letter-spacing: 1px;
            /* Texto blanco con contorno azul */
            text-shadow:
                -1px -1px 0 var(--outline-color),
                1px -1px 0 var(--outline-color),
                -1px 1px 0 var(--outline-color),
                1px 1px 0 var(--outline-color),
                0px 2px 10px rgba(37, 99, 235, 0.4);
        }

        header h2 span {
            color: var(--white);
            text-shadow:
                -1px -1px 0 #00f2fe,
                1px -1px 0 #00f2fe,
                -1px 1px 0 #00f2fe,
                1px 1px 0 #00f2fe;
        }

        nav {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #94a3b8;
            font-weight: 500;
            position: relative;
            transition: .3s;
        }

        nav a:hover {
            color: white;
        }

        nav a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 0;
            bottom: -6px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            transition: .3s;
            border-radius: 20px;
        }

        nav a:hover::after {
            width: 100%;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 12px 24px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 242, 254, 0.4);
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 150px 10% 90px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(5, 11, 20, 0.97) 40%, rgba(11, 21, 40, 0.85)), url('https://images.unsplash.com/photo-1492724441997-5dc865305da7');
            background-size: cover;
            background-position: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.25) 0%, rgba(0, 242, 254, 0.05) 70%);
            filter: blur(100px);
            top: -100px;
            right: -50px;
            animation: glow 6s infinite alternate;
        }

        @keyframes glow {
            from {
                transform: scale(1) translate(0, 0);
            }

            to {
                transform: scale(1.15) translate(-20px, 20px);
            }
        }

        .hero-content {
            max-width: 820px;
            position: relative;
            z-index: 5;
            animation: fadeUp 1.2s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            border-radius: 40px;
            margin-bottom: 28px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #60a5fa;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .hero h1 {
            font-size: 64px;
            line-height: 1.1;
            margin-bottom: 24px;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .hero h1 span {
            background: linear-gradient(to right, #ffffff, #60a5fa, var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 19px;
            color: #94a3b8;
            line-height: 1.8;
            margin-bottom: 38px;
            max-width: 680px;
        }

        .btn-main {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 16px 38px;
            border-radius: 40px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: .4s;
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
        }

        .btn-main:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0, 242, 254, 0.4);
        }

        /* IMAGENES HERO */
        .hero-images {
            margin-top: 60px;
            display: flex;
            gap: 24px;
            flex-wrap: nowrap;
            align-items: center;
        }

        .hero-images img {
            width: 180px;
            height: 135px;
            object-fit: cover;
            border-radius: 24px;
            border: 2px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            transition: .4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .hero-images img:nth-child(2) {
            transform: translateY(25px);
        }

        .hero-images img:hover {
            transform: translateY(-15px) scale(1.08);
            border-color: var(--secondary);
        }

        .hero-images img:nth-child(2):hover {
            transform: translateY(10px) scale(1.08);
            border-color: var(--primary);
        }

        /* FEATURES */
        .features {
            padding: 100px 10%;
            background: #ffffff;
            color: #0f172a;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature {
            width: 300px;
            text-align: center;
            padding: 45px 30px;
            border-radius: 28px;
            background: #f8fafc;
            transition: .4s;
            border: 1px solid #e2e8f0;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.12);
            background: #ffffff;
        }

        .feature i {
            font-size: 46px;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature h3 {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

        .feature p {
            color: #64748b;
            margin-top: 12px;
            font-size: 15px;
            line-height: 1.6;
        }

        /* SECTION TILES COMPARTIDO */
        .section {
            padding: 120px 10%;
            background: linear-gradient(180deg, #050b14, #0b1528);
        }

        .section-title {
            text-align: center;
            margin-bottom: 70px;
        }

        .section-title h2 {
            font-size: 46px;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .section-title p {
            color: #94a3b8;
            max-width: 750px;
            margin: auto;
            line-height: 1.8;
            font-size: 17px;
        }

        /* CARDS */
        .cards {
            display: flex;
            gap: 35px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            width: 340px;
            border-radius: 30px;
            overflow: hidden;
            background: var(--card);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: .4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            transform: translateY(-12px);
            border-color: rgba(0, 242, 254, 0.3);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.25);
        }

        .card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            transition: .6s;
        }

        .card:hover img {
            transform: scale(1.06);
        }

        .card-content {
            padding: 30px;
        }

        .card-content h3 {
            font-size: 22px;
            font-weight: 700;
        }

        .card-content p {
            margin-top: 12px;
            color: #94a3b8;
            font-size: 15px;
            line-height: 1.6;
        }

        .card button {
            margin-top: 24px;
            padding: 12px 28px;
            border-radius: 30px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            cursor: pointer;
            font-weight: 600;
            transition: .3s;
        }

        .card button:hover {
            box-shadow: 0 5px 15px rgba(0, 242, 254, 0.4);
            transform: scale(1.03);
        }

        /* GALERIA */
        .gallery {
            padding: 120px 10%;
            background: #ffffff;
            color: #0f172a;
        }

        .gallery-grid {
            margin-top: 50px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 240px;
            gap: 20px;
        }

        .gallery-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 24px;
            transition: .4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .gallery-grid img:hover {
            transform: scale(1.04);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.25);
        }

        .gallery-grid img:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
        }

        .gallery-grid img:nth-child(4) {
            grid-row: span 2;
        }

        /* ABOUT */
        .about {
            padding: 120px 10%;
            display: flex;
            align-items: center;
            gap: 70px;
            flex-wrap: wrap;
            background: linear-gradient(180deg, #0b1528, #050b14);
        }

        .about img {
            width: 480px;
            border-radius: 35px;
            border: 2px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
        }

        .about-text {
            flex: 1;
            min-width: 300px;
        }

        .about-text h2 {
            font-size: 46px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -1px;
        }

        .about-text p {
            color: #94a3b8;
            line-height: 1.8;
            font-size: 16px;
        }

        .about-boxes {
            margin-top: 35px;
            display: grid;
            gap: 24px;
        }

        .about-box {
            background: var(--card);
            border-radius: 25px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: .3s;
        }

        .about-box:hover {
            border-color: rgba(37, 99, 235, 0.3);
            transform: translateX(5px);
        }

        .about-box h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .about-box h3::before {
            content: "◆";
            color: var(--secondary);
            font-size: 14px;
        }

        /* TESTIMONIOS */
        .testimonials {
            padding: 120px 10%;
            background: #ffffff;
            color: #0f172a;
        }

        .testimonial-container {
            margin-top: 60px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .testimonial {
            width: 340px;
            background: #f8fafc;
            border-radius: 28px;
            padding: 40px 30px;
            text-align: center;
            transition: .4s;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
        }

        .testimonial:hover {
            transform: translateY(-10px);
            background: #ffffff;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
        }

        .testimonial img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 3px solid var(--primary);
        }

        .testimonial p {
            color: #475569;
            line-height: 1.8;
            margin-bottom: 20px;
            font-style: italic;
            font-size: 15px;
        }

        .testimonial strong {
            font-size: 16px;
            color: #0f172a;
            font-weight: 700;
        }

        /* CONTACT */
        .contact {
            padding: 120px 10%;
            background: linear-gradient(180deg, #050b14, #020408);
        }

        .contact-container {
            margin-top: 50px;
            display: flex;
            gap: 50px;
            flex-wrap: wrap;
        }

        .contact-form,
        .contact-info {
            flex: 1;
            min-width: 300px;
        }

        .contact-form {
            background: var(--card);
            border-radius: 30px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 16px;
            margin-bottom: 20px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.03);
            color: white;
            outline: none;
            transition: .3s;
            font-size: 15px;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: var(--secondary);
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.15);
        }

        .contact-form button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: .4s;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .contact-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 242, 254, 0.4);
        }

        .contact-box {
            display: flex;
            align-items: center;
            gap: 22px;
            padding: 26px;
            border-radius: 24px;
            background: var(--card);
            margin-bottom: 24px;
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: .3s;
        }

        .contact-box:hover {
            border-color: rgba(0, 242, 254, 0.2);
            transform: translateY(-4px);
        }

        .contact-box i {
            width: 60px;
            height: 60px;
            border-radius: 18px;
            background: rgba(37, 99, 235, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--secondary);
            font-size: 24px;
            border: 1px solid rgba(0, 242, 254, 0.2);
        }

        .contact-box strong {
            font-size: 16px;
            color: white;
        }

        .contact-box p {
            color: #94a3b8;
            margin-top: 4px;
            font-size: 15px;
        }

        /* FOOTER */
        .footer {
            padding: 100px 10% 40px;
            background: #020408;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 50px;
            margin-bottom: 60px;
        }

        .logo img {
            width: 80px;
            height: 80px;
            border-radius: 22px;
            background: white;
            padding: 12px;
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.1);
        }

        .brand h2 {
            margin: 20px 0 12px;
            font-size: 28px;
            font-weight: 800;
            color: white;
            text-shadow: 1px 1px 0 var(--primary);
        }

        .brand p {
            color: #94a3b8;
            line-height: 1.8;
            font-size: 15px;
        }

        .footer-col h3 {
            margin-bottom: 25px;
            font-size: 18px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 35px;
            height: 3px;
            background: var(--secondary);
            border-radius: 4px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 16px;
            color: #cbd5e1;
            transition: .3s;
            font-size: 15px;
        }

        .footer-col ul li:hover {
            transform: translateX(8px);
            color: var(--secondary);
        }

        .footer-col ul li i {
            margin-right: 10px;
            color: var(--primary);
            font-size: 14px;
        }

        .footer-col a {
            text-decoration: none;
            color: inherit;
        }

        .socials {
            margin-top: 24px;
        }

        .socials a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            margin-right: 12px;
            transition: .3s;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .socials a:hover {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 242, 254, 0.3);
            border-color: transparent;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 30px;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }

        /* BOTON WHATSAPP */
        .whatsapp-float {
            position: fixed;
            right: 25px;
            bottom: 25px;
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: linear-gradient(135deg, #25d366, #1ebe5d);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 32px;
            text-decoration: none;
            z-index: 9999;
            transition: .35s;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-float:hover {
            transform: translateY(-6px) scale(1.05);
            box-shadow: 0 20px 40px rgba(37, 211, 102, 0.5);
        }

        .whatsapp-float::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.35);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: .7;
            }

            70% {
                transform: scale(1.4);
                opacity: 0;
            }

            100% {
                transform: scale(1.4);
                opacity: 0;
            }
        }

        .whatsapp-float i {
            position: relative;
            z-index: 2;
        }

        /* RESPONSIVE */
        @media(max-width:1100px) {
            .hero h1 {
                font-size: 54px;
            }

            .about {
                gap: 40px;
            }

            .about img {
                width: 100%;
                max-width: 400px;
                margin: auto;
            }
        }

        @media(max-width:768px) {
            header {
                padding: 15px 22px;
                width: 95%;
            }

            nav {
                position: absolute;
                top: 85px;
                right: 0;
                width: 250px;
                flex-direction: column;
                align-items: flex-start;
                padding: 30px;
                border-radius: 24px;
                background: rgba(11, 21, 40, 0.98);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
                display: none;
            }

            nav.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .btn-login {
                padding: 10px 20px;
                font-size: 14px;
            }

            .hero {
                padding: 140px 6% 80px;
                text-align: center;
                justify-content: center;
            }

            .hero h1 {
                font-size: 44px;
            }

            .hero p {
                margin: 0 auto 35px;
            }

            .hero-images {
                justify-content: center;
                gap: 14px;
            }

            .hero-images img {
                width: 120px;
                height: 110px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about {
                flex-direction: column;
                text-align: center;
            }

            .about-box {
                text-align: left;
            }
        }

        @media(max-width:500px) {
            .hero h1 {
                font-size: 36px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid img:nth-child(1),
            .gallery-grid img:nth-child(4) {
                grid-column: auto;
                grid-row: auto;
            }

            .feature,
            .card,
            .testimonial {
                width: 100%;
            }

            .section,
            .gallery,
            .about,
            .contact,
            .features,
            .testimonials,
            .footer {
                padding-left: 5%;
                padding-right: 5%;
            }

            .section-title h2 {
                font-size: 32px;
            }

            .whatsapp-float {
                width: 58px;
                height: 58px;
                font-size: 28px;
                right: 16px;
                bottom: 16px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h2>Carring<span>tom</span></h2>

        <i class="fas fa-bars menu-toggle" onclick="toggleMenu()"></i>

        <nav id="menu">
            <a href="#negocios">Negocios</a>
            <a href="#galeria">Galería</a>
            <a href="#contacto">Contacto</a>
        </nav>

        <a href="/login" class="btn-login">Login</a>
    </header>

    <section class="hero" id="inicio">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-bolt"></i>
                Plataforma premium para soluciones digitales
            </div>

            <h1>
                Desarrollo de páginas web, aplicaciones móviles y
                <span>sistemas a la medida</span> 🚀
            </h1>

            <p>
                Impulsa tu negocio al siguiente nivel. Diseñamos menús interactivos con QR, catálogos digitales premium,
                apps dinámicas y plataformas de software con presencia profesional e impacto real.
            </p>

            <a href="#features" class="btn-main">Comenzar ahora</a>

            <div class="hero-images">
                <img src="/images/welcome1.jpeg">
                <img src="/images/welcome2.jpg">
                <img src="/images/welcome3.jpg">
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="feature">
            <i class="fas fa-qrcode"></i>
            <h3>QR Inteligente</h3>
            <p>Acceso inmediato y ágil a tus soluciones sin necesidad de descargas externas.</p>
        </div>

        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Responsive Pro</h3>
            <p>Adaptabilidad y visualización perfecta en cualquier smartphone, tablet y computadora.</p>
        </div>

        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Más clientes</h3>
            <p>Estrategias visuales optimizadas para convertir cada visita en conversiones reales.</p>
        </div>
    </section>

    <section class="section" id="negocios">
        <div class="section-title">
            <h2>Tipos de negocios</h2>
            <p>
                Arquitecturas modernas y de alto rendimiento adaptadas para restaurantes, cafeterías, tiendas
                corporativas y plataformas de software escalables.
            </p>
        </div>

        <div class="cards">
            <div class="card">
                <img src="/images/restaurante.jpg">
                <div class="card-content">
                    <h3>Restaurantes</h3>
                    <p>Menús digitales sumamente elegantes, fluidos y actualizables en tiempo real.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="/images/snack.jpeg">
                <div class="card-content">
                    <h3>Snacks</h3>
                    <p>Diseño visual altamente atractivo y estratégico para destacar en el mercado.</p>
                    <button>Ver más</button>
                </div>
            </div>

            <div class="card">
                <img src="/images/barberia.jpeg">
                <div class="card-content">
                    <h3>Barberías</h3>
                    <p>Catálogos digitales profesionales y sistemas ágiles de reserva.</p>
                    <button>Ver más</button>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery" id="galeria">
        <div class="section-title">
            <h2>Galería</h2>
            <p>
                Portafolio de experiencias de usuario modernas creadas para marcas y negocios que exigen posicionamiento
                premium.
            </p>
        </div>

        <div class="gallery-grid">
            <img src="/images/galeria1.webp">
            <img src="/images/galeria2.png">
            <img src="/images/galeria3.jpg">
            <img src="/images/galeria4.jpg">
            <img src="/images/galeria5.jpeg">
            <img src="/images/galeria6.jpg">
        </div>
    </section>

    <section class="about" id="nosotros">
        <img src="/images/about.png">

        <div class="about-text">
            <h2>Sobre nosotros</h2>
            <p>
                Impulsamos proyectos comerciales e institucionales mediante tecnologías avanzadas de desarrollo,
                interfaces estéticas de alto impacto y una ingeniería enfocada en el retorno de inversión de nuestros
                clientes.
            </p>

            <div class="about-boxes">
                <div class="about-box">
                    <h3>Misión</h3>
                    <p>
                        Acelerar la transformación digital mediante páginas web eficientes, aplicaciones móviles
                        estables y sistemas robustos a la medida.
                    </p>
                </div>

                <div class="about-box">
                    <h3>Visión</h3>
                    <p>
                        Posicionarnos como el referente principal de innovación tecnológica y diseño de software premium
                        en toda la región.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-title">
            <h2>Clientes felices</h2>
            <p>
                Empresas y emprendedores que automatizaron su flujo y escalaron su proyección comercial de la mano de
                Carringtom.
            </p>
        </div>

        <div class="testimonial-container">
            <div class="testimonial">
                <img src="/images/testimonia1.jpg">
                <p>
                    "Logré incrementar la captación de pedidos en un 40% gracias al nuevo sistema digital."
                </p>
                <strong>- Carlos</strong>
            </div>

            <div class="testimonial">
                <img src="/images/testimonia2.jpg">
                <p>
                    "Nuestra plataforma web y app móvil ahora lucen impecables, veloces y de primer nivel."
                </p>
                <strong>- Ana</strong>
            </div>

            <div class="testimonial">
                <img src="/images/testimonia3.jpg">
                <p>
                    "La experiencia fluida permite a los usuarios navegar por el catálogo con total comodidad."
                </p>
                <strong>- Luis</strong>
            </div>
        </div>
    </section>

    <section class="contact" id="contacto">
        <div class="section-title">
            <h2>Contáctanos 🚀</h2>
            <p>
                Comienza la planeación de tu sitio web, aplicación o software empresarial hoy mismo.
            </p>
        </div>

        <div class="contact-container">
            <div class="contact-form">
                <input type="text" placeholder="Tu nombre">
                <input type="email" placeholder="Tu correo">
                <textarea rows="5" placeholder="Escribe tu mensaje..."></textarea>
                <button>Enviar mensaje</button>
            </div>

            <div class="contact-info">
                <div class="contact-box">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <strong>Email</strong>
                        <p>brianisaac@carringtom.com</p>
                    </div>
                </div>

                <div class="contact-box">
                    <i class="fas fa-phone"></i>
                    <div>
                        <strong>Teléfono</strong>
                        <p>+52 961 123 4567</p>
                    </div>
                </div>

                <div class="contact-box">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <strong>Ubicación</strong>
                        <p>México</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col brand">
                <div class="logo">
                    <img src="/images/logo.png" alt="Carringtom">
                </div>
                <h2>Carringtom</h2>
                <p>
                    Ingeniería de software, diseño web profesional y desarrollo de aplicaciones de alta gama para
                    negocios modernos.
                </p>
            </div>

            <div class="footer-col">
                <h3>Explorar</h3>
                <ul>
                    <li><a href="#inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#negocios"><i class="fas fa-briefcase"></i> Negocios</a></li>
                    <li><a href="#nosotros"><i class="fas fa-user"></i> Nosotros</a></li>
                    <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Servicios</h3>
                <ul>
                    <li><i class="fas fa-code"></i> Desarrollo Web</li>
                    <li><i class="fas fa-mobile-alt"></i> Apps Móviles</li>
                    <li><i class="fas fa-cogs"></i> Sistemas a Medida</li>
                    <li><i class="fas fa-search"></i> Posicionamiento SEO</li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contacto</h3>
                <ul>
                    <li><i class="fas fa-envelope"></i> brianisaac@carringtom.com</li>
                    <li><i class="fas fa-phone"></i> +52 961 123 4567</li>
                </ul>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Carringtom PRO. Todos los derechos reservados.</p>
        </div>
    </footer>

    <a href="https://wa.me/529611234567" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('active');
        }

        // Cierra el menú de forma automática al hacer clic en un enlace de navegación
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('menu').classList.remove('active');
            });
        });
    </script>

</body>

</html>
