<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<section id="servicios" class="fullheight intro-module">

    <div class="intro-module-inner">
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <h1>Nuestros servicios </h1>

                    <h2>Ofrecemos soluciones de amoblamiento comercial para cualquier tipo de negocio</h2>

                    <h3>Desde supermercados, carnicerías, pollerías, panaderías, vinerías, galpones y depósitos en cualquier parte del país.</h3>

                    <a class="bt-sitio bt-cta" href="<?php echo get_permalink(get_page_by_title('Contacto')); ?>">Contáctenos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scrollDown">
        <div class="icon-scroll"></div>
    </div>

    <a href="<?php echo get_permalink(get_page_by_title('Contacto')); ?>" class="bt-sitio bt-cta bt-cta-mobile">Contáctanos</a>

</section>


<section id="servicio-detalle1" class="servicios-detalle">
    <h2>Somos fabricantes</h2>
    <p> De productos de primera calidad que se de adaptan a cualquier rubro. Desarrollamos nuestras propias ideas para ofrecer una óptima solución a empresas de todo tipo.</p>
    

</section>

<section id="servicio-detalle2" class="servicios-detalle">
    <h2>Garantía y experiencia</h2>
    <p>Hace más de 30 años que ofrecemos la más amplia variedad de artículos para exhibición de mercadería y almacenamiento. Nuestros productos están fabricados con los mejores materiales y normas de calidad ISO 9001.</p>
    

</section>

<?php get_template_part('template-parts/content', 'accesos-productos'); ?>

<section id="home-map">

</section>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo"></script>

<?php
get_footer();
