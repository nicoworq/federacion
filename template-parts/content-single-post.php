<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entrada-single'); ?>>

    <div class="entrada-single-thumbnail"  style="background-image: url(<?php echo $feat_image; ?>);">

    </div>
    <h3 class="entrada-single-fecha">
        <?php the_time('d M') ?>
    </h3>
    <h1 class="entrada-single-titulo">
        <?php the_title(); ?>
    </h1>


    <div class="entrada-single-contenido">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

    <?php if (in_category('economia')) { ?>

        <div id="form-pedir-reporte">
            <div class="ajaxing"><span></span></div>
            <h4>Si usted es socio, acceda al informe completo, llenando el siguiente formulario.</h4>

            <form action="#" method="post">
                <input type="text" name="sex" value=""/>
                <input type="hidden" name="pedir-reporte" value="<?php echo wp_create_nonce('pedir-reporte-nonce') ?>"/>
                <input type="hidden" name="action" value="pedir_reporte"/>
                <input type="hidden" name="reporte" value="<?php the_title(); ?>"/>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" placeholder="Nombre..." name="nombre"/>                    
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="Apellido..." name="apellido"/>
                    </div>
                    <div class="col-md-4">
                        <input type="text" placeholder="Empresa..." name="empresa"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" placeholder="Email..." name="email"/>
                    </div>
                    <div class="col-md-6">
                        <select name="camara">
                            <option>Seleccione su cámara</option>
                            <option value="Cámara Empresaria">Cámara Empresaria</option>
                            <option value="Cámara Empresaria">Cámara Empresaria</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button>Acceder al informe completo</button>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>

    <div class="entrada-single-compartir">
        <h4>Compartir articulo</h4>
        <a href="#" class="red-social compartir-nota-fb"><i class="flaticon-facebook-logo"></i> Facebook</a>
        <a href="#" id="red-linkedin" class="red-social compartir-nota-ln"><i class="flaticon-linkedin-logo"></i> Linkedin</a>
        <a href="#" id="red-twitter" class="red-social compartir-nota-tw"><i class="flaticon-twitter-logo-silhouette"></i> Twitter</a>
    </div>


</article><!-- #post-## -->




