


(function ($) {

    var shareWorq = {
        shareLink: document.URL,
        shareMedia: null,
        shareTitle: document.title,
        shareDescription: '',
        shareFacebook: function () {
            window.open('//www.facebook.com/share.php?m2w&s=100&p[url]=' + encodeURIComponent(shareWorq.shareLink) + '&p[images][0]=' + encodeURIComponent(shareWorq.shareMedia) + '&p[title]=' + encodeURIComponent(shareWorq.shareTitle) + '&p[summary]=' + encodeURIComponent(shareWorq.shareDescription), 'Facebook', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        },
        shareTwitter: function () {
            window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(shareWorq.shareLink) + '&text=' + encodeURIComponent(shareWorq.shareTitle) + '%20' + encodeURIComponent(shareWorq.shareLink), 'Twitter', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        },
        shareGooglePlus: function () {
            window.open('//plus.google.com/share?url=' + encodeURIComponent(shareWorq.shareLink), 'GooglePlus', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        },
        shareLinkedIn: function () {
            window.open('//www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(shareWorq.shareLink) + '&title=' + encodeURIComponent(shareWorq.shareTitle) + '&source=' + encodeURIComponent(shareWorq.shareLink), 'LinkedIn', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
        },
        init: function () {
            $('.compartir-nota-fb').click(function (e) {
                e.preventDefault();
                shareWorq.shareFacebook();
            });

            $('.compartir-nota-tw').click(function (e) {
                e.preventDefault();
                shareWorq.shareTwitter();
            });
            $('.compartir-nota-gp').click(function (e) {
                e.preventDefault();
                shareWorq.shareGooglePlus();
            });
            $('.compartir-nota-ln').click(function (e) {
                e.preventDefault();
                shareWorq.shareLinkedIn();
            });

        }

    };

    $(document).ready(function () {

        /* -----------
         *  FORM PEDIR REPORTE
         * ----------- */

        /*
         * FORM CONTACTO
         */

        $('form input[type=text] , form textarea').keydown(function () {
            $(this).removeClass('input-error');
        });

        $('#form-pedir-reporte form').submit(function (event) {
            event.preventDefault();

            var form = $(this);
            var formOK = true;

            form.find('input[type=text],textarea').not('input[name=sex]').each(function () {
                $(this).removeClass('input-error');
                if ($(this).val() === '') {
                    formOK = false;
                    $(this).addClass('input-error');
                }
            });

            if (!formOK) {
                swal("Oops...", "Debe completar todos los campos", "error");
                return false;
            }


            if (!validateEmail(form.find('input[name=email]').val())) {
                form.find('input[name=email]').addClass('input-error');

                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }


            $('#form-pedir-reporte .ajaxing').show();

            $.post(Federacion.ajaxUrl, form.serialize(), function (json) {
                $('#form-pedir-reporte .ajaxing').hide();
                if (json.enviado) {
                    swal("Gracias!", "Se ha enviado tu consulta. Nos comunicaremos a la brevedad", "success");
                    form[0].reset();
                    //ga('send', 'event', {eventCategory: 'contacto', eventAction: 'contacto-enviado'});
                } else {
                    swal("Oops...", "Error al enviar tu consulta!", "error");

                }
            });

        });






        shareWorq.init();

        /* -----------
         *  SLIDER HOME
         * ----------- */

        $('#slider-worq-slides').slick({arrows: false, dots: true, appendDots: '#dots-container', slidesToShow: 1});

        /* -----------
         *  IMAGE LIGHTBOX
         * ----------- */

        var selectorF = '.categoria-ejemplo-producto-galeria a';
        var instanceF = $('.categoria-ejemplo-producto-galeria a').imageLightbox(
                {
                    onStart: function () {
                        overlayOn(instanceF);
                        closeButtonOn(instanceF);
                        arrowsOn(instanceF, selectorF);
                    },
                    onEnd: function () {
                        overlayOff();
                        closeButtonOff();
                        arrowsOff();
                        activityIndicatorOff();
                    },
                    onLoadStart: function () {
                        activityIndicatorOn();
                    },
                    onLoadEnd: function () {
                        activityIndicatorOff();
                        $('.imagelightbox-arrow').css('display', 'block');
                    }
                });



        /* -----------
         *  IMAGE LIGHTBOX EXTRAS
         * ----------- */

        var activityIndicatorOn = function ()
        {
            $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
        },
                activityIndicatorOff = function ()
                {
                    $('#imagelightbox-loading').remove();
                },
                // OVERLAY

                overlayOn = function (instanceF)
                {
                    var overlay = $('<div id="imagelightbox-overlay"></div>');
                    overlay.appendTo('body').click(function () {
                        instanceF.quitImageLightbox();
                    });

                    setTimeout(function () {
                        overlay.addClass('mostrar');
                    }, 100);

                },
                overlayOff = function ()
                {
                    $('#imagelightbox-overlay').removeClass('mostrar');
                    setTimeout(function () {
                        $('#imagelightbox-overlay').remove();
                    }, 200);
                },
                // CLOSE BUTTON

                closeButtonOn = function (instance)
                {
                    $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend', function () {
                        $(this).remove();
                        instance.quitImageLightbox();
                        return false;
                    });
                },
                closeButtonOff = function ()
                {
                    $('#imagelightbox-close').remove();
                },
                // ARROWS
                arrowsOn = function (instance, selector) {


                    if (typeof selector === 'object') {
                        selector = selector.selector;
                    }

                    var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>');

                    $arrows.appendTo('body');

                    $arrows.on('click touchend', function (e)
                    {
                        e.preventDefault();

                        var $this = $(this),
                                $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
                                index = $target.index(selector);

                        if ($this.hasClass('imagelightbox-arrow-left'))
                        {
                            index = index - 1;
                            if (!$(selector).eq(index).length)
                                index = $(selector).length;
                        } else
                        {
                            index = index + 1;
                            if (!$(selector).eq(index).length)
                                index = 0;
                        }

                        instance.switchImageLightbox(index);
                        return false;
                    });
                },
                arrowsOff = function ()
                {
                    $('.imagelightbox-arrow').remove();
                };




        /* -----------
         *  IMAGENES CATEGORIA PRODUCTO
         * ----------- */

        $('.categoria-ejemplo-producto-galeria').slick({slidesToShow: 4, arrows: false, responsive: [
                {
                    breakpoint: 540, settings: {slidesToShow: 1}
                }

            ]});


        /* -----------
         *  BT INTERESADO CLICK
         * ----------- */

        $('.interesado').click(function (e) {

            e.preventDefault();

            var producto = $(this).attr('data-producto-interes');

            $('input[name=tipo_producto]').val(producto);


            $('html, body').animate({
                scrollTop: $("#form-contacto-paginas").offset().top
            }, 1000);

            $('input[name=nombre]').focus();
            return false;

        });

        /* -----------
         *  NEWSLETTER SUSCRIBE
         * ----------- */

        $('#form-suscribir-footer input[name=email]').focus(function () {
            $('#form-suscribir-footer').addClass('focus');
        });
        $('#form-suscribir-footer input[name=email]').blur(function () {
            $('#form-suscribir-footer').removeClass('focus');
        });

        $('#form-suscribir-footer input[name=email]').keyup(function () {
            $('#form-suscribir-footer').removeClass('input-error');
        });

        $('#form-suscribir-footer').submit(function (event) {
            event.preventDefault();

            if (!validateEmail($('#form-suscribir-footer input[name=email]').val())) {
                $('#form-suscribir-footer').addClass('input-error');
                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }



            $('footer .ajaxing').fadeIn();

            $.post(Federacion.ajaxUrl, $('#form-suscribir-footer').serialize(), function (json) {
                $('footer .ajaxing').fadeOut();
                if (json.enviado) {
                    swal("Gracias!", "Te has suscrito a nuestro newsletter!", "success");
                    $('#form-suscribir-footer')[0].reset();
                } else {
                    swal("Oops...", "Error al generar tu suscripcion!", "error");
                }
            });

        });

        /* -----------
         *  SUB MENU 
         * ----------- */


        $('#navbar ul li , #footer-menu li').mouseenter(function () {
            var submenu = $(this).find('.sub-menu');
            if (submenu.length) {
                submenu.addClass('visible');
                $(this).append('<div class="sub-menu-productos-bg"></div>');
            }

        });

        $('.sub-menu , #footer-menu , #primary-menu').mouseleave(function () {
            $('.sub-menu').removeClass('visible');
            $('.sub-menu-productos-bg').remove();
        });


        /* -----------
         *  SUB MENU PRODUCTOS MOBILE
         * ----------- */

        $('ul.sub-menu').on('click', '.sub-menu-productos-bg', function () {

            $('.sub-menu').removeClass('visible');
            $('.sub-menu-productos-bg').remove();
        });


        /*
         * FADE IN SCROLL DOWN
         */

        setTimeout(function () {
            $('.scrollDown').css('opacity', 1);
        }, 1500);





        /*
         * ACCESOS SERVICIOS CLICK
         */

        $('.servicio-acceso').click(function () {
            var servicio = $(this).attr('data-servicio');
            $('html, body').animate({
                scrollTop: $('.' + servicio).offset().top - 10
            }, 1000, 'easeInOutCubic');
        });




        /*
         * MENU MOBILE TOGGLE
         */

        $('#mobile-menu-bt').click(function () {
            $('#navbar').toggleClass('collapse');
            $('body').toggleClass('noScroll');
        });

        /*
         * GALERIA PROYECTO
         */

        $('#proyecto-galeria ul').slick({prevArrow: $('.gal-prev'), nextArrow: $('.gal-next')});


        /*
         * MAPA
         */

        if ($('#mapa-contacto').length > 0) {
            var mapOptions = {center: new google.maps.LatLng(-32.944499, -60.648711), zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false};
            var map = new google.maps.Map(document.getElementById("mapa-contacto-map"), mapOptions);


            var latLngMarker = new google.maps.LatLng(-32.944499, -60.648711, 17);
            var marker = new google.maps.Marker({
                position: latLngMarker,
                map: map,
                icon: Federacion.themeUrl + '/img/map_pin.png',
                scrollwheel: false
            });

            google.maps.event.addListener(marker, 'click', function () {
                map.setZoom(17);
                map.setCenter(marker.getPosition());
            });

        }

    

        /*
         * FORM CONTACTO
         */

        $('#form-contacto input[type=text] , #form-contacto textarea').keydown(function () {
            $(this).removeClass('input-error');
        });

        $('#form-contacto').submit(function (event) {
            event.preventDefault();

            var form = $(this);
            var formOK = true;

            form.find('input[type=text],textarea').not('input[name=sex]').each(function () {
                $(this).removeClass('input-error');
                if ($(this).val() === '') {
                    formOK = false;
                    $(this).addClass('input-error');
                }
            });

            if (!formOK) {
                swal("Oops...", "Debe completar todos los campos", "error");
                return false;
            }


            if (!validateEmail(form.find('input[name=email]').val())) {
                form.find('input[name=email]').addClass('input-error');

                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }


            $('#contacto-form .ajaxing').fadeIn();

            $.post(Federacion.ajaxUrl, $('#form-contacto').serialize(), function (json) {
                $('#contacto-form  .ajaxing').hide();
                if (json.enviado) {
                    swal("Gracias!", "Se ha enviado tu consulta. Nos comunicaremos a la brevedad", "success");
                    form[0].reset();
                } else {
                    swal("Oops...", "Error al enviar tu consulta!", "error");

                }
            });

        });

    });

})(jQuery);


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


