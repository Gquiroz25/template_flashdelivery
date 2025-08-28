<?php

/**

 * Author: triopsi

 * Author URI: http://wiki.profoxi.de

 * License: GPL3

 * License URI: https://www.gnu.org/licenses/gpl-3.0

 *

 * Ice-Cold is free software: you can redistribute it and/or modify

 * it under the terms of the GNU General Public License as published by

 * the Free Software Foundation, either version 2 of the License, or

 * any later version.

 *

 * Ice-Cold is distributed in the hope that it will be useful,

 * but WITHOUT ANY WARRANTY; without even the implied warranty of

 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the

 * GNU General Public License for more details.

 *

 * You should have received a copy of the GNU General Public License

 * along with wpicecold. If not, see https://www.gnu.org/licenses/gpl-3.0.

 *

 * The header for the theme

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package Ice-Cold

 *

 * @since 1.0.0

 *

 * @version 1.0.0

 */



?>

<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if ( is_singular() && pings_open() ) { ?>

    <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">

    <?php

}

wp_head();

?>

</head>

<body <?php body_class(); ?>>

<?php

if ( get_theme_mod( 'loader_page_jquery' ) === 'yes' ) :

    ?>

    <!-- Preloader -->

        <div class="preloader">

            <div class="status">&nbsp;</div>

        </div>

    <!-- Preloader End -->

    <?php

    endif;

?>



<!-- Header -->

<?php wp_body_open(); ?>



<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'ice-cold' ); ?></a>



<?php if ( is_active_sidebar( 'sidebar-top' ) ) : ?>

    <!-- Sidebar Top -->

    <div class="sidebar-top">

        <div class="container">

            <?php dynamic_sidebar( 'sidebar-top' ); ?>

        </div>

    </div>

    <!-- Sidebar Top END -->

<?php endif; ?>



<?php

if ( has_nav_menu( 'top' ) ) :

    get_template_part( 'template-parts/navigation/navigation', 'top' );

endif;

?>
<div class="wasap"><a href="https://wa.me/+56977663216/?text=Hola%20necesito%20cotizar%20un%20servicio" target="_blank"><img src="https://flashdelivery.cl/img/whatsapp.png"></a></div>
<div class="logo_form">
    <h1 class="env">Enviamos a todo Chile!</h1> 
</div>

<div id="forms">
   
    <div class="sub_text2">
        <h1>Formulario</h1>
        <p>Convenio Empresa (desde 500 envios mensuales)</p>
    </div>

<div class="form_flash">
  <?php echo do_shortcode('[contact-form-7 id="759e69f" title="Sin título"]'); ?>
</div>

</div>



<header id="masthead" class="site-header" role="banner">

    <?php

echo do_shortcode('[smartslider3 slider="2"]');

?>



<div class="slide-down-pl">

    <a href="#busqueda"><i class="fas fa-chevron-down animate__animated animate__infinite animate__pulse"></i></a>

</div>

</header>

<script type="text/javascript">

    window.addEventListener("scroll",function(){

        var nav = document.querySelector("nav");

        nav.classList.toggle("abajo",window.scrollY>0);

    })

</script>

<div id="busqueda" class="busqueda">

      <div class="busqueda_boton">

         Sigue tu Envío <a href="https://www.flashdelivery.cl/seguimiento/"><img src="img/ingresa.png" alt=""></a>

      </div>

    </div>

    <div id="forms_movile">

    <div class="todo_chile">

        <img src="https://flashdelivery.cl/img/envios_achile.png">

    </div>

<?php echo do_shortcode('[contact-form-7 id="759e69f" title="Sin título"]'); ?>

</div>
<div class="caja_consulta">
    <div class="container">
        <h3 class="animate__animated">¿Te Atienden mal los courier grandes?</h3>
        <h2 class="animate__animated">NO PIERDAS EL TIEMPO</h2>
        <p class="animate__animated">PRUÉBANOS!</p>
    </div>
</div>
<!-- Header Media END -->
<div class="puntos_tech">
    <div class="container">
        <div class="col-12 titulo_t">
            <h2>Tecnología de punta</h2>
            <h2>para ser más eficiente y FLASH..</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                    <p class="ico1">Nos permite gestionar de manera más eficaz y automática los procesos de ruteo y entregarles mejores indicadores.</p>
            </div>
            <div class="col-md-6 col-xs-12">
                    <p class="ico2">También otorgar visibilidad de los envíos a sus clientes notificando vía mail los cambios de estado.</p>
            </div>
        </div>
    </div>
</div>
<div class="servicios_h">
    <div class="row" style="height: -webkit-fill-available;">
        <div class="col-md-4 col-xs-12" style="margin: 0;padding: 0;background-color: black;">
            <div class="mod_img_1">
                <div class="texto_bajada"><p>Tripulaciones con experiencia, <strong>calificadas y confiables.</strong></p></div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12" style="margin: 0;padding: 0;background-color: black;">
            <div class="mod_img_2">
                <div class="texto_bajada"><p>Más <strong>entregas exitosas</strong> en tiempo y forma.</p></div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12" style="margin: 0;padding: 0;background-color: black;">
            <div class="mod_img_3">
                <div class="texto_bajada"><p><strong>Cuidamos tu carga</strong> y también a nuestros colaboradores.</p></div>
            </div>
        </div>
    </div>   
</div>


<!-- Header END -->

