<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 */
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>" class="noticia-listado post-listado">

        <div class="post-listado-bg" style="background-image: url(<?php echo $feat_image ?>);"></div>
        <div class="post-listado-contenido">
            <h5 class="post-fecha">
                <?php the_time('d M') ?>
            </h5>
            <h2 class="post-titulo"><?php the_title(); ?></h2>
            <div class="post-extracto">
                <?php the_excerpt(); ?>
            </div>
            <div class="post-ver-mas">
                Ver más
            </div>
        </div>
    </a>
</article><!-- #post-## -->
