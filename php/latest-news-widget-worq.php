<?php

class LatestNewsWorq extends WP_Widget {

    /** constructor */
    function LatestNewsWorq() {
        parent::WP_Widget(false, $name = 'Ultimas Noticias Federación');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract($args);
        $qty = esc_attr($instance['qty']);

        echo $before_widget;


        $args = array(
            'numberposts' => $qty,
            'category_name' => 'noticias',
            'meta_key' => 'post_destacado_home',
            'meta_value' => TRUE
        );

        $noticias = new WP_Query($args);
        ?>

        <?php if ($noticias->have_posts()): ?>
            <div class="row">
                <?php
                while ($noticias->have_posts()) : $noticias->the_post();
                    $imgBg = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
                    $categories = get_the_category(get_the_ID());
                    ?>

                    <div class="col-md-4">
                        <a href="<?php the_permalink(); ?>" class="noticia">
                            <div class="noticia-share"><i class="flaticon-share"></i></div>
                            <div class="noticia-bg" style="background-image:url(<?php echo $imgBg ?>);"></div>
                            <div class="noticia-contenido">
                                <h5 class="noticia-categoria"><?php echo $categories[0]->name ?></h5>
                                <h3 class="noticia-titulo"><?php the_title(); ?></h3>      
                            </div>

                        </a>
                    </div>

                <?php endwhile; ?>
            </div>
            <?php
        endif;
        wp_reset_query();
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {

        $qty = isset($instance['qty']) ? esc_attr($instance['qty']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('qty'); ?>">
                <?php _e('Cantidad de Noticias:', 'vista'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('qty'); ?>" name="<?php echo $this->get_field_name('qty'); ?>" type="number" value="<?php echo $qty; ?>" />
            </label>
        </p>
        <?php
    }

}

// class Cycle Widget

function register_my_widget_worq() {
    register_widget('LatestNewsWorq');
}

add_action('widgets_init', 'register_my_widget_worq');
