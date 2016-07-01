<?php

class LatestActivitiesWorq extends WP_Widget {

    /** constructor */
    function LatestActivitiesWorq() {
        parent::WP_Widget(false, $name = 'Ultimas Actividades Federación');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract($args);
        $qty = esc_attr($instance['qty']);

        echo $before_widget;


        $args = array(
            'numberposts' => $qty,
            'category_name' => 'actividades',
        );

        $actividades = new WP_Query($args);
        ?>

        <?php if ($actividades->have_posts()): ?>
            <div id="proximas-actividades-widget">
                <h2>»Próximas actividades</h2>
                <?php
                while ($actividades->have_posts()) : $actividades->the_post();
                    $fechaPicker = get_field('fecha_actividad', false, false);
                    $fecha = new DateTime($fechaPicker);
                    ?>
                    <a href="<?php the_permalink(); ?>" class="proxima-actividad">

                        <div class="actividad-fecha">
                            <div class="actividad-fecha-dia"><?php echo $fecha->format('d') ?></div>
                            <div class="actividad-fecha-mes"><?php echo $fecha->format('M') ?></div>
                        </div>
                        <div class="actividad-contenido">
                            <h3><?php the_title(); ?></h3>
                        </div>


                    </a>


                <?php endwhile; ?>
                <a href="#" class="actividades-ver-agenda"><i class="flaticon-business"></i><span>Ver Agenda</span></a>
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
                <?php _e('Cantidad de Actividades:', 'vista'); ?> 
                <input class="widefat" id="<?php echo $this->get_field_id('qty'); ?>" name="<?php echo $this->get_field_name('qty'); ?>" type="number" value="<?php echo $qty; ?>" />
            </label>
        </p>
        <?php
    }

}

// class Cycle Widget

function register_my_widget_worq2() {
    register_widget('LatestActivitiesWorq');
}

add_action('widgets_init', 'register_my_widget_worq2');
