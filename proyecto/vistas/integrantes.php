<?php 
if(!$islogged && !$isadmin){
    Core::alert("Acceso no permitido");
    Core::redir("../acceso");
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
                    <h2>Invita participantes a equipo: <span id="equipo_nombre"></span></h2>
                    <p>
                        Invita a los integrantes de tu equipo.
                    </p>

                    <form id="formUsuarioEquipo">
                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label">Nombre completo</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombres" name="nombres" placeholder="Ingrese su nombre y apellido" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">Email</label>

                            <div class="col-md-8">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email" required >
                            </div>
                        </div>         
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar nuevo</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </div>
                    </form>

                </article>
                <aside class="col-md-4 hidden-md-down">
                    <img src="<?=APP_PATH?>images/buho.png" alt="Nosotros">
                </aside>
            </div>
            <div class="row">
                <article class="col-md-8" >
                    <div id="integrantes"></div>
                    <div class="row">
                        <div class="col-md-8 offset-md-4" style="text-align: center;">
                            <button type="button" class="btn btn-info" id="btnEnviaInvitaciones"><i class="fa fa-envelope"></i> Enviar invitación masiva <span class="small">(a no participantes)</span></button> 
                            <button type="button" class="btn btn-warning" id="btnFinalizaSorteo"><i class="fa fa-star"></i> Finalizar Sorteo <span class="small">(para no organizados)</span></button>
                        </div>
                    </div>
                </article>
                <aside class="col-md-4">
                </aside>
            </div>
        </div>
    </main>


    <!-- Modal 1  -->
    <div class="modal fade" id="edicionUsuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edición de usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-8">

                            <form id="formEditaUsuario">

                                <input type="hidden" name="edit_idusuario" id="edit_idusuario">
                                <div class="form-group row">
                                    <label for="nombres" class="col-md-4 col-form-label">Nombre completo</label>

                                    <div class="col-md-8">
                                        <input class="form-control" type="text" id="edit_nombres" name="edit_nombres" placeholder="Ingrese su nombre y apellido" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label">Email</label>

                                    <div class="col-md-8">
                                        <input class="form-control" type="email" id="edit_email" name="edit_email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-4 hidden-md-down">
                            <img src="<?=APP_PATH?>images/buho.png" alt="" width="200" class="img-fluid m-x-auto">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal 2  -->
    <div class="modal fade" id="eliminacionUsuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Eliminar usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formEliminaUsuario">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text-center">¿Estás seguro de querer eliminar este usuario?</p>
                                        <input type="hidden" name="delete_idusuario" id="delete_idusuario">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> Eliminar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3  -->
    <div class="modal fade" id="invitacionUsuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Invitar usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formInvitaUsuario">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text-center">¿Estás seguro de querer enviar invitación a este usuario?</p>
                                        <input type="hidden" name="invita_idusuario" id="invita_idusuario">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal 4 -->
    <div class="modal fade" id="activacionUsuario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Activar/Desactivar participación de integrante</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="formInvitaUsuario">
                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text-center">Activa o desactiva participación de integrante</p>
                                        <input type="hidden" name="activa_idusuario" id="activa_idusuario">
                                        <button type="button" id="btnActivaUsuario" class="btn btn-success"><i class="fa fa-check"></i> Participa</button>
                                        <button type="button" id="btnDesactivaUsuario" class="btn btn-warning"><i class="fa fa-close"></i> No participa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- TEMPLATE -->
    <script id="integrantes-template" type="x-text/handlebars">
        <h2>Tu equipo</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Participa</th>
              <th>Nombre</th>
              <th class="hidden-md-down">Email</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

          {{#each this}}
            <tr>
              <th scope="row"><i class="{{#if participa}}fa fa-check{{else}}fa fa-close{{/if}}"></i></th>
              <td>{{nombres}}</td>
              <td class="hidden-md-down">{{email}}</td>
              <td>
                <a href="#" data-idusuario="{{idusuario}}" data-nombres="{{nombres}}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edicionUsuario"><i class="fa fa-pencil"></i></a>
                <a href="#" data-idusuario="{{idusuario}}" data-nombres="{{nombres}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminacionUsuario"><i class="fa fa-close"></i></a>
                <a href="#" data-idusuario="{{idusuario}}" data-nombres="{{nombres}}" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#invitacionUsuario"><i class="fa fa-envelope-o"></i></a>
                <a href="#" data-accion="{{#if participa}}desactivar{{else}}activar{{/if}}" data-idusuario="{{idusuario}}" data-nombres="{{nombres}}" class="btn btn-{{#if participa}}warning{{else}}primary{{/if}} btn-sm" data-toggle="modal" data-target="#activacionUsuario"><i class="{{#if participa}}fa fa-close{{else}}fa fa-check{{/if}}"></i></a>
              </td>
            </tr>
          {{/each}}

          </tbody>
        </table>
    </script>


    <script>
        $(function(){

            $('#edicionUsuario').on('shown.bs.modal', function (event) {

                var modal = $(this)
                // Crea integrante de equipo
                var usuario = new Usuario();
                $(document).off('submit').on('submit', '#formEditaUsuario', function(e){
                    e.preventDefault();
                    var params = {
                        '_base_url'         : '../api/front/usuario.php',
                        '_idequipo'         : '<?=$_GET['id']?>',
                        '_idusuario'        : $("#edit_idusuario").val(),
                        '_nombres'          : $("#edit_nombres").val(),
                        '_email'            : $("#edit_email").val(),
                        '_rol_idrol'        : 'MIEMBRO',
                        '_method'           : 'updateIntegrante'
                    }
                    usuario._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 1500);
        
                });
            })


            $('#edicionUsuario').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
                
                var modal = $(this)

                // Obtiene usuario
                var params = {
                   'base_url'   : '../api/front/usuario.php',
                   'idusuario'  : usuario_idusuario,
                   'method'     : 'getById'
                }
                $.ajax({
                    url     : params.base_url,
                    method  : 'POST',
                    async   : true,
                    data    : params
                })
                .done(function( _res ){
                    var _res = JSON.parse(_res);
                    modal.find('.modal-title').text("Editar integrante " + _res.nombres)
                    modal.find('.modal-body input#edit_idusuario').val(_res.idusuario)
                    modal.find('.modal-body input#edit_nombres').val(_res.nombres)
                    modal.find('.modal-body input#edit_email').val(_res.email)
                })
                .fail(function( _err ){
                    console.log( _err );
                })

            })

            // Elimina usuario con confirmacion
            $('#eliminacionUsuario').on('shown.bs.modal', function (event) {
                
                var modal = $(this)

                $(document).off('submit').on('submit', '#formEliminaUsuario', function(e){
                    e.preventDefault();

                    var usuario = new Usuario();
                    // Elimina usuario
                    var params = {
                       '_base_url'   : '../api/front/usuario.php',
                       '_idusuario'  : $("#delete_idusuario").val(),
                       '_idequipo'   : '<?=$_GET['id']?>',
                       '_method'     : 'delete'
                    }
                    usuario._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 750);

                });
            })


            // Elimina usuario con confirmacion
            $('#eliminacionUsuario').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
            
                var modal = $(this)
                
                modal.find('.modal-title').text("Eliminar a " + usuario_nombres)
                modal.find('.modal-body input#delete_idusuario').val(usuario_idusuario)

            })



            // Invita usuario con confirmacion
            $('#activacionUsuario').on('shown.bs.modal', function (event) {
                
                var modal = $(this)


                $('#btnActivaUsuario').off('click').on('click', function(e){
                    e.preventDefault();

                    var usuario = new Usuario();
                    // Invita usuario
                    var params = {
                       '_base_url'   : '../api/front/usuario.php',
                       '_idusuario'  : $("#activa_idusuario").val(),
                       '_idequipo'   : '<?=$_GET['id']?>',
                       '_participa'  : 1,
                       '_method'     : 'activarUsuario'
                    }
                    usuario._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 750);

                });


                $('#btnDesactivaUsuario').off('click').on('click', function(e){
                    e.preventDefault();

                    var usuario = new Usuario();
                    // Invita usuario
                    var params = {
                       '_base_url'   : '../api/front/usuario.php',
                       '_idusuario'  : $("#activa_idusuario").val(),
                       '_idequipo'   : '<?=$_GET['id']?>',
                       '_participa'  : 0,
                       '_method'     : 'activarUsuario'
                    }
                    usuario._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 750);

                });


            })


            // Invita usuario con confirmacion
            $('#activacionUsuario').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
                var accion = button[0].dataset.accion
            
                var modal = $(this)
                
                modal.find('.modal-title').text("Participación de " + usuario_nombres)
                modal.find('.modal-body input#activa_idusuario').val(usuario_idusuario)

                if(accion=="activar"){
                    $('#btnDesactivaUsuario').attr('disabled', true);
                    $('#btnActivaUsuario').attr('disabled', false);
                }                
                if(accion=="desactivar"){
                    $('#btnActivaUsuario').attr('disabled', true);
                    $('#btnDesactivaUsuario').attr('disabled', false);
                }

            })
            

            // Invita usuario con confirmacion
            $('#invitacionUsuario').on('shown.bs.modal', function (event) {
                
                var modal = $(this)

                $(document).off('submit').on('submit', '#formInvitaUsuario', function(e){
                    e.preventDefault();

                    var usuario = new Usuario();
                    // Invita usuario
                    var params = {
                       '_base_url'   : '../api/front/usuario.php',
                       '_idusuario'  : $("#invita_idusuario").val(),
                       '_idequipo'   : '<?=$_GET['id']?>',
                       '_method'     : 'enviarInvitacion'
                    }
                    usuario._set(params);

                    setTimeout(function() {
                        modal.modal('hide');
                    }, 750);

                });
            })


            // Invita usuario con confirmacion
            $('#invitacionUsuario').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var usuario_idusuario = button[0].dataset.idusuario 
                var usuario_nombres = button[0].dataset.nombres
            
                var modal = $(this)
                
                modal.find('.modal-title').text("Enviar invitación a " + usuario_nombres)
                modal.find('.modal-body input#invita_idusuario').val(usuario_idusuario)

            })



            // Obtener idequipo con mi sesion
            var equipo = new Equipo();
            var params = {
                '_base_url'    : '../api/front/equipo.php',
                '_idequipo'    : '<?=$_GET['id']?>',
                '_method'      : 'getDataById'
            };
            equipo._set(params);
  
            
            // Crea integrante de equipo
            $('#formUsuarioEquipo').off('submit').on('submit', function(e){
                e.preventDefault();

                var usuario = new Usuario();
                var params = {
                    '_base_url'         : '../api/front/usuario.php',
                    '_idequipo'         : '<?=$_GET['id']?>',
                    '_nombres'          : $("#nombres").val(),
                    '_email'            : $("#email").val(),
                    '_rol_idrol'        : 'MIEMBRO',
                    '_method'           : 'saveIntegrante'
                }
                usuario._set(params);

                // Limpia formulario
                $("#nombres").val("");
                $("#email").val("");
    
            });

            // Llena lista de integrantes
            var usuario = new Usuario();
            var params = {
               '_base_url'   : '../api/front/usuario.php',
               '_idequipo'   : '<?=$_GET['id']?>',
               '_method'     : 'getAllByIdequipo'
            }
            usuario._set(params);


            $('#btnEnviaInvitaciones').on('click', function (event) {

                event.preventDefault();

                // Envia a lista de integrantes
                var usuario = new Usuario();
                var params = {
                   '_base_url'   : '../api/front/usuario.php',
                   '_idequipo'   : '<?=$_GET['id']?>',
                   '_method'     : 'emailToAllByIdequipo'
                }
                usuario._set(params);

            });

            $('#btnFinalizaSorteo').on('click', function (event) {

                event.preventDefault();
                
                // Envia a lista de integrantes
                var usuario = new Usuario();
                var params = {
                   '_base_url'   : '../api/front/usuario.php',
                   '_idequipo'   : '<?=$_GET['id']?>',
                   '_method'     : 'finishAndEmailToAllByIdequipo'
                }
                usuario._set(params);

            });

        });
    </script>
