<?php 

    session_start();
    include "core/autoload.php";

    $view = (!isset($_GET['view'])) ? "index" : $_GET['view'];

    $islogged = (isset($_SESSION['idusuario'])) ? true : false;
    $isleader = (isset($_SESSION['idrol']) && $_SESSION['idrol']==="LIDER") ? true : false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Intercambios Qualtop Group</title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="<?=APP_PATH?>images/qtp-icon.png">
    <!-- Cargando fuentes -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic' rel='stylesheet' type='text/css'>
    <!-- Cargando iconos -->
    <link href='<?=APP_PATH?>css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <!-- Carga de Galeria de imágenes -->
    <link rel="stylesheet" href="<?=APP_PATH?>css/owl.carousel.min.css">
    <!-- Carga de archivos css -->
    <link rel="stylesheet" href="<?=APP_PATH?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=APP_PATH?>css/animate.min.css">
    <link rel="stylesheet" href="<?=APP_PATH?>css/estilos.css">
    <link rel="stylesheet" type="text/css" href="<?=APP_PATH?>res/toast.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <script src="<?=APP_PATH?>js/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body <?=(($view !== 'index' && $view !== 'salir' && $view !== 'acceso' && $view !== 'registro') ? 'class="paginas-internas"' : '')?>>
    <section class="bienvenidos">

        <header class="encabezado navbar-fixed-top" role="banner" id="encabezado">
            <div class="container">
                <a href="<?=APP_PATH?>" class="logo text-white" style="text-decoration:none">
                    <span class="hidden-md-up">INTERCAMBIOS QGROUP</span>
                    <span class="hidden-md-down">INTERCAMBIOS QUALTOP GROUP</span>
                </a>
                <!--
                <button type="button" class="boton-menu" data-toggle="collapse" data-target="#bloque-buscar" aria-expanded="false">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                -->
                <button type="button" class="boton-buscar hidden-md-up" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
                    <i class="fa fa-bars" aria-hidden="true"></i></button>
                <!--
                <form action="#" id="bloque-buscar" class="collapse">
                    <div class="contenedor-bloque-buscar">
                        <input type="text" placeholder="Buscar...">
                        <input type="submit" value="Buscar">
                    </div>
                </form>
                -->
                <nav id="menu-principal" class="collapse">
                    <ul>
                        <li <?=(($view === 'index') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>index">Inicio</a></li>
                        <li <?=(($view === 'nosotros') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>nosotros">Nosotros</a></li>

                        <?php if($islogged && !$isleader): ?>
                        <li <?=(($view === 'equipos-participo') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>equipos-participo">Participar</a></li>
                        <?php endif; ?>

                        <?php if(!$islogged): ?>
                        <li <?=(($view === 'registro') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>registro">Registrate</a></li>
                        <?php endif; ?>
                        
                        <?php if($islogged && $isleader): ?>
                        <li <?=(($view === 'intercambio') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>intercambio">Crea tu intercambio</a></li>
                        <li <?=(($view === 'mis-equipos') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>mis-equipos">Equipos</a></li>
                        <!--<li <?=(($view === 'mis-intercambios') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>mis-intercambios">Intercambios</a></li>-->
                        <?php endif; ?>

                        <?php if($islogged): ?>
                        <li><a href="<?=APP_PATH?>salir">Salir</a></li>
                        <?php endif; ?>

                        <?php if(!$islogged): ?>
                        <li <?=(($view === 'acceso') ? 'class="active"' : '')?>><a href="<?=APP_PATH?>acceso">Acceso</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
        </header>

    <?php include("vistas/$view.php"); ?>

    <footer class="piedepagina py-1" role="contentinfo">
        <div class="container">
            <p>2016 © INTERCAMBIOS QUALTOP GROUP Todos los derechos reservados</p>
            <!--
            <ul class="redes-sociales">
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"> </i>  </a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i> </a></li>
            </ul>
            -->
        </div>
    </footer>

    <a data-scroll class="ir-arriba" href="#encabezado"><i class="fa  fa-arrow-circle-up" aria-hidden="true"> </i> </a>

    <!-- Carga de archivos  JS -->
    <script src="<?=APP_PATH?>js/bootstrap.min.js"></script>
    <script src="<?=APP_PATH?>js/owl.carousel.min.js"></script>
    <script src="<?=APP_PATH?>res/handlebars/handlebars.js"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoWidth: false,
            navText: ['<i class="fa fa-arrow-circle-left" title="Anterior"></i>', '<i class="fa  fa-arrow-circle-right" title="Siguiente"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                500: {
                    items: 2,
                    margin: 20
                },
                800: {
                    items: 3,
                    margin: 20
                },
                1000: {
                    items: 4,
                    margin: 20
                }
            }
        })

    </script>
    <script src="<?=APP_PATH?>js/wow.min.js"></script>
    <script src="<?=APP_PATH?>js/smooth-scroll.min.js"></script>
    <script src="<?=APP_PATH?>js/sitio.js"></script>

    <!-- Notificaciones -->
    <script src="<?=APP_PATH?>res/toast.js"></script>
    <script src="<?=APP_PATH?>res/html2canvas.js"></script>
    <script>
        var opts = {
            "closeButton" : true,
            "debug" : false,
            "positionClass" : "toast-bottom-right",
            "onclick" : null,
            "showDuration" : "600",
            "hideDuration" : "1300",
            "timeOut" : "7500",
            "extendedTimeOut" : "1000",
            "showEasing" : "swing",
            "hideEasing" : "linear",
            "showMethod" : "fadeIn",
            "hideMethod" : "fadeOut"
        };
        function set_flash(msg, clase){
            switch (clase){
            case 'danger' :
                toastr.error(msg, '¡Error!', opts);
            break;
            case 'error' :
                toastr.error(msg, '¡Error!', opts);
            break;
            case 'success' :
                toastr.success(msg, '¡Perfecto!', opts);
            break;
            case 'warning' :
                toastr.warning(msg, 'Atención', opts);
            break;
            default :
                toastr.info(msg, 'Mensaje', opts);
            break;
            }
        }
        function setFlash(msg, clase){
          set_flash(msg, clase);
        }

    </script>

    <?php
    //Carga todos los archivos de la carpeta assets/js
    Core::includeJS();
    ?>

</body>
</html>
