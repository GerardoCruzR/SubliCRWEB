<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubliCR - Soluciones Creativas</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* --- ESTILOS GENERALES Y HEADER --- */
        body {
            background-color: #ffffff;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* (NUEVO) Oculta elementos para animarlos al entrar */
        .animate-on-scroll {
            opacity: 0;
        }
        
        #main-header {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        #main-header.header-scrolled {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        /* --- ESTILOS CARRUSEL PRINCIPAL (HERO) --- */
        .hero-carousel .carousel-item {
            height: 85vh;
            min-height: 400px;
            position: relative;
        }

        .hero-carousel .carousel-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, var(--cmyk-color-start) 0%, var(--cmyk-color-end) 60%);
            z-index: 1;
        }

        .hero-carousel .carousel-item img {
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .hero-carousel .carousel-caption {
            bottom: 5%;
            z-index: 2;
            text-align: center;
            left: 10%;
            right: 10%;
        }

        .hero-carousel .carousel-caption h5 {
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .hero-carousel .carousel-caption p {
            font-size: 1.2rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
        }
        
        .phrase-after-carousel p {
            font-size: 1.5rem;
            color: #333;
            font-weight: 600;
        }

        .carousel-control-prev, .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.3);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        /* --- ESTILOS SECCIÓN DE SERVICIOS --- */
        .services-section {
            background-color: #10141f;
            padding: 80px 0;
            overflow: hidden;
        }
        .services-section .section-header {
            text-align: center;
            color: #ffffff;
            padding: 0 20px;
            margin-bottom: 50px;
        }
        .services-section .section-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .services-section .section-header .text-highlight {
            color: #00AEEF;
        }
        .services-section .section-header p {
            font-size: 1.1rem;
            color: #c5c5c5;
            max-width: 600px;
            margin: 0 auto;
        }
        .services-carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 40px;
            gap: 30px;
            scrollbar-width: none;
        }
        .services-carousel::-webkit-scrollbar { display: none; }
        .service-card {
            display: flex;
            flex-direction: column;
            flex: 0 0 300px;
            text-decoration: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 120%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.6), transparent);
            transition: left 0.6s ease;
            z-index: 2;
        }
        .service-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }
        .service-card:hover::before {
            left: 100%;
        }
        .service-card:hover .card-top i {
            transform: translateY(-8px) rotate(-15deg);
        }
        .service-card .card-top {
            padding: 40px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 150px;
            position: relative;
            overflow: hidden;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.05), transparent);
        }
        @keyframes particles-animation {
            from { background-position: 0 0; }
            to { background-position: -100px 50px; }
        }
        .service-card .card-top::after {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 200%; height: 200%;
            background-image: radial-gradient(circle, rgba(255,255,255,0.3) 2px, transparent 2.5px);
            background-size: 20px 20px;
            animation: particles-animation 10s linear infinite;
            opacity: 0.8;
            z-index: 0;
        }
        .service-card .card-top i {
            font-size: 70px;
            color: #ffffff;
            transition: transform 0.4s ease;
            z-index: 1;
        }
        .service-card .card-bottom {
            background-color: #ffffff;
            padding: 30px;
            flex-grow: 1;
        }
        .card-bottom h3 { font-size: 1.5rem; font-weight: 700; color: #1c1c1c; margin-bottom: 15px; }
        .card-bottom p { font-size: 1rem; color: #555555; line-height: 1.6; }
        .card-color-1 .card-top { background-color: #00AEEF; }
        .card-color-2 .card-top { background-color: #EC008C; }
        .card-color-3 .card-top { background-color: #FFC700; }
        .card-color-4 .card-top { background-color: #662D91; }
        .card-color-5 .card-top { background-color: #1A1A1A; }
        .carousel-pagination { text-align: center; margin-top: 30px; }
        .carousel-pagination .dot { display: inline-block; width: 10px; height: 10px; background-color: #777; border-radius: 50%; margin: 0 4px; cursor: pointer; transition: background-color 0.3s ease; }
        .carousel-pagination .dot.active { background-color: #00AEEF; }

        /* --- ESTILOS SECCIÓN DE PRODUCTOS --- */
        .products-section { padding: 80px 20px; background-color: #f8f9fa; }
        .products-section .section-header { text-align: center; margin-bottom: 50px; }
        .products-section .section-header h2 { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .products-section .section-header .text-highlight { color: #EC008C; }
        .products-section .section-header p { font-size: 1.1rem; color: #6c757d; max-width: 600px; margin: 0 auto; }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; }
        .product-card { background-color: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s ease, box-shadow 0.3s ease; display: flex; flex-direction: column; }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .product-card-top { padding: 30px; min-height: 150px; display: flex; justify-content: center; align-items: center; }
        .product-card-top i { font-size: 60px; }
        .product-card-content { padding: 25px; text-align: left; flex-grow: 1; display: flex; flex-direction: column; }
        .product-card-content h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 10px; color: #333; }
        .product-card-content p { font-size: 0.9rem; color: #6c757d; line-height: 1.6; flex-grow: 1; margin-bottom: 20px; }
        .product-card-footer { display: flex; justify-content: space-between; align-items: center; margin-top: auto; }
        .product-price { font-size: 1.1rem; font-weight: 700; }
        .product-button { font-size: 0.9rem; font-weight: 600; padding: 8px 18px; border-radius: 50px; text-decoration: none; color: #fff; transition: opacity 0.3s ease; }
        .product-button:hover { opacity: 0.85; }
        .btn-catalog { display: inline-block; margin-top: 50px; padding: 12px 30px; background-color: #00AEEF; color: #fff; font-weight: 600; border-radius: 50px; text-decoration: none; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .btn-catalog:hover { transform: scale(1.05); box-shadow: 0 8px 20px rgba(0, 174, 239, 0.3); }
        .product-card.tazas .product-card-top { background-color: #e0f7fa; color: #00AEEF;} .product-card.tazas .product-price { color: #00AEEF; } .product-card.tazas .product-button { background-color: #00AEEF; }
        .product-card.fundas .product-card-top { background-color: #fce4ec; color: #EC008C;} .product-card.fundas .product-price { color: #EC008C; } .product-card.fundas .product-button { background-color: #EC008C; }
        .product-card.camisetas .product-card-top { background-color: #fffde7; color: #FBC02D;} .product-card.camisetas .product-price { color: #FBC02D; } .product-card.camisetas .product-button { background-color: #FBC02D; }

        /* --- ESTILOS SECCIÓN DE PROCESO --- */
        .process-section { background-color: #fff; padding: 80px 20px; text-align: center; }
        .process-section .section-header { max-width: 600px; margin: 0 auto 60px auto; }
        .process-section .section-header h2 { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .process-section .section-header .text-highlight { color: #fbc107; }
        .process-section .section-header p { font-size: 1.1rem; color: #6c757d; line-height: 1.6; }
        .process-steps-container { display: flex; justify-content: center; align-items: flex-start; max-width: 1200px; margin: 0 auto; }
        .process-step { flex: 1; padding: 0 15px; position: relative; }
        .process-icon-wrapper { width: 90px; height: 90px; border-radius: 50%; margin: 0 auto 25px auto; display: flex; justify-content: center; align-items: center; border: 2px solid; transition: transform 0.3s ease; }
        .process-step:hover .process-icon-wrapper { transform: scale(1.1) rotate(10deg); }
        .process-icon-wrapper i { font-size: 40px; }
        .process-step h3 { font-size: 1.2rem; font-weight: 600; color: #333; margin-bottom: 15px; position: relative; }
        .process-step p { font-size: 0.95rem; color: #6c757d; line-height: 1.7; }
        .process-step:not(:last-child) h3::after { content: ''; position: absolute; top: 50%; left: calc(100% + 10px); transform: translateY(-50%); width: 50px; height: 4px; border-radius: 4px; }
        .process-step.step-1 h3::after { background: linear-gradient(to right, #00bcd4, #e91e63); }
        .process-step.step-2 h3::after { background: linear-gradient(to right, #e91e63, #ffc107); }
        .process-step.step-3 h3::after { background: linear-gradient(to right, #ffc107, #757575); }
        .process-step.step-1 .process-icon-wrapper { background-color: #e0f7fa; border-color: #b2ebf2; color: #00bcd4; }
        .process-step.step-2 .process-icon-wrapper { background-color: #fce4ec; border-color: #f8bbd0; color: #e91e63; }
        .process-step.step-3 .process-icon-wrapper { background-color: #fffde7; border-color: #fff9c4; color: #ffc107; }
        .process-step.step-4 .process-icon-wrapper { background-color: #f5f5f5; border-color: #e0e0e0; color: #757575; }

        /* --- ESTILOS SECCIÓN GALERÍA --- */
        .gallery-section { background-color: #f8f9fa; padding: 80px 20px; text-align: center; }
        .gallery-section .section-header { max-width: 600px; margin: 0 auto 50px auto; }
        .gallery-section .section-header h2 { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .gallery-section .section-header .text-highlight { color: #00AEEF; }
        .gallery-section .section-header p { font-size: 1.1rem; color: #6c757d; line-height: 1.6; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; max-width: 1200px; margin: 0 auto; }
        .gallery-item { display: block; position: relative; overflow: hidden; border-radius: 16px; box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07); aspect-ratio: 1 / 1; transition: transform 0.4s ease; }
        .gallery-item:hover { transform: translateY(-8px); }
        .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
        .gallery-item:hover img { transform: scale(1.1); }
        .gallery-item .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); color: #fff; display: flex; justify-content: center; align-items: center; font-size: 40px; opacity: 0; transition: opacity 0.4s ease; }
        .gallery-item:hover .overlay { opacity: 1; }
        .gallery-footer { margin-top: 50px; }
        .btn-gallery { display: inline-block; padding: 14px 35px; border: none; border-radius: 50px; color: #fff; font-weight: 600; text-decoration: none; background: linear-gradient(to right, #e91e63, #ec008c); box-shadow: 0 5px 20px rgba(236, 0, 140, 0.4); transition: all 0.3s ease; }
        .btn-gallery:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(236, 0, 140, 0.5); }

        /* --- ESTILOS SECCIÓN TESTIMONIOS --- */
        .testimonials-section { background-color: #fff; padding: 80px 20px; text-align: center; }
        .testimonials-section .section-header { max-width: 700px; margin: 0 auto 50px auto; }
        .testimonials-section .section-header h2 { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .testimonials-section .section-header .text-highlight { color: #fbc107; }
        .testimonials-section .section-header p { font-size: 1.1rem; color: #6c757d; line-height: 1.6; }
        .testimonials-grid { display: flex; justify-content: center; align-items: stretch; gap: 30px; flex-wrap: wrap; max-width: 1200px; margin: 0 auto; }
        .testimonial-card { background-color: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07); text-align: left; flex: 1 1 300px; max-width: 360px; display: flex; flex-direction: column; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .testimonial-card:hover { transform: translateY(-8px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
        .testimonial-header { display: flex; align-items: center; margin-bottom: 20px; }
        .testimonial-avatar { width: 50px; height: 50px; min-width: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px; font-size: 24px; }
        .testimonial-avatar.color-blue { background-color: #e0f7fa; color: #00bcd4; }
        .testimonial-avatar.color-pink { background-color: #fce4ec; color: #e91e63; }
        .testimonial-avatar.color-yellow { background-color: #fffde7; color: #ffc107; }
        .testimonial-author h4 { font-size: 1.1rem; font-weight: 600; color: #333; margin: 0; line-height: 1.2; }
        .testimonial-author span { font-size: 0.9rem; color: #6c757d; }
        .testimonial-body { flex-grow: 1; }
        .testimonial-body p { color: #555; line-height: 1.7; font-size: 0.95rem; margin: 0; }
        .testimonial-rating { margin-top: 20px; color: #fbc107; }
        .testimonial-rating i { font-size: 18px; margin-right: 2px; }

        /* --- ESTILOS SECCIÓN CONTACTO --- */
        .contact-section { background-color: #f8f9fa; padding: 80px 20px; }
        .contact-section .section-header { text-align: center; max-width: 700px; margin: 0 auto 50px auto; }
        .contact-section .section-header h2 { font-size: 2.5rem; font-weight: 700; color: #333; margin-bottom: 15px; }
        .contact-section .section-header p { font-size: 1.1rem; color: #6c757d; line-height: 1.6; }
        .contact-container { display: flex; flex-wrap: wrap; gap: 40px; max-width: 1200px; margin: 0 auto; }
        .contact-form-wrapper { flex: 1.5; min-width: 300px; background-color: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0, 0, 0, 0.07); }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.9rem; font-weight: 600; color: #333; margin-bottom: 8px; text-align: left;}
        .form-group input, .form-group textarea { width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; font-family: 'Poppins', sans-serif; transition: border-color 0.3s ease; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #00AEEF; }
        .form-group textarea { resize: vertical; min-height: 120px; }
        .btn-submit { width: 100%; padding: 14px; border: none; border-radius: 8px; background: linear-gradient(to right, #00AEEF, #008ecc); color: #fff; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; }
        .btn-submit:hover { opacity: 0.9; transform: translateY(-2px); }
        .contact-info-wrapper { flex: 1; min-width: 300px; }
        .contact-info-wrapper h3 { font-size: 1.5rem; font-weight: 600; margin-bottom: 25px; text-align: left; }
        .contact-info-item { display: flex; align-items: flex-start; margin-bottom: 25px; text-align: left; }
        .contact-icon { width: 45px; height: 45px; min-width: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 22px; margin-right: 20px; }
        .contact-icon.color-blue { background-color: #e0f7fa; color: #00bcd4; }
        .contact-icon.color-pink { background-color: #fce4ec; color: #e91e63; }
        .contact-icon.color-yellow { background-color: #fffde7; color: #ffc107; }
        .contact-icon.color-gray { background-color: #f5f5f5; color: #757575; }
        .contact-details h4 { font-size: 1.1rem; font-weight: 600; margin: 0 0 5px 0; }
        .contact-details p { font-size: 1rem; color: #6c757d; line-height: 1.6; margin: 0; }
        .social-icons { display: flex; gap: 15px; margin-top: 15px; }
        .social-icons a { display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 50%; color: #fff; font-size: 20px; text-decoration: none; transition: transform 0.3s ease; }
        .social-icons a:hover { transform: scale(1.1); }
        .social-fb { background-color: #1877F2; }
        .social-ig { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .social-tw { background-color: #1DA1F2; }
        .social-yt { background-color: #FF0000; }
        
        /* --- DISEÑO RESPONSIVO GENERAL --- */
        @media (max-width: 768px) {
            .hero-carousel .carousel-item { height: 60vh; min-height: 350px; }
            .hero-carousel .carousel-caption h5 { font-size: 1.8rem; }
            .hero-carousel .carousel-caption p { font-size: 1rem; }
            .services-carousel { padding: 20px; flex-direction: column; align-items: center; overflow-x: hidden; }
            .service-card { flex: 0 0 auto; width: 90%; max-width: 320px; }
            .services-section .section-header h2,
            .products-section .section-header h2,
            .process-section .section-header h2,
            .gallery-section .section-header h2,
            .testimonials-section .section-header h2,
            .contact-section .section-header h2 {
                font-size: 2rem;
            }
            .services-section .carousel-pagination { display: none; }
            .process-steps-container { flex-direction: column; align-items: center; gap: 40px; }
            .process-step { max-width: 350px; }
            .process-step:not(:last-child) h3::after { display: none; }
        }
    </style>
</head>
<body>

    <header id="main-header" class="w-full py-4 px-6 fixed top-0 z-50 flex items-center justify-between transition-all duration-300 ease-in-out">
        <div class="w-1/3 flex justify-start">
            <a href="#contacto" class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-indigo-500 rounded-full shadow-md group">
                <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-indigo-500 group-hover:translate-x-0 ease">🎨</span>
                <span class="absolute flex items-center justify-center w-full h-full text-indigo-600 transition-all duration-300 transform group-hover:translate-x-full ease">Personaliza</span>
                <span class="relative invisible">Personaliza</span>
            </a>
        </div>
        <div class="w-1/3 flex justify-center">
            <a href="/">
                <img src="img/Logo_1.svg" alt="Logo" class="h-10" id="logo-image">
            </a>
        </div>
        <div class="w-1/3 flex justify-end">
            <a href="#" class="relative inline-flex items-center justify-center px-6 py-2 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-indigo-500 rounded-full shadow-md group">
                <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-indigo-500 group-hover:translate-x-0 ease">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" /></svg>
                </span>
                <span class="absolute flex items-center justify-center w-full h-full text-indigo-600 transition-all duration-300 transform group-hover:translate-x-full ease">Login</span>
                <span class="relative invisible">Login</span>
            </a>
        </div>
    </header>

    <main>

        <section class="hero-carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="--cmyk-color-start: rgba(0, 174, 239, 0.6); --cmyk-color-end: rgba(0, 174, 239, 0);">
                        <img src="img/1.svg" class="d-block w-100" alt="Artículos para cumpleaños">
                        <div class="carousel-caption">
                            <h5>Celebra con Alegría</h5>
                            <p>Artículos personalizados para hacer de tu cumpleaños un momento inolvidable.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="--cmyk-color-start: rgba(255, 0, 165, 0.6); --cmyk-color-end: rgba(255, 0, 165, 0);">
                        <img src="img/2.svg" class="d-block w-100" alt="Artículos para graduaciones">
                        <div class="carousel-caption">
                            <h5>Un Logro para Recordar</h5>
                            <p>Personaliza tus artículos para celebrar tu graduación con un toque único.</p>
                        </div>
                    </div>
                    <div class="carousel-item" style="--cmyk-color-start: rgba(255, 242, 0, 0.6); --cmyk-color-end: rgba(255, 242, 0, 0);">
                        <img src="img/3.svg" class="d-block w-100" alt="Artículos para empresas">
                        <div class="carousel-caption">
                            <h5>Impulsa tu Marca</h5>
                            <p>Artículos personalizados para empresas y eventos corporativos que dejan huella.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>

        <div class="phrase-after-carousel text-center py-4">
            <p>Graba ese momento especial con nuestros artículos personalizados.</p>
        </div>

        <section class="services-section" id="servicios">
            <div class="section-header">
                <h2>Nuestros <span class="text-highlight">Servicios</span></h2>
                <p>Soluciones creativas y profesionales para hacer realidad tus ideas con la más alta calidad y tecnología.</p>
            </div>
            <div class="services-carousel" id="services-carousel-container">
                <a href="#" class="service-card card-color-1"><div class="card-top"><i class='bx bx-palette'></i></div><div class="card-bottom"><h3>Diseño</h3><p>Creamos diseños personalizados que capturan la esencia de tu marca.</p></div></a>
                <a href="#" class="service-card card-color-2"><div class="card-top"><i class='bx bx-laser'></i></div><div class="card-bottom"><h3>Grabado Láser</h3><p>Grabados de precisión en madera, acrílico y otros materiales.</p></div></a>
                <a href="#" class="service-card card-color-3"><div class="card-top"><i class='bx bx-cut'></i></div><div class="card-bottom"><h3>Corte de Vinil</h3><p>Calcomanías y rotulaciones de alta calidad con cortes precisos.</p></div></a>
                <a href="#" class="service-card card-color-4"><div class="card-top"><i class='bx bx-transfer'></i></div><div class="card-bottom"><h3>Sublimación</h3><p>Transferimos diseños a tazas y camisetas con colores vibrantes.</p></div></a>
                <a href="#" class="service-card card-color-5"><div class="card-top"><i class='bx bxs-t-shirt'></i></div><div class="card-bottom"><h3>Estampado</h3><p>Estampado de alta calidad para textiles con durabilidad y nitidez.</p></div></a>
            </div>
            <div class="carousel-pagination" id="services-carousel-pagination"></div>
        </section>

        <section class="products-section" id="productos">
            <div class="section-header">
                <h2>Nuestros <span class="text-highlight">Productos</span></h2>
                <p>Descubre nuestra amplia gama de productos personalizables con la mejor calidad de sublimación.</p>
            </div>
            <div class="products-grid">
                <div class="product-card tazas">
                    <div class="product-card-top"><i class='bx bxs-coffee-alt'></i></div>
                    <div class="product-card-content">
                        <h3>Tazas Personalizadas</h3>
                        <p>Tazas de cerámica de alta calidad con tu diseño favorito, resistentes al microondas y lavavajillas.</p>
                        <div class="product-card-footer">
                            <span class="product-price">$120 MXN</span>
                            <a href="#" class="product-button">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="product-card fundas">
                    <div class="product-card-top"><i class='bx bx-mobile-alt'></i></div>
                    <div class="product-card-content">
                        <h3>Fundas para Celular</h3>
                        <p>Fundas resistentes y duraderas con tu diseño personalizado para proteger tu dispositivo con estilo.</p>
                        <div class="product-card-footer">
                            <span class="product-price">$180 MXN</span>
                            <a href="#" class="product-button">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="product-card camisetas">
                    <div class="product-card-top"><i class='bx bxs-t-shirt'></i></div>
                    <div class="product-card-content">
                        <h3>Camisetas Premium</h3>
                        <p>Camisetas de algodón de alta calidad con sublimación total para un acabado perfecto y duradero.</p>
                        <div class="product-card-footer">
                            <span class="product-price">$250 MXN</span>
                            <a href="#" class="product-button">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn-catalog">Ver catálogo completo</a>
            </div>
        </section>

        <section class="process-section" id="proceso">
            <div class="section-header">
                <h2>Nuestro <span class="text-highlight">Proceso</span></h2>
                <p>Conoce cómo trabajamos para convertir tus ideas en productos personalizados de alta calidad.</p>
            </div>
            <div class="process-steps-container">
                <div class="process-step step-1">
                    <div class="process-icon-wrapper"><i class='bx bx-edit-alt'></i></div>
                    <h3>1. Diseño</h3>
                    <p>Crea tu diseño o déjalo en manos de nuestros expertos diseñadores para obtener un resultado profesional.</p>
                </div>
                <div class="process-step step-2">
                    <div class="process-icon-wrapper"><i class='bx bx-check-circle'></i></div>
                    <h3>2. Aprobación</h3>
                    <p>Revisamos juntos el diseño final y realizamos los ajustes necesarios hasta tu completa satisfacción.</p>
                </div>
                <div class="process-step step-3">
                    <div class="process-icon-wrapper"><i class='bx bx-cog'></i></div>
                    <h3>3. Producción</h3>
                    <p>Utilizamos equipos de última generación para sublimar tu diseño con la más alta calidad y precisión.</p>
                </div>
                <div class="process-step step-4">
                    <div class="process-icon-wrapper"><i class='bx bx-package'></i></div>
                    <h3>4. Entrega</h3>
                    <p>Empacamos cuidadosamente tu pedido y lo entregamos en el tiempo acordado, listo para usar o regalar.</p>
                </div>
            </div>
        </section>

        <section class="gallery-section" id="galeria">
            <div class="section-header">
                <h2>Nuestra <span class="text-highlight">Galería</span></h2>
                <p>Explora algunos de nuestros trabajos recientes y déjate inspirar para tu próximo proyecto.</p>
            </div>
            <div class="gallery-grid">
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/10/400/400" alt="Trabajo 1"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/20/400/400" alt="Trabajo 2"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/30/400/400" alt="Trabajo 3"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/40/400/400" alt="Trabajo 4"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/50/400/400" alt="Trabajo 5"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/60/400/400" alt="Trabajo 6"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/70/400/400" alt="Trabajo 7"><div class="overlay"><i class='bx bx-plus'></i></div></a>
                <a href="#" class="gallery-item"><img src="https://picsum.photos/id/80/400/400" alt="Trabajo 8"><div class="overlay"><i class='bx bx-plus'></i></div></a>
            </div>
            <div class="gallery-footer">
                <a href="#" class="btn-gallery">Ver más trabajos</a>
            </div>
        </section>

        <section class="testimonials-section" id="testimonios">
            <div class="section-header">
                <h2>Lo que dicen nuestros <span class="text-highlight">Clientes</span></h2>
                <p>La satisfacción de nuestros clientes es nuestra mejor carta de presentación.</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar color-blue"><i class='bx bxs-user'></i></div>
                        <div class="testimonial-author"><h4>Laura Martínez</h4><span>Emprendedora</span></div>
                    </div>
                    <div class="testimonial-body"><p>"Increíble calidad en las tazas personalizadas para mi negocio. Los colores son vibrantes y el acabado es profesional."</p></div>
                    <div class="testimonial-rating"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar color-pink"><i class='bx bxs-user'></i></div>
                        <div class="testimonial-author"><h4>Carlos Rodríguez</h4><span>Gerente de Marketing</span></div>
                    </div>
                    <div class="testimonial-body"><p>"Pedimos camisetas personalizadas para un evento corporativo y el resultado superó nuestras expectativas."</p></div>
                    <div class="testimonial-rating"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar color-yellow"><i class='bx bxs-user'></i></div>
                        <div class="testimonial-author"><h4>Ana Gómez</h4><span>Diseñadora Gráfica</span></div>
                    </div>
                    <div class="testimonial-body"><p>"Como diseñadora, soy muy exigente. Ha sido el único lugar donde mis diseños se ven exactamente como los imaginé."</p></div>
                    <div class="testimonial-rating"><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i><i class='bx bxs-star'></i></div>
                </div>
            </div>
        </section>

        <section class="contact-section" id="contacto">
            <div class="section-header">
                <h2>Contáctanos</h2>
                <p>¿Tienes alguna pregunta o proyecto en mente? Estamos aquí para ayudarte.</p>
            </div>
            <div class="contact-container">
                <div class="contact-form-wrapper">
                    <form action="#" method="POST">
                        <div class="form-group"><label for="name">Nombre completo</label><input type="text" id="name" name="name" placeholder="Tu nombre" required></div>
                        <div class="form-group"><label for="email">Correo electrónico</label><input type="email" id="email" name="email" placeholder="tu@email.com" required></div>
                        <div class="form-group"><label for="phone">Teléfono</label><input type="tel" id="phone" name="phone" placeholder="Tu número de teléfono"></div>
                        <div class="form-group"><label for="message">Mensaje</label><textarea id="message" name="message" placeholder="Cuéntanos sobre tu proyecto..." required></textarea></div>
                        <button type="submit" class="btn-submit">Enviar mensaje</button>
                    </form>
                </div>
                <div class="contact-info-wrapper">
                    <h3>Información de contacto</h3>
                    <div class="contact-info-item"><div class="contact-icon color-blue"><i class='bx bxs-map'></i></div><div class="contact-details"><h4>Dirección</h4><p>Av. Principal #123, Col. Centro<br>Ciudad de México, CP 12345</p></div></div>
                    <div class="contact-info-item"><div class="contact-icon color-pink"><i class='bx bxs-phone'></i></div><div class="contact-details"><h4>Teléfono</h4><p>+52 (55) 1234 5678<br>+52 (55) 8765 4321</p></div></div>
                    <div class="contact-info-item"><div class="contact-icon color-yellow"><i class='bx bxs-envelope'></i></div><div class="contact-details"><h4>Correo electrónico</h4><p>info@sublicr.com<br>ventas@sublicr.com</p></div></div>
                    <div class="contact-info-item"><div class="contact-icon color-gray"><i class='bx bxs-time-five'></i></div><div class="contact-details"><h4>Horario de atención</h4><p>Lunes a Viernes: 9:00 AM - 6:00 PM<br>Sábados: 10:00 AM - 2:00 PM</p></div></div>
                    <h3>Síguenos en redes sociales</h3>
                    <div class="social-icons">
                        <a href="#" class="social-fb" aria-label="Facebook"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="social-ig" aria-label="Instagram"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="social-tw" aria-label="Twitter"><i class='bx bxl-twitter'></i></a>
                        <a href="#" class="social-yt" aria-label="YouTube"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2025 SubliCR. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Script para el header con efecto de scroll y cambio de logo ---
            const header = document.getElementById('main-header');
            const logoImage = document.getElementById('logo-image');
            const initialLogo = "img/Logo_1.svg";
            const scrolledLogo = "img/Logo.svg";

            window.addEventListener('scroll', () => {
                const scrolled = window.scrollY > 50;
                header.classList.toggle('header-scrolled', scrolled);
                if (logoImage) {
                    logoImage.src = scrolled ? scrolledLogo : initialLogo;
                }
            });

            // --- Script para activar el carrusel principal ---
            const heroCarousel = document.querySelector("#carouselExampleCaptions");
            if (heroCarousel) {
                const carousel = new bootstrap.Carousel(heroCarousel, {
                    interval: 5000,
                    ride: "carousel"
                });
            }

            // --- Script para el carrusel de servicios y su paginación ---
            const servicesCarousel = document.getElementById('services-carousel-container');
            const paginationContainer = document.getElementById('services-carousel-pagination');
            if (servicesCarousel && paginationContainer) {
                const cards = servicesCarousel.querySelectorAll('.service-card');
                if (cards.length > 0) {
                    for (let i = 0; i < cards.length; i++) {
                        const dot = document.createElement('span');
                        dot.classList.add('dot');
                        if (i === 0) dot.classList.add('active');
                        dot.addEventListener('click', () => {
                            const cardWidth = cards[i].offsetWidth;
                            const gap = 30;
                            servicesCarousel.scrollLeft = i * (cardWidth + gap);
                        });
                        paginationContainer.appendChild(dot);
                    }
                    
                    const dots = paginationContainer.querySelectorAll('.dot');
                    
                    servicesCarousel.addEventListener('scroll', () => {
                        const cardWidth = cards[0].offsetWidth;
                        const gap = 30;
                        const scrollLeft = servicesCarousel.scrollLeft;
                        const currentIndex = Math.round(scrollLeft / (cardWidth + gap));
                        
                        dots.forEach((dot, index) => {
                            dot.classList.toggle('active', index === currentIndex);
                        });
                    });
                }
            }
        });
    </script>
</body>
</html>