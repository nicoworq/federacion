<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="main-home">

                <section id="slider-home">

                    <section id="slider-home">
                        <?php
                        echo do_shortcode('[slider-worq]');
                        ?>
                    </section>

                </section>
                <section id="news-home">
                    <?php get_sidebar('home-principal'); ?>
                </section>
            </div>

            <div id="sidebar-home">
                <?php get_sidebar('home'); ?>
                <?php get_sidebar('home-secundario'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php
get_footer();
