
        <div class="texto-encabezado text-xs-center">

            <div class="container">
                <h1 class="display-4">Accesa</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Accesa como lider o como miembro del equipo.</p>
                

                <div class="row">
                    <article class="col-md-6 offset-md-3">
                           <form id="formAcceso">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label hidden-sm-down">Email</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su email" data-toggle="tooltip" data-placement="top" title="Ingrese su email" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label hidden-sm-down">Password</label>

                                <div class="col-md-8">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su password" data-toggle="tooltip" data-placement="top" title="Ingrese su password" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Accesar</button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
            </div>

        </div>

    </section>


    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Acceso

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


    <script>
        $(function(){

            // Crea lider
            var usuario = new Usuario();
            $(document).off('submit').on('submit', '#formAcceso', function(e){
                e.preventDefault();
        
                var params = {
                    '_email'            : $("#email").val(),
                    '_password'         : $("#password").val(),
                    '_method'           : 'access'
                };
                usuario._set(params);
            });

        });
    </script>
