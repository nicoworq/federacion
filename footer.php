<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Villber
 */
?>


<footer>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section id="forme-parte">
                    <h3><span>»</span> Forme parte de la Federación Gremial</h3>
                    <h4>Conozca todos los beneficios que la Federación Gremial, pone a la disposición de su empresa y sea parte del polo de empresarios más grande del pais.</h4>
                    <a href="#" class="bt-sitio bt-sitio-marron">Quiero asociarme</a>
                </section>
            </div>
        </div>
    </div>


    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="navbar-footer" class="navbar-collapse collapse">
                    <a href="#" id="footer-logo">
                        <img src="<?php echo get_template_directory_uri() . '/img/federacion-logo-footer.jpg' ?>" alt="Federacion Gremial" />
                    </a>
                    <div class="clearfix"></div>
                    <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_id' => 'footer-menu')); ?>

                </div>
            </div>
            <div class="col-md-4">
                <div id="suscribir-footer">
                    <h4>Suscríbase a nuestro Newsletter</h4>
                    <p>Reciba en su casilla de email nuestras últimas<br/>
                        noticias, novedades y eventos.</p>
                    <form id="form-suscribir-footer">
                        <input type="text" name="sex"/>
                        <input type="hidden" name="action" value="suscribir"/>
                        <input type="email" placeholder="Ingresa tu email..." name="email"/>
                        <button class="bt-sitio">Suscribirme</button>
                    </form>
                </div>


            </div>
        </div>


    </div>

    <div id="footer-copyright">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy;<?php echo date('Y'); ?> Federación Gremial del Comercio e Industria de Rosario.  <a href="http://worq.com.ar"  target="blank"> Desarrolla WORQ</a>
                </div>
            </div>
        </div>

    </div>
</footer>


<?php if (!is_home()) { ?>

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=388886614495246";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<?php } ?>
    
<?php wp_footer(); ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-34294796-12', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>