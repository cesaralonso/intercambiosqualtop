<?php

session_destroy();
unset($_SESSION);

?>

        <div class="texto-encabezado text-xs-center">

            <div class="container">
                <h1 class="display-4">Hasta pronto!</h1>
                <p class="wow bounceIn" data-wow-delay=".3s">Fue un gusto ayudarte</p>

            </div>

        </div>

    </section>
<script>
	setTimeout(function() {
		window.location='./';
	}, 1500);
</script>



