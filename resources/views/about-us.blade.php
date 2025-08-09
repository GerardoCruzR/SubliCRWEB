<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TruckMart - About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body>

<x-header />

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1 class="section-heading" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Truckmart: El mejor lugar para <br> adquirir tu próximo tractocamión <br> de carga en México.</h1>
  </div>
</section>

<!-- Expert Section (Section 2) -->
<section class="py-5">
  <div class="container">
    <div class="row d-flex align-items-start">
      <div class="col-md-6">
        <img src="{{ asset('img/s2.png') }}" alt="Truck Fleet" class="custom-image">
      </div>
      <div class="col-md-6 d-flex flex-column justify-content-start align-items-start">
        <h2 class="section-heading2" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Fundada por expertos para expertos del transporte de carga.</h2>
        <p class="section-content" style="font-family: 'Roboto', sans-serif; font-weight: 400;"> 
          <br>Desde nuestra fundación en 2020 en Cuauhtémoc, <br> Chihuahua, Truckmart ha sido el punto de referencia para <br> los profesionales del sector de autotransporte de carga <br> en México. Somos una empresa creada por y para <br> personas que conocen los desafíos del sector y estamos <br> aquí para ofrecer soluciones reales. En Truckmart, <br> entendemos que cada negocio de transporte tiene <br> necesidades únicas, y por eso nos especializamos en <br> ofrecer únicamente las mejores unidades, garantizando la <br> mejor relación costo-beneficio del mercado.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Philosophy Section (Section 3) -->
<section class="py-4">
  <div class="container-fluid px-0">
    <div class="row no-gutters equal-columns">
      <!-- Columna izquierda: Fondo rojo -->
      <div class="col-md-6 bg-red-custom d-flex align-items-stretch">
        <div class="content-left-custom text-start" style="padding: 150px 0; padding-left: 105px;">
          <h2 class="section-title-custom" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Nuestra Filosofía: Calidad, <br>Confianza y Valor <br>Incomparable.</h2>
          <p class="section-content-custom" style="font-family: 'Roboto', sans-serif; font-weight: 400;">
              En Truckmart, creemos que el éxito de nuestros clientes es <br> nuestro éxito.
              Por eso nos comprometemos a proporcionar <br> unidades que no solo cumplen con los más altos <br> estándares de calidad,
              sino que también ofrecen precios <br> altamente competitivos. Nuestro enfoque está en dar a <br> nuestros clientes la confianza de que están
              tomando la <br> mejor decisión para sus negocios, con una atención <br> personalizada y soluciones que van más allá de lo <br> esperado.
          </p>
          <a href="https://api.whatsapp.com/send?phone=+526146056639&text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20de%20esta%20unidada" class="btn btn-custom mt-3" style="background-color: #fff; color: #000; border: none; font-weight: bold; border-radius: 0;">Contáctanos</a>
        </div>
      </div>

      <!-- Columna derecha: Fondo negro completo -->
      <div class="col-md-6 bg-black-custom d-flex align-items-stretch">
        <div class="text-start" style="padding: 150px 0; margin-left: 105px;">
          <ul class="list-unstyled text-red-custom">
            <li style="font-size: 1.1rem;"><strong>Calidad garantizada</strong> – Todas nuestras unidades son <br> inspeccionadas y certificadas.</li>
            <li style="font-size: 1.1rem;"><strong>Relación costo-beneficio</strong> – Los mejores precios en el <br> mercado, sin comprometer la calidad.</li>
            <li style="font-size: 1.1rem;"><strong>Transparencia y confianza</strong> – Nos aseguramos de que <br> sepas exactamente lo que estás comprando.</li>
            <li style="font-size: 1.1rem;"><strong>Atención personalizada</strong> – Asesoramiento experto de <br> principio a fin.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Partnership Section (Section 5) -->
<section class="py-5 custom-section">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-md-6">
        <h2 class="partner-title text-danger" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Más que una venta, somos<br>tu socio en el camino.</h2>
        <p class="partner-content" style="font-family: 'Roboto', sans-serif; font-weight: 400;"> En Truckmart, no solo vendemos tractocamiones, creamos relaciones duraderas.<br>Conocemos a fondo el sector y entendemos que nuestros clientes requieren mucho más<br>que un vehículo, necesitan confianza, fiabilidad y apoyo constante. Por eso, Truckmart se<br>compromete a acompañarte en cada etapa del proceso, asegurando que encuentres la<br>unidad perfecta para tu negocio.</p>
        <a href="https://api.whatsapp.com/send?phone=+526146056639&text=Quiero%20m%C3%A1s%20informaci%C3%B3n%20de%20esta%20unidada" class="btn btn-custom mt-3">Contáctanos</a>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('img/s4.png') }}" alt="Truck Driver" class="custom-image" style="width: 100%; max-width: 350px; margin-left: 50px;">
      </div>
    </div>
  </div>
</section>

<!-- Custom CSS -->
<style>
  .section-title-custom {
    font-size: 2.5rem; /* Tamaño aumentado */
    font-weight: bold;
    margin: 0;
  }

  .section-content-custom {
    font-size: 1.1rem; /* Tamaño aumentado */
    margin-top: 10px;
    line-height: 1.6; /* Mejorar legibilidad */
  }

  /* Fondo rojo personalizado para la columna izquierda */
  .bg-red-custom {
    background-color: #d60000;
    color: white;
    height: 100vh; /* Asegurar altura de toda la ventana */
  }

  /* Fondo negro personalizado para la columna derecha */
  .bg-black-custom {
    background-color: #000;
    color: white;
    height: 100vh; /* Asegurar altura de toda la ventana */
  }

  .btn-custom {
    background-color: #000; /* Fondo negro para el botón */
    color: #fff; /* Texto blanco */
    border: none; /* Sin borde */
    padding: 10px 20px; /* Igualar tamaño del botón blanco de Section 3 */
    font-weight: bold; /* Texto en negrita */
    border-radius: 0; /* Sin borde redondeado */
  }

  .btn-custom:hover {
    background-color: #333; /* Color de fondo al pasar el mouse */
    color: #fff; /* Texto blanco */
  }

  /* Color rojo para los textos de la lista */
  .text-red-custom li strong {
    color: #d60000; /* Cambia el color a rojo */
  }

  /* Ajustes para mantener ambas columnas de la misma altura */
  .equal-columns {
    display: flex;
    flex-wrap: wrap;
  }

  /* Apply the new title size (2.1rem) from Section 2 onwards */
  .section-heading2,
  .section-title-custom,
  .partner-title {
    font-size: 2.1rem; /* New title size */
  }

  /* Adjustments for Section 2 text padding and alignment in responsive */
  @media (max-width: 768px) {
    .section-heading2,
    .section-content,
    .section-title-custom {
      text-align: left;
      padding-left: 38px;
      padding-right: 38px;
    }

    .content-left-custom,
    .text-start {
      text-align: left;
    }

    .bg-black-custom, .bg-red-custom {
      height: auto; /* Para pantallas pequeñas, dejar que el contenido determine la altura */
    }

    .content-left-custom {
      padding: 15px!important;
    }
  }
  
</style>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
