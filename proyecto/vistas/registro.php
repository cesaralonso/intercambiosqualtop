

        <div class="texto-encabezado text-xs-center">

            <div class="container">
                <h1 class="display-4">Registrate</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Crea un usuario.</p>

                <article class="col-md-6 offset-md-3">

                    <form id="formUsuario">

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label hidden-sm-down">Nombre(s)</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombres" name="nombres" placeholder="Ingrese sus nombres" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre completo" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label hidden-sm-down">Email</label>

                            <div class="col-md-8">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email" required >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label hidden-sm-down">Password</label>

                            <div class="col-md-8">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su password" data-toggle="tooltip" data-placement="top" title="Ingrese su password" required autocomplete="off">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="re_password" class="col-md-4 col-form-label hidden-sm-down">Repetir Password</label>

                            <div class="col-md-8">
                                <input class="form-control" type="password" id="re_password" name="re_password" placeholder="Repita su password" data-toggle="tooltip" data-placement="top" title="Ingrese su repeticion de password" required autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rol_idrol" class="col-md-4 col-form-label hidden-sm-down">Selecciona un rol</label>
                            
                            <div class="col-md-8">
                                <select class="form-control" id="rol_idrol" name="rol_idrol" data-toggle="tooltip" data-placement="top" title="Elige un rol">
                                    <option value="MIEMBRO">Soy un miembro de un intercambio</option>
                                    <option value="LIDER">Soy el lider de un intercambio</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </article>
            </div>
        </div>
    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Registrate
                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </main>

    <script id="equipo-select-template" type="x-text/handlebars">
        <select class="form-control" id="equipo_idequipo" name="equipo_idequipo" data-toggle="tooltip" data-placement="top" title="Elige un equipo">
            {{#each this}}
            <option value="{{idequipo}}">{{nombre}}</option>
            {{/each}}
        </select>
    </script>


    <script>
        $(function(){

            // Crea usuario
            var usuario = new Usuario();
            $(document).off('submit').on('submit', '#formUsuario', function(e){

                e.preventDefault();

                if($("#password").val() !== $("#re_password").val()){
                    setFlash("El password y su repeticion deben coincidir","error");
                    return false;
                }
        
                var params = {
                    '_nombres'          : $("#nombres").val(),
                    '_password'         : $("#password").val(),
                    '_email'            : $("#email").val(),
                    '_rol_idrol'        : $("#rol_idrol").val(),
                    '_method'           : 'save'

                };
                usuario._set(params);
    
            });

        });
    </script>