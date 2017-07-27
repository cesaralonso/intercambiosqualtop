
<?php 
if(!$islogged && !$isadmin){
    Core::alert("Acceso no permitido");
    Core::redir("./acceso");
}
?>
        <div class="texto-encabezado text-xs-center">
            <div class="container">
                <h1 class="display-4">Equipo</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Crea tu equipo.</p>
            </div>
        </div>

    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Equipo

                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <h2>Crea tu equipo</h2>
                    <p>
                        Crea los equipos que necesites
                    </p>
                    <form id="formEquipo">
                        <div class="form-group row">
                            <label for="equipo" class="col-md-4 col-form-label">Nombre de Equipo</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su equipo" data-toggle="tooltip" data-placement="top" title="Ingrese su equipo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio_min" class="col-md-4 col-form-label">Precio mínimo</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input class="form-control" type="number" step="10" id="precio_min" name="precio_min" placeholder="Ingrese su precio mínimo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio mínimo" max="20000" >
                                    <span class="input-group-addon">.00 M.N.</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mensaje" class="col-md-4 col-form-label">Precio máximo</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input class="form-control"  type="number" step="10" i id="precio_max" name="precio_max" placeholder="Ingrese su precio máximo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio máximo" max="20000" >
                                    <span class="input-group-addon">.00 M.N.</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_fin" class="col-md-4 col-form-label">Intercambio</label>
                            <div class="col-md-8" id="intercambio-select">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label">Código</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="code" name="code" placeholder="Ingrese un código para compartir" data-toggle="tooltip" data-placement="top" title="Ingrese  un código para compartir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="articulos_max" class="col-md-4 col-form-label">Máximo de articulos permitidos a sugerir por usuario, por default es 5</label>
                            <div class="col-md-8">
                                <input class="form-control" type="number" step="1" i id="articulos_max" name="articulos_max" placeholder="Ingrese el máximo de articulos a sugerir" data-toggle="tooltip" data-placement="top" title="Ingrese el máximo de articulos a sugerir" max="99">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="articulos_max" class="col-md-4 col-form-label">Articulos para el rango de precios (Cada miembro puede agregar más articulos)</label>
                            <div class="col-md-8">
                                <div id="articulos">
                                    <button type="button" id="btnAddArticles" class="btn btn-primary">Revisar y/ó agregar articulos</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </div>
                    </form>

                </article>
                <aside class="col-md-4 hidden-md-down">
                    <img src="<?=APP_PATH?>images/buho.png" alt="Nosotros">
                </aside>
            </div>
        </div>
    </main>



    <!-- Modal 1  -->
    <div class="modal fade" id="usuarioArticulo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edición de articulo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 col-lg-8">

                            <p>Sugiere un articulo nuevo para intercambiar, recuerda que su precio (múltiplos de 10) debe estar en un rango aproximado dentro de lo estipulado como el rango de precios permitidos para intercambiar</p>

                            <form id="formUsuarioArticulo">

                                <input type="hidden" name="idusuario" id="idusuario">
                                <div class="form-group row">
                                    <label for="new_nombre" class="col-md-4 col-form-label">Nombre de Articulo</label>

                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="new_nombre" name="new_nombre" placeholder="Ingrese su nombre" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_precio_min" class="col-md-4 col-form-label">Precio mínimo</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="number" step="10" id="new_precio_min" name="new_precio_min" placeholder="Ingrese su precio mínimo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio mínimo" max="20000" autocomplete="off">
                                            <span class="input-group-addon">.00 M.N.</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_precio_max" class="col-md-4 col-form-label">Precio máximo</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="number" step="10" id="new_precio_max" name="new_precio_max" placeholder="Ingrese su precio máximo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio máximo" max="20000" autocomplete="off">
                                            <span class="input-group-addon">.00 M.N.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-lg-4 hidden-md-down">
                            <img src="<?=APP_PATH?>images/buho.png" alt="" width="200" class="img-fluid m-x-auto">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- CURRENT EVENTS TEMPLATE -->
    <script id="articulos-template" type="x-text/handlebars">
        <div class="btn-group" data-toggle="buttons">
            {{#each this}}
            <label class="btn btn-default" data-idarticulo="{{idarticulo}}" data-idusuario="{{../idusuario}}" data-nombres="{{../nombres}}" >
                {{nombre}}
            </label>
            {{/each}}
            <button data-toggle="modal" data-target="#usuarioArticulo" type="button" class="btn btn-success">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </script>

    <script id="intercambio-select-template" type="x-text/handlebars">
        <select class="form-control" id="intercambio_idintercambio" name="intercambio_idintercambio" data-toggle="tooltip" data-placement="top" title="Elige un intercambio">
            {{#each this}}
            <option value="{{idintercambio}}">{{nombre}}</option>
            {{/each}}
        </select>
    </script>

    <script>
        $(function(){

            // Listado de intercambios de usuario
            var intercambio = new Intercambio();
            var data = {
                '_method'            : 'allForSelect'
            }
            intercambio._set(data);

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

            // Crea equipo
            var equipo = new Equipo();
            $(document).off('submit').on('submit', '#formEquipo', function(e){
                e.preventDefault();
        
                var data = {
                    '_nombre'                       : $("#nombre").val(),
                    '_precio_min'                   : $("#precio_min").val(),
                    '_precio_max'                   : $("#precio_max").val(),
                    '_intercambio_idintercambio'    : $("#intercambio_idintercambio").val(),
                    '_code'                         : $("#code").val(),
                    '_articulos_max'                : $("#articulos_max").val(),
                    '_method'                       : 'save'
                };
                equipo._set(data);
    
            });

            $('#usuarioArticulo').on('shown.bs.modal', function(event) {

                var modal = $(this)
                // Crea articulo
                $(document).off('submit').on('submit', '#formUsuarioArticulo', function(e){
                    e.preventDefault();
                    
                    var articulo = new Articulo();
                    var params = {
                        '_nombre'           : $("#new_nombre").val(),
                        '_precio_min'       : $("#new_precio_min").val(),
                        '_precio_max'       : $("#new_precio_max").val(),
                        '_old_precio_min'   : $("#precio_min").val(),
                        '_old_precio_max'   : $("#precio_max").val(),
                        '_method'           : 'saveFromEquipo'
                    }
                    articulo._set(params);

                    // Limpia formulario
                    $("#nombre").val("");

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 1500);
        
                });

            })

            $('#usuarioArticulo').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var usuario_equipo_precio_min = $("#precio_min").val()
                var usuario_equipo_precio_max = $("#precio_max").val()
                
                var modal = $(this)

                modal.find('.modal-title').text("Sugerir regalo para cada miembro del equipo con rango de precios de $" + usuario_equipo_precio_min + " a $" + usuario_equipo_precio_max)


            })

            $('#btnAddArticles').on('click', function(e) {
                e.preventDefault();

                if($("#precio_min").val() === ""){
                    setFlash("Debes definir un precio mínimo", "danger");
                    return false;
                }
                if($("#precio_max").val() === ""){
                    setFlash("Debes definir un precio máximo", "danger");
                    return false;
                }

                // Llena lista de articulos
                var articulo = new Articulo();
                var params = {
                '_precio_min' : $("#precio_min").val(),
                '_precio_max' : $("#precio_max").val(),
                '_method'     : 'allForRadios'
                }
                articulo._set(params);
            });

        });
    </script>