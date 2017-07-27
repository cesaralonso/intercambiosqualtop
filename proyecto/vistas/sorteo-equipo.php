<?php 
if(!$islogged){
    Core::alert("Acceso no permitido");
    Core::redir("../acceso");
}
?>
        <div class="texto-encabezado text-xs-center">
            <div class="container">
                <h1 class="display-4">Sorteo</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Participa en el sorteo.</p>

            </div>
        </div>
    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Sorteo

                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-12">
                    <h2>Participa en el sorteo de regalos de intercambio</h2>
                    <p>
                        1. Buscate en la lista de participantes y <strong>crea o elige de un listado los articulos que deseas recibir</strong>.
                    </p>
                    <p>
                        2. <strong>Selecciona</strong> el regalo que consideres <strong>mas apropiado para ti y para cada uno de tus compañeros</strong>, el regalo mas votado será el sugerido, ¡participa!, <strong>¡No olvides guardar la selección!</strong>
                    </p>
                    <p>
                        3. Una ves guardada la selección solo debes esperar a que el lider finalize el intercambio para recibir en tu correo el resultado, <strong>con quien debes y que regalo se sugiere intercambiar.</strong> </strong>
                    </p>
                    <div id="integrantes">
                    </div>

                    <div style="text-align: center;">
                        <button type="button" id="btnGuardarSeleccion" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Guardar votos</button>
                    </div>
                </article>

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
                                    <label for="nombre" class="col-md-4 col-form-label">Nombre de Articulo</label>

                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="precio_min" class="col-md-4 col-form-label">Precio mínimo</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="number" step="10" id="precio_min" name="precio_min" placeholder="Ingrese su precio mínimo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio mínimo" max="20000" autocomplete="off">
                                            <span class="input-group-addon">.00 M.N.</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mensaje" class="col-md-4 col-form-label">Precio máximo</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input class="form-control" type="number" step="10" id="precio_max" name="precio_max" placeholder="Ingrese su precio máximo" data-toggle="tooltip" data-placement="top" title="Ingrese su precio máximo" max="20000" autocomplete="off">
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



    <!-- Modal 2  -->
    <div class="modal fade" id="eliminaArticulo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Eliminar artículo</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formEliminaArticulo">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text-center">¿Estás seguro de querer eliminar este artículo?</p>
                                        <input type="hidden" name="delete_idarticulo" id="delete_idarticulo">
                                        <input type="hidden" name="delete_idusuario" id="delete_idusuario">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal 1  -->
    <div class="modal fade" id="listaArticulo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Agrega un articulo existente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 col-lg-8">

                            <p>Sugiere un articulo de una lista para intercambiar con un precio aproximado dentro del rango estipulado de precios permitidos para el intercambio</p>

                            <form id="formListaArticulo">

                                <input type="hidden" name="idusuario" id="articulo_idusuario">
                                <input type="hidden" name="precio_min" id="articulo_precio_min">
                                <input type="hidden" name="precio_max" id="articulo_precio_max">
                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label">Articulo</label>

                                    <div class="col-md-8" id="articulo-select">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
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



    <script id="articulo-select-template" type="x-text/handlebars">
        <select class="form-control" id="idarticulo" name="idarticulo" data-toggle="tooltip" data-placement="top" title="Elige un articulo">
            {{#each this}}
            <option value="{{idarticulo}}">{{nombre}}</option>
            {{/each}}
        </select>
    </script>


    <!-- CURRENT EVENTS TEMPLATE -->
    <script id="integrantes-template" type="x-text/handlebars">

      <h2>Tu equipo</h2>
      <form id="formSeleccionaArticulos">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Compañero</th>
              <th>Regalo Sugerido</th>
            </tr>
          </thead>
          <tbody>

          {{#each this}}
            <tr>
              <td>{{nombres}} {{apellidos}}</td>
              <td>
                <div class="btn-group" data-toggle="buttons">
                    {{#if ismine}}
                    <button data-idusuario="{{idusuario}}" data-min="{{equipo/precio_min}}" data-max="{{equipo/precio_max}}" data-nombres="{{nombres}}" data-toggle="modal" data-target="#listaArticulo" type="button" class="btn btn-primary">
                        <i class="fa fa-list"></i>
                    </button>
                    {{/if}}
                    {{#each articulos}}
                      <label class="btn btn-primary {{#if selected_for_me}}active{{/if}}" data-idarticulo="{{idarticulo}}" data-idusuario="{{../idusuario}}" data-nombre="{{nombre}}" >
                        <input type="radio" name="options{{../idusuario}}" autocomplete="off" data-idusuario="{{../idusuario}}" data-idarticulo="{{idarticulo}}" >{{nombre}}
                      </label>
                      {{#if ../ismine}}
                      <button class="btn btn-danger" data-toggle="modal" data-target="#eliminaArticulo" data-idarticulo="{{idarticulo}}" data-idusuario="{{../idusuario}}" data-nombre="{{nombre}}"><i class="fa fa-close"></i></button>
                      {{/if}}
                    {{/each}}
                    {{#if ismine}}
                    <button data-idusuario="{{idusuario}}" data-min_raw="{{equipo/precio_min_raw}}" data-max_raw="{{equipo/precio_max_raw}}" data-min="{{equipo/precio_min}}" data-max="{{equipo/precio_max}}" data-nombres="{{nombres}}" data-toggle="modal" data-target="#usuarioArticulo" type="button" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </button>
                    {{/if}}
                </div>
              </td>
            </tr>
          {{/each}}

          </tbody>
        </table>
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


            $('#btnGuardarSeleccion').on('click', function(event) {

                var inputs = $('#formSeleccionaArticulos input:radio:checked');
                $.each(inputs, function(){

                    var usuario = new Usuario();
                    var params = {
                        '_base_url'         : '../api/front/usuario.php',
                        '_idarticulo'       : $(this).attr("data-idarticulo"),
                        '_idusuario'        : $(this).attr("data-idusuario"),
                        '_method'           : 'saveLikeArticulo'
                    }
                    usuario._set(params);

                });
                setFlash("Tus sugerencias de regalo han sido guardadas", "success");

            });


            $('#listaArticulo').on('shown.bs.modal', function(event) {

                var modal = $(this)

                // Listado de articulos de usuario
                var articulo = new Articulo();

                var data = {
                    '_base_url'     : '../api/front/articulo.php',
                    '_precio_min'   : $("#articulo_precio_min").val(),
                    '_precio_max'   : $("#articulo_precio_max").val(),
                    '_idequipo'     : '<?=$_GET['id']?>',
                    '_method'       : 'allForSelect'
                }
                articulo._set(data);


                // Agrega articulo
                $(document).off('submit').on('submit', '#formListaArticulo', function(e){
                    e.preventDefault();
                    
                    var articulo = new Articulo();
                    var params = {
                        '_base_url'         : '../api/front/articulo.php',
                        '_idusuario'        : $("#articulo_idusuario").val(),
                        '_idarticulo'       : $("#idarticulo").val(),
                        '_idequipo'         : '<?=$_GET['id']?>',
                        '_method'           : 'saveUsuarioHasArticulo'
                    }
                    articulo._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 1500);
        
                });

            })


            $('#listaArticulo').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
                var usuario_equipo_precio_min = button[0].dataset.min
                var usuario_equipo_precio_max = button[0].dataset.max
                
                var modal = $(this)

                modal.find('.modal-title').text("Sugerir regalo para " + usuario_nombres + " con rango de precios de $" + usuario_equipo_precio_min + " a $" + usuario_equipo_precio_max)
                modal.find('.modal-body input#articulo_idusuario').val(usuario_idusuario)
                modal.find('.modal-body input#articulo_precio_min').val(usuario_equipo_precio_min)
                modal.find('.modal-body input#articulo_precio_max').val(usuario_equipo_precio_max)

            })

            // Elimina articulo con confirmacion
            $('#eliminaArticulo').on('shown.bs.modal', function (event) {
                
                var modal = $(this)

                $(document).off('submit').on('submit', '#formEliminaArticulo', function(e){
                    e.preventDefault();

                    var articulo = new Articulo();
                    // Elimina articulo
                    var params = {
                       '_base_url'    : '../api/front/articulo.php',
                       '_idequipo'    : '<?=$_GET['id']?>',
                       '_idarticulo'  : $("#delete_idarticulo").val(),
                       '_idusuario'   : $("#delete_idusuario").val(),
                       '_method'      : 'delete'
                    }
                    articulo._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 750);

                });
            })


            // Elimina usuario con confirmacion
            $('#eliminaArticulo').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var articulo_idarticulo = button[0].dataset.idarticulo 
                var articulo_nombre = button[0].dataset.nombre
            
                var modal = $(this)
                
                modal.find('.modal-title').text("Eliminar " + articulo_nombre)
                modal.find('.modal-body input#delete_idusuario').val(usuario_idusuario)
                modal.find('.modal-body input#delete_idarticulo').val(articulo_idarticulo)

            })


            $('#usuarioArticulo').on('shown.bs.modal', function(event) {

                var modal = $(this)
                // Crea articulo
                $(document).off('submit').on('submit', '#formUsuarioArticulo', function(e){
                    e.preventDefault();
                    
                    var articulo = new Articulo();
                    var params = {
                        '_base_url'         : '../api/front/articulo.php',
                        '_idequipo'         : '<?=$_GET['id']?>',
                        '_idusuario'        : $("#idusuario").val(),
                        '_nombre'           : $("#nombre").val(),
                        '_precio_min'       : $("#precio_min").val(),
                        '_precio_max'       : $("#precio_max").val(),
                        '_method'           : 'saveUsuarioHasArticulo'
                    }
                    articulo._set(params);

                    // Limpia formulario
                    $("#idusuario").val("");
                    $("#nombre").val("");

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 1500);
        
                });

            })

            $('#usuarioArticulo').on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
                var usuario_equipo_precio_min = button[0].dataset.min
                var usuario_equipo_precio_max = button[0].dataset.max
                
                $("#precio_min").val(button[0].dataset.min_raw);
                $("#precio_max").val(button[0].dataset.max_raw);
            
                var modal = $(this)

                modal.find('.modal-title').text("Sugerir regalo para " + usuario_nombres + " con rango de precios de $" + usuario_equipo_precio_min + " a $" + usuario_equipo_precio_max)
                modal.find('.modal-body input#idusuario').val(usuario_idusuario)

            })

            // Obtener idequipo con mi sesion
            var equipo = new Equipo();
            var params = {
                '_base_url'    : '../api/front/equipo.php',
                '_idequipo'    : '<?=$_GET['id']?>',
                '_method'      : 'getDataById'
            };
            equipo._set(params);
  

            // Llena lista de integrantes
            var usuario = new Usuario();
            var params = {
               '_base_url'   : '../api/front/usuario.php',
               '_idequipo'   : '<?=$_GET['id']?>',
               '_method'     : 'getAllByIdequipoWithArticulos'
            }
            usuario._set(params);

        });
    </script>


