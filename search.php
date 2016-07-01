<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Villber
 */
get_header();
?>


<header class="page-header">
    <h1 class="page-title"><?php printf(esc_html__('Resultados para: %s'), '<span>' . get_search_query() . '</span>'); ?></h1>
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
                            get_template_part('template-parts/content', 'listado-noticias');
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
