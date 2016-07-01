<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>
<section id="contacto" class="page-header">

    <h1><?php the_title(); ?></h1>

</section>

<section id="contacto-form">

    <div id="contacto-form-container">
        <div class="ajaxing"><span></span></div>    

        <div class="container">
            <div class="row">

                <div class="col-md-5">

                    <h2>Gracias por visitar el sitio web de la Federación
                        Gremial del Comercio e Industria de Rosario.</h2>

                    <p>Para solicitar información, o realizar consultas, por favor,
                        complete el formulario, nos comunicaremos a la brevedad.</p>

                    <h3>Datos de contacto</h3>

                    <p>
                        Dirección: Córdoba 1868. Rosario, Santa Fe. Argentina<br/>
                        Teléfono: +54 341 425 7149<br/>
                        E-mail: fegcoi@fecoi.org.ar
                    </p>

                    <h3>Síganos en las redes</h3>
                    <div class="redes-contacto">
                        <a href="#" class="red-social"><i class="flaticon-facebook-logo"></i> Facebook</a>
                        <a href="#" id="red-linkedin" class="red-social"><i class="flaticon-linkedin-logo"></i> Linkedin</a>
                    </div>
                </div>
                <div class="col-md-7">


                    <form id="form-contacto">
                        <input type="hidden" name="contacto" value="<?php echo wp_create_nonce('contacto-nonce') ?>"/>
                        <input type="hidden" name="action" value="contacto" placeholder="Nombre *"/>
                        <input type="text" name="sex" value="" placeholder="Sex *"/>
                        <div class="fila-contacto">
                            <input type="text" name="nombre" placeholder="Nombre *"/>
                            <input type="text" name="apellido" placeholder="Apellido *"/>
                            <input class="no-margin" type="text" name="email" placeholder="Email *"/>
                        </div>
                        <div class="fila-contacto">
                            <input type="text" name="localidad" placeholder="Localidad *"/>
                            <input type="text" name="telefono" placeholder="Teléfono *"/>
                            <input class="no-margin" type="text" name="empresa" placeholder="Empresa *"/>

                        </div>
                        <div class="fila-contacto">
                            <textarea name="mensaje" placeholder="Mensaje *"></textarea>
                        </div>
                        <div class="fila-contacto">
                            <button>Enviar mensaje</button>
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>



    <div id="mapa-contacto">

        <div id="mapa-contacto-map"></div>

    </div>

</section>





<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDgf-N1irsVUgupvllDsSa533VNJHzIeTo"></script>

<?php
get_footer();
