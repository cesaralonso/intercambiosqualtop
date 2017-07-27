

        <div class="texto-encabezado text-xs-center">

            <div class="container">
                <h1 class="display-4">Intercambio</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Crea tu Intercambio.</p>

            </div>

        </div>

    </section>
    <section class="ruta py-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="<?=APP_PATH?>">Inicio</a> » Intercambio

                </div>
            </div>
        </div>
    </section>
    <main class="py-1">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <h2>Crea un Intercambio</h2>
                    <p>
                        Comienza creando un intercambio como lider para despues crear un equipo
                    </p>


                    <form id="formIntercambio">

                        <div class="form-group row">
                            <label for="equipo" class="col-md-4 col-form-label">Identifica este intercambio</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ej. Intercambio Qualtop Group 2016" data-toggle="tooltip" data-placement="top" title="IIngrese un indentificador">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_ini" class="col-md-4 col-form-label">Fecha de inicio</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="fecha_ini" name="fecha_ini" placeholder="Fecha de inicio" data-toggle="tooltip" data-placement="top" title="Fecha de inicio">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_fin" class="col-md-4 col-form-label">Fecha de término</label>

                            <div class="col-md-8">
                                <input class="form-control" type="text" id="fecha_fin" name="fecha_fin" placeholder="Fecha de término" data-toggle="tooltip" data-placement="top" title="Fecha de término">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
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

    <script>
        $(function(){

            $("#fecha_fin, #fecha_ini").datepicker({ format: 'yyyy-mm-dd' });

            var intercambio = new Intercambio();
            $(document).off('submit').on('submit', '#formIntercambio', function(e){
                e.preventDefault();
        
                var data = {
                    '_nombre'           : $("#nombre").val(),
                    '_fecha_ini'        : $("#fecha_ini").val(),
                    '_fecha_fin'        : $("#fecha_fin").val(),
                    '_method'           : 'save'
                };
                intercambio._set(data);
    
            });

        });
    </script>

