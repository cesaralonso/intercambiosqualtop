<?php 
if(!$islogged && !$isadmin){
    Core::alert("Acceso no permitido");
    Core::redir("../acceso");
}
?>
        <div class="texto-encabezado text-xs-center">
            <div class="container">
                <h1 class="display-4">Mi equipo</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Administra tu equipo.</p>
            </div>
        </div>

    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Mi equipo
                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <h2>Administra tu equipo</h2>

                    <div id="equipo-byid"></div>
                    
                </article>
                <aside class="col-md-4 hidden-md-down">
                    <img src="<?=APP_PATH?>images/buho.png" alt="Nosotros">
                </aside>

            </div>
        </div>
    </main>



    <!-- CURRENT EVENTS TEMPLATE -->
    <script id="equipo-byid-template" type="x-text/handlebars">


        <form id="formEditarEquipo">
            {{#this}}
            <div class="form-group row">
                <label for="equipo" class="col-md-4 col-form-label">Nombre de Equipo</label>
                
                <input class="form-control" type="hidden" id="idequipo" name="idequipo" value="{{idequipo}}">
                
                <div class="col-md-8">
                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su equipo" data-toggle="tooltip" data-placement="top" title="Ingrese su equipo" value="{{nombre}}">

                </div>
            </div>

            <div class="form-group row">
                <label for="precio_min" class="col-md-4 col-form-label">Precio mínimo</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control"  type="number" step="10" i id="precio_min" name="precio_min" placeholder="Ingrese su precio mínimo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio mínimo" max="20000"  value="{{precio_min}}">
                        <span class="input-group-addon">.00 M.N.</span>

                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="mensaje" class="col-md-4 col-form-label">Precio máximo</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control"  type="number" step="10" i id="precio_max" name="precio_max" placeholder="Ingrese su precio máximo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio máximo" max="20000"  value="{{precio_max}}">
                        <span class="input-group-addon">.00 M.N.</span>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="code" class="col-md-4 col-form-label">Código</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" id="code" name="code" placeholder="Ingrese un código para compartir" data-toggle="tooltip" data-placement="top" title="Ingrese  un código para compartir" value="{{code}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="articulos_max" class="col-md-4 col-form-label">Máximo de articulos permitidos a sugerir por usuario, por default es 5</label>
                <div class="col-md-8">
                      <input class="form-control" type="number" step="1" i id="articulos_max" name="articulos_max" placeholder="Ingrese el máximo de articulos a sugerir" data-toggle="tooltip" data-placement="top" title="Ingrese el máximo de articulos a sugerir" max="99"  value="{{articulos_max}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="intercambio_idintercambio" class="col-md-4 col-form-label">Intercambio</label>
                <div class="col-md-8">
                    <select class="form-control" id="intercambio_idintercambio" name="intercambio_idintercambio" data-toggle="tooltip" data-placement="top" title="Elige un intercambio">
                    {{#each intercambio}}
                        <option  {{#if selected}} selected {{/if}} value="{{idintercambio}}">{{nombre}}</option>
                    {{/each}}
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            {{/this}}
        </form>


    </script>



    <script>
        $(function(){

            $("#precio_min").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $("#precio_max").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $("#articulos_max").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            // Guarda equipo
            var equipo = new Equipo();
            $(document).off('submit').on('submit', '#formEditarEquipo', function(e){
                e.preventDefault();
        
                var data = {
                    '_base_url'                     : '../api/front/equipo.php',
                    '_nombre'                       : $("#nombre").val(),
                    '_idequipo'                     : $("#idequipo").val(),
                    '_precio_min'                   : $("#precio_min").val(),
                    '_precio_max'                   : $("#precio_max").val(),
                    '_code'                         : $("#code").val(),
                    '_intercambio_idintercambio'    : $("#intercambio_idintercambio").val(),
                    '_articulos_max'                : $("#articulos_max").val(),
                    '_method'                       : 'update'
                };
                equipo._set(data);
    
            });

            // Obtener con mi sesion
            var equipo = new Equipo();
            var params = {
                '_base_url': '../api/front/equipo.php',
                '_idequipo': '<?=$_GET["id"]?>',
                '_method': 'byId'
            };
            equipo._set(params);

        });
    </script>