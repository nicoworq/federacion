<?php

class NewsletterWidgetWorq extends WP_Widget {

    /** constructor */
    function NewsletterWidgetWorq() {
        parent::WP_Widget(false, $name = 'Suscribir Newsletter Federación');
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract($args);
        $qty = esc_attr($instance['qty']);

        echo $before_widget;
        ?>
        <div id="suscribir-newsletter-widget">
            <div class="ajaxing"><span></span></div>
            <h3>Newsletter</h3>
            <p>Suscríbase a nuestro boletín de noticias y mantengase informado sobre la actualidad de la región, comercio e industria.</p>
            <form id="form-suscribir-newsletter">
                <input type="text" name="sex"/>
                <input type="hidden" name="action" value="suscribir"/>
                <input type="email" placeholder="Ingrese tu email..." name="email"/>
                <button>Suscribirme</button>
            </form>

        </div>

        <?php
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        ?>
        <p>
            <label>

            </label>
        </p>
        <?php
    }

}

// class Cycle Widget

function register_my_widget_worq3() {
    register_widget('NewsletterWidgetWorq');
}

add_action('widgets_init', 'register_my_widget_worq3');
