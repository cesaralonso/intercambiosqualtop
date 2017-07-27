<?php 
if(!$islogged && !$isadmin){
    Core::alert("Acceso no permitido");
    Core::redir("./acceso");
}
?>

        <div class="texto-encabezado text-xs-center">
            <div class="container">
                <h1 class="display-4">Mis equipos</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Administra tus equipos.</p>
            </div>
        </div>

    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Mis equipos
                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <h2>Administra tus equipos</h2>
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
        <div class="card card-block text-xs-center">
          <h4 class="card-title">Nuevo</h4>
          <p class="card-text">Crear equipo</p>
          <a href="equipo" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
          {{#each this}}
            <div class="card card-block text-xs-center">
              <h4 class="card-title">{{nombre}}</h4>
              <h2 class="text-primary">{{code}}</h2>
              <p class="card-text">Administrar</p>
              <a href="mi-equipo/{{idequipo}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
              <a href="integrantes/{{idequipo}}" class="btn btn-primary"><i class="fa fa-users"></i></a>
            </div>
          {{/each}}

    </script>


    <script>
        $(function(){

            // Obtener con mi sesion
            var equipo = new Equipo();
            var params = {
                '_method': 'allForMe'
            };
            equipo._set(params);

        });
    </script>