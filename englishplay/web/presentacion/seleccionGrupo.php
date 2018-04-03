<?php

include 'header.php';
include '../negocio/grupoLogica.php';

session_start();
$codigousuario = $_SESSION["codEst"];

?>

<html>
  <head>

  </head>

  <body>
    <section style="padding-top: 0rem; padding-bottom: 0rem; background-color: rgba(230,167,86,.9);">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta text-center rounded" id="contenedor" style="background-color: rgba(255,255,255,.85);    position: relative;  padding: 3rem;  margin: .5rem;" > 
              <h2 class="section-heading mb-5">
                    <span class="section-heading-lower">Select the group</span>
              </h2>
              <form enctype="multipart/form-data" action="avanceGrupal.php" method="POST"><br>
                Group: <select name="grupo">
                  <?php echo generarListadoGrupos($codigousuario) ?>
                </select><br><br><br>
                <input type="submit" value="Statistics" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>

<?php

include 'footer.php';

?>