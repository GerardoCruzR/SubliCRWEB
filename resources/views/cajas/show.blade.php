
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles de la Caja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


  <style>
    /* Custom styling for dark theme */
    body {
      background-color: #2b2b2b;
      color: #f1f1f1;
    }

    .navbar {
      background-color: #1c1c1c;
    }

    .navbar-brand,
    .nav-link {
      color: #f1f1f1;
    }

    .product-title {
      font-size: 1.75rem;
      font-weight: bold;
      color: #f1f1f1;
    }

    .product-price {
      font-size: 1.5rem;
      color: #e63946;
    }

    .image-gallery {
      text-align: center;
    }

    .image-gallery img {
      max-width: 100%;
      max-height: 400px;
      height: auto;
      border-radius: 8px;
      transition: transform 0.5s ease, box-shadow 0.5s ease;
      cursor: pointer;
    }

    .image-gallery img:hover {
      transform: scale(1.05);
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .image-gallery .thumbnail {
      width: 80px;
      cursor: pointer;
      border: 3px transparent;
      border-radius: 5px;
      transition: border-color 0.3s ease;
    }

    .image-gallery .thumbnail.selected {
      border-color: #ff0000;
    }

    .image-extra-container {
      width: 80px;
      height: 80px;
      background-color: #fff;
      color: #007bff;
      font-size: 24px;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 2px solid #007bff;
      border-radius: 10px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .image-extra-container:hover {
      transform: scale(1.05);
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
    }

    .product-description {
      background-color: #333;
      padding: 1.5rem;
      border-radius: 8px;
      margin-top: 1.5rem;
      margin-bottom: 2rem;
    }

    .table {
      background-color: #333 !important;
      color: #fff !important;
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
      border-bottom: 2px solid #ff0000;
    }

    .table th {
      background-color: #444 !important;
      color: #fff !important;
    }

    .table td {
      background-color: #2c2c2c !important;
      padding: 1rem;
      color: #fff !important;
    }

    .modal-content {
      background-color: #2b2b2b;
      color: #f1f1f1;
      border-radius: 8px;
    }

    .modal-header {
      border-bottom: 1px solid #444;
    }

    .modal-footer {
      border-top: 1px solid #444;
    }

    .contact-button {
      background-color: #FF6400;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 15px 30px;
      font-size: 1.25rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .contact-button::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      opacity: 0.2;
      transition: opacity 0.3s ease;
    }

    .contact-button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(255, 100, 0, 0.6);
    }

    .contact-button:hover::before {
      opacity: 0.4;
    }

    .contact-button i {
      margin-right: 8px;
    }

    /* Estilos adicionales para las imágenes en el modal */
    .modal-body img {
      max-width: 100%;
      height: auto;
      margin-bottom: 15px;
      cursor: pointer;
    }

    .grid-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 15px;
    }

    /* Estilo para la imagen ampliada en el modal */
    .enlarged-image {
      max-width: 90%;
      height: auto;
    }
/* Cambiar el color de la tacha de cerrar el modal a blanco */
.btn-close {
    filter: invert(1); /* Esto invierte el color, cambiando la 'X' a blanco */
    opacity: 1; /* Asegura que la opacidad sea máxima para que se vea clara */
}
    
  </style>
</head>

<body class="bg-dark">
  <!-- Navbar -->
  <x-header />

  <div class="container mt-5 fade-in">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <div class="image-gallery">
          <!-- Imagen principal con evento para abrir en su propio modal -->
          <img loading="lazy" src="data:image/jpeg;base64,{{ $caja->imagenes[0] }}" alt="Imagen principal" class="mb-3 img-fluid" id="mainImage" onclick="openMainImageModal()" data-bs-toggle="modal" data-bs-target="#mainImageModal">
          <div class="d-flex justify-content-center gap-2">
            @foreach ($caja->imagenes as $index => $imagen)
              @if ($index < 4)
                <img loading="lazy" src="data:image/jpeg;base64,{{ $imagen }}" class="col-2 img-fluid thumbnail @if($index === 0) selected @endif" alt="Imagen" onclick="changeMainImage(this)" onmouseover="highlightImage(this)" onmouseout="removeHighlight(this)">
              @endif
            @endforeach

            @if (count($caja->imagenes) > 4)
            <div class="image-extra-container" data-bs-toggle="modal" data-bs-target="#imageModal">
              <span>+{{ count($caja->imagenes) - 4 }}</span>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

       <!-- Descripción del Producto y Tabla -->
    <div class="product-description mt-4">
      <h5 class="titles2" style="text-align: center;">Descripción de la caja</h5> <br>
      <table class="table table-striped table-hover" id="specsTable">
      <table class="table table-striped table-hover">
    <tbody>
        <tr>
            <th scope="row">Tipo de Caja</th>
            <td>{{ $caja->tipo_caja }}</td>
        </tr>
        <tr>
            <th scope="row">Tamaño</th>
            <td>{{ $caja->tamano }}</td>
        </tr>
        <tr>
            <th scope="row">Marca</th>
            <td>{{ $caja->marca }}</td>
        </tr>
        <tr>
            <th scope="row">Año</th>
            <td>{{ $caja->ano }}</td>
        </tr>
        <tr>
            <th scope="row">Condición</th>
            <td>{{ $caja->condicion }}</td>
        </tr>
        <tr>
            <th scope="row">Precio</th>
            <td>${{ number_format($caja->precio, 2) }}</td>
        </tr>
        <tr>
            <th scope="row">Disponibilidad</th>
            <td>{{ $caja->disponibilidad == 1 ? 'Disponible' : 'No disponible' }}</td>
        </tr>
        <tr>
            <th scope="row">Tipo de Suspensión</th>
            <td>{{ $caja->tipo_suspension }}</td>
        </tr>
        <tr>
            <th scope="row">Equipamiento de Bolsas de Aire</th>
            <td>{{ $caja->bolsas_aire ? 'Equipado con bolsas de aire' : 'No equipado con bolsas de aire' }}</td>
        </tr>
        <tr>
            <th scope="row">Número de Ejes</th>
            <td>{{ $caja->numero_ejes }}</td>
        </tr>
        <tr>
            <th scope="row">Frenos</th>
            <td>{{ $caja->frenos }}</td>
        </tr>
        <tr>
            <th scope="row">Tipo de Puertas</th>
            <td>{{ $caja->tipo_puertas }}</td>
        </tr>
        <tr>
            <th scope="row">Capacidad de Carga</th>
            <td>{{ $caja->capacidad_carga }}</td>
        </tr>
        <tr>
            <th scope="row">Tipo de Motor</th>
            <td>{{ $caja->tipo_motor }}</td>
        </tr>
    </tbody>
</table>


      <!-- Contenedor para centrar los botones -->
      <div class="text-center mb-3">
        <button class="btn btn-light me-2" onclick="printTable()">
          <i class="fas fa-print"></i> Imprimir Tabla
        </button>
        <button class="btn btn-light" onclick="shareUnit()">
          <i class="fas fa-share-alt"></i> Compartir
        </button>
      </div>

      <!-- Botón de Contacto -->
      <div class="text-center mt-4">
      <button class="contact-button" 
    onclick="window.location.href=`https://api.whatsapp.com/send?phone=+526146056639&text=Quiero%20más%20información%20de%20esta%20caja:%20${encodeURIComponent(window.location.href)}`">
    <i class="fas fa-truck"></i> Solicita una cotización aquí
</button>
      </div>
    </div>
  </div>

  <!-- Modal para mostrar la imagen principal en grande -->
  <div class="modal fade" id="mainImageModal" tabindex="-1" aria-labelledby="mainImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mainImageModalLabel">Imagen Ampliada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="data:image/jpeg;base64,{{ $caja->imagenes[0] }}" alt="Imagen principal ampliada" class="img-fluid enlarged-image" id="mainImageEnlarged">
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para imágenes adicionales -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Imágenes Adicionales</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="grid-gallery">
            @foreach ($caja->imagenes as $imagen)
              <img src="data:image/jpeg;base64,{{ $imagen }}" class="img-fluid" alt="Imagen adicional" onclick="openInModal(this.src)">
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para mostrar la imagen seleccionada en grande desde el modal de imágenes adicionales -->
  <div class="modal fade" id="enlargedImageModal" tabindex="-1" aria-labelledby="enlargedImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enlargedImageModalLabel">Imagen Ampliada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="" alt="Imagen ampliada" id="enlargedImage" class="img-fluid enlarged-image">
        </div>
      </div>
    </div>
  </div>

  <x-footer />

  <script>
   function changeMainImage(image) {
  const mainImage = document.getElementById('mainImage');
  const thumbnails = document.getElementsByClassName('thumbnail');

  // Cambiar la imagen principal
  mainImage.src = image.src;

  // Quitar el borde rojo de todas las miniaturas
  for (let i = 0; i < thumbnails.length; i++) {
    thumbnails[i].classList.remove('selected'); // Remover la clase 'selected' que tiene el borde rojo
    thumbnails[i].style.border = "3px solid transparent"; // Restablecer el borde transparente
  }

  // Aplicar el borde rojo solo a la miniatura seleccionada
  image.classList.add('selected');
  image.style.border = "3px solid #ff0000"; // Borde rojo para la imagen seleccionada
}

    function highlightImage(image) {
      image.style.border = "3px solid #ff0000";
    }

    function removeHighlight(image) {
      if (!image.classList.contains('selected')) {
        image.style.border = "3px solid transparent";
      }
    }

    // Función para abrir una imagen adicional en un modal ampliado
    function openInModal(imageSrc) {
      const enlargedImage = document.getElementById('enlargedImage');
      enlargedImage.src = imageSrc;
      const modal = new bootstrap.Modal(document.getElementById('enlargedImageModal'));
      modal.show();
    }

    // Limpieza de modal al cerrarlo
    document.getElementById('enlargedImageModal').addEventListener('hidden.bs.modal', function () {
      document.getElementById('enlargedImage').src = '';
    });
  </script>
  <script>
 function printTable() {
  if (window.matchMedia("only screen and (max-width: 760px)").matches) {
    // Generar PDF para móviles usando jsPDF
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.text("Detalles de la Caja", 10, 10);

    // Obtener la tabla en formato HTML
    const table = document.getElementById('specsTable');
    const tableHTML = table.outerHTML;

    doc.html(tableHTML, {
      callback: function (doc) {
        doc.save("detalles_caja.pdf");
      },
      x: 10,
      y: 20
    });
  } else {
    const table = document.getElementById('specsTable');
    const newWin = window.open('');
    newWin.document.write('<html><head><title>Imprimir Tabla</title></head><body>');
    newWin.document.write(table.outerHTML);
    newWin.document.close();
    newWin.print();
  }
}
 function shareUnit() {
    const url = window.location.href; // Obtener la URL actual

    // Copiar la URL al portapapeles
    navigator.clipboard.writeText(url)
      .then(() => {
        // Avisar al usuario que se ha copiado el enlace
        alert('Enlace copiado al portapapeles. Ahora puedes compartirlo manualmente.');

        // Intentar usar la API de compartir si está disponible
        if (navigator.share) {
          navigator.share({
            title: 'Detalles de la Caja',
            text: 'Mira esta caja en venta:',
            url: url
          })
          .then(() => console.log('Compartido con éxito'))
          .catch((error) => console.log('Error al compartir', error));
        } else {
          alert('El navegador no soporta la función de compartir nativa.');
        }
      })
      .catch(err => {
        console.error('Error al copiar el enlace: ', err);
      });
  }

  
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>