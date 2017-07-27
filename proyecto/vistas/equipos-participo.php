<?php 
if(!$islogged){
    Core::alert("Acceso no permitido");
    Core::redir("./acceso");
}
?>

        <div class="texto-encabezado text-xs-center">

            <div class="container">
                <h1 class="display-4">Intercambios participando</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Los intercambios en los que participas.</p>

            </div>

        </div>

    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Mis equipos de intercambio

                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <h2>Administrar mis equipos de intercambio</h2>


                    <div id="equipo">
                    </div>


                </article>
                <aside class="col-md-4 hidden-md-down">
                    <img src="<?=APP_PATH?>images/buho.png" alt="Nosotros">
                </aside>

            </div>
        </div>
    </main>



    <!-- CURRENT EVENTS TEMPLATE -->
    <script id="equipo-template" type="x-text/handlebars">

          {{#each this}}
            <div class="card card-block text-xs-center">
              <h4 class="card-title">{{nombre}}</h4>
              <p class="card-text">Participa eligiendo regalos</p>
              <a href="sorteo-equipo/{{idequipo}}" class="btn btn-primary"><i class="fa fa-users"></i></a>
            </div>
          {{/each}}

    </script>


    <script>
        $(function(){

            // Obtener con mi sesion
            var equipo = new Equipo();
            var params = {
                '_method': 'allMemberForMe'
            };
            equipo._set(params);

        });
    </script>