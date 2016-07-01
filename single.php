<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Villber
 */
get_header();
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            get_sidebar('categoria');
            ?>

            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/content', 'single-post');


                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <div class="clearfix"></div>





        </div>
    </div>
</div>


<section id="contenido-relacionado">

    <div class="container">
        <div class="row">
            <h2>»Entradas relacionadas</h2>
        </div>
        <div class="row">

            <?php
            if (is_single()) {
                global $post;
                $categories = get_the_category();
                $args = array(
                    'cat' => $categories[0]->cat_ID,
                    'order' => DESC,
                    'orderby' => rand,
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 4
                );

                $relacionados = get_posts($args);
                if (count($relacionados)) {

                    foreach ($relacionados as $post) {

                        $imgBg = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
                        $categories = get_the_category(get_the_ID());
                        ?>
                        <div class="col-md-3">
                            <a href="<?php the_permalink(); ?>" class="noticia">
                                <div class="noticia-bg" style="background-image:url(<?php echo $imgBg ?>);"></div>
                                <div class="noticia-contenido">
                                    <h5 class="noticia-categoria"><?php echo $categories[0]->name ?></h5>
                                    <h3 class="noticia-titulo"><?php the_title(); ?></h3>      
                                </div>

                            </a>
                        </div>

                        <?php
                    }
                }
                wp_reset_query();
            }
            ?>

        </div>
    </div>



</section>

<?php
get_footer();
