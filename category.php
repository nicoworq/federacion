<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Villber
 */
get_header();


$titulo = get_queried_object();
?>


<header class="page-header" style="background-image: url(<?php echo get_template_directory_uri() . "/img/{$titulo->slug}-bg.jpg" ?>);">
    <h1>
        <?php
        echo $titulo->name;
        ?>
    </h1>
</header><!-- .page-header -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            get_sidebar('categoria');
            ?>
            <div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">

                    <?php if (have_posts()) : ?>

                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            get_template_part('template-parts/content', 'listado-' . $titulo->slug);
                        endwhile;
                        the_posts_navigation();
                    else :
                        get_template_part('template-parts/content', 'none');
                    endif;
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<?php
get_footer();
