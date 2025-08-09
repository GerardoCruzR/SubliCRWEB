<!-- Footer -->
<footer class="footer">
    <div class="text-center brand-section">
        <div class="col-md-12">
            <h5>TRUCKMART ®</h5>
        </div>
    </div>
    <div class="text-center">
        <div class="col-12 contact-row">
            <div class="contact-item">
                <i class="bi bi-geo-alt-fill"></i>
                <p>Chihuahua, Chih. México.</p>
            </div>
            <div class="contact-item">
                <i class="bi bi-telephone-fill"></i>
                <p>
                    Atención a clientes:
                    <a href="https://wa.me/526146056639?text=Hola%20necesito%20más%20información%20al%20respecto%20de%20las%20unidades."
                        target="_blank">
                        +52 614 605 6639
                    </a>
                </p>
            </div>

            <div class="contact-item">
                <i class="bi bi-envelope-fill"></i>
                <p>
                    <a href="mailto:ventas@truckmart.mx">ventas@truckmart.mx</a>
                </p>
            </div>

        </div>
    </div>
    <div class="">
        <div class="col-md-12 copyright">
            All Copyright reserved © <span id="copyright-year">2024</span>
        </div>
    </div>
    </div>
</footer>
<!-- Fin Footer -->

<script>
    // Obtener el año actual
    const currentYear = new Date().getFullYear();
    // Actualizar el contenido del elemento con el id 'copyright-year'
    document.getElementById('copyright-year').textContent = currentYear;
</script>

<style>
    /* Footer styles */
    .footer {
        background-color: #000;
        color: #fff;
        padding: 20px 0;
        width: 100%;
        /* Asegura que el footer ocupe el 100% del ancho */
    }

    .footer a {
        color: #fff;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .footer .copyright {
        text-align: center;
        padding-top: 50px;
        border-top: 1px solid #444;
        margin-top: 40px;
        margin-bottom: 40px;
        font-size: 14px;
    }

    .footer .contact-row {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        /* Espacio entre los elementos */
    }

    .footer .contact-item {
        display: flex;
        align-items: center;
    }

    .footer .contact-item i {
        margin-right: 10px;
        font-size: 1.2rem;
        /* Tamaño del ícono */
        line-height: 1;
        /* Ajusta la alineación vertical */
        vertical-align: middle;
        /* Alinea verticalmente el ícono */
    }

    .footer .contact-item p {
        margin-bottom: 0;
        line-height: 1.5;
        /* Ajusta el espaciado vertical del texto */
    }

    .footer .brand-section h5 {
        margin-top: 20px;
        /* Margen superior */
        margin-bottom: 35px;
        /* Margen inferior */
    }

    .footer .copyright {
        margin-bottom: 5px;
        /* Margen inferior */
    }

    .col-12.mb-3 {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* Fin Footer */
</style>
