<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Interactivo | Versión Final</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin:0; font-family:'Poppins',sans-serif; background:#fff; color:#333; }
        #tsparticles { position:fixed; inset:0; z-index:-1; }
        .catalog-container { position:relative; z-index:1; max-width:1100px; margin:40px auto; padding:0 15px; }
        .catalog-header { text-align:center; font-size:2.8rem; font-weight:700; margin-bottom:40px; color:#222; }
        .product-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:30px; }
        .product-card { background:transparent; width:100%; height:480px; perspective:1000px; cursor:pointer; }
        .card-inner { position:relative; width:100%; height:100%; transition:transform .7s; transform-style:preserve-3d; }
        .product-card.is-flipped .card-inner { transform:rotateY(180deg); }
        .card-front,.card-back { position:absolute; inset:0; -webkit-backface-visibility:hidden; backface-visibility:hidden; border-radius:12px; overflow:hidden; display:flex; flex-direction:column; box-shadow:0 6px 20px rgba(0,0,0,.08); border:1px solid #e0e0e0; }
        .card-front { background:#fff; }
        .product-price { position:absolute; top:20px; right:-2px; background:#E91E63; color:#fff; padding:5px 20px; font-size:1.1rem; font-weight:700; border-radius:5px 0 0 5px; box-shadow:-2px 3px 8px rgba(0,0,0,.1); z-index:10; }
        .product-title { background:#f7f7f7; color:#333; padding:15px; text-align:center; font-weight:600; border-bottom:1px solid #e0e0e0; }
        .product-image-container { padding:15px; flex-grow:1; display:flex; align-items:center; justify-content:center; background:#fff; }
        .product-image { max-width:90%; max-height:180px; object-fit:contain; }
        .product-details { padding:20px; background:#fdfdfd; border-top:1px solid #e0e0e0; display:flex; flex-direction:column; gap:15px; }
        .detail-item { display:flex; justify-content:space-between; align-items:center; }
        .detail-item .label { font-weight:600; color:#555; }
        .color-swatches { display:flex; gap:10px; }
        .color-circle { width:24px; height:24px; border-radius:50%; border:1px solid #ccc; }
        .card-back { transform:rotateY(180deg); padding:20px 25px; overflow-y:auto; }
        .card-back h3 { margin:0 0 15px; padding-bottom:10px; border-bottom:2px solid currentColor; }
        .card-back h4 { margin:20px 0 8px; font-size:1.1rem; }
        .card-back ul { padding-left:0; margin:0 0 20px; list-style:none; }
        .card-back li { font-size:.85rem; margin-bottom:6px; padding-left:18px; position:relative; }
        .card-back li::before { content:'•'; position:absolute; left:0; font-size:1.2rem; line-height:1; }
        @media (min-width:600px){ .product-grid{ grid-template-columns:repeat(2,1fr);} }
        @media (min-width:992px){ .product-grid{ grid-template-columns:repeat(3,1fr);} }
        .pager { margin-top:32px; display:flex; justify-content:center; }
    </style>
</head>
<body>

<div id="tsparticles"></div>

<div class="catalog-container">
    <h1 class="catalog-header">Catálogo Interactivo</h1>

    <div class="product-grid">
        @forelse ($productos as $producto)
            @php
                $precio = $producto->precio_desde ?? optional($producto->variantes->first())->precio;
                $img = $producto->imagen_publica; // helper del modelo
                $capacidad = $producto->capacidad;
                $talla = $producto->talla;
                $colores = $producto->colores;
                $gradFrom = '#00BFFF';
                $gradTo   = '#0077be';
                $txtColor = '#ffffff';
            @endphp

            <div class="product-card">
                <div class="card-inner">
                    <div class="card-front">
                        @if($precio)
                            <div class="product-price">{{ money_mx($precio) }}</div>
                        @endif
                        <div class="product-title">{{ $producto->nombre }}</div>

                        <div class="product-image-container">
                            @if($img)
                                <img src="{{ $img }}" alt="{{ $producto->nombre }}" class="product-image" loading="lazy">
                            @else
                                <div>No image</div>
                            @endif
                        </div>

                        <div class="product-details">
                            <div class="detail-item">
                                <span class="label">Categoría</span><span>{{ $producto->categoria }}</span>
                            </div>

                            @if($capacidad)
                                <div class="detail-item">
                                    <span class="label">Capacidad</span><span>{{ $capacidad }}</span>
                                </div>
                            @endif

                            @if($talla)
                                <div class="detail-item">
                                    <span class="label">Talla</span><span>{{ $talla }}</span>
                                </div>
                            @endif

                            @if(count($colores))
                                <div class="detail-item">
                                    <span class="label">Colores</span>
                                    <div class="color-swatches">
                                        @foreach($colores as $c)
                                            <div class="color-circle" title="{{ $c }}" style="background-color: {{ $c }};"></div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-back" style="background: linear-gradient(45deg, {{ $gradFrom }}, {{ $gradTo }}); color: {{ $txtColor }};">
                        <h3>{{ $producto->nombre }}</h3>

                        @if($producto->descripcion)
                            {!! nl2br(e($producto->descripcion)) !!}
                        @else
                            <h4>Características:</h4>
                            <ul>
                                <li>Producto de alta calidad listo para personalización.</li>
                                <li>Categoría: {{ $producto->categoria }}</li>
                                @if($capacidad)<li>Capacidad: {{ $capacidad }}</li>@endif
                                @if($talla)<li>Talla: {{ $talla }}</li>@endif
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>No hay productos disponibles por ahora.</p>
        @endforelse
    </div>

    <div class="pager">
        {{ $productos->onEachSide(1)->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
    document.querySelectorAll('.product-card').forEach(card => {
        card.addEventListener('click', () => card.classList.toggle('is-flipped'));
    });

    await tsParticles.load("tsparticles", {
        fpsLimit: 60,
        particles: {
            number: { value: 60, density: { enable: true, value_area: 800 }},
            color: { value: ["#cccccc", "#a0c4ff"] },
            shape: { type: "circle" },
            opacity: { value: 0.5, random: true },
            size: { value: 3, random: true },
            links: { enable: true, distance: 150, color: "#d0d0d0", opacity: 0.3, width: 1 },
            move: { enable: true, speed: 1.5, direction: "none", out_mode: "out", straight: false }
        },
        interactivity: {
            events: { onhover: { enable: true, mode: "grab" }, onclick: { enable: true, mode: "push" }, resize: true },
            modes: { grab: { distance: 140, line_linked: { opacity: 0.5 } }, push: { particles_nb: 4 } }
        },
        detectRetina: true
    });
});
</script>
</body>
</html>
