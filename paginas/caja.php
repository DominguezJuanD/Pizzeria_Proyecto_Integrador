

<?php include("Menu2.php"); ?>

  <body>
  <section id="caja" >
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0 well" >
        <table style="width:100%" >
          <form id="formulario">
            <tr>
              <td style="width:50%" valign="top">
                <fieldset align="center">
                  <legend align="center">Ingreso / Egreso</legend>
                  <b> Cantidad $ </b>
                 <input type="number" value=0 id="dinero" name="dinero"/>
                 <b>fecha:</b>
                 <input type="date" name="fecha" placeholder="dd/mm/aaaa" id="fecha" value="<?php echo date("Y-m-d");?>">
                  <br>
                  <br>
                  <legend align="center">Justificacion</legend>
                  <!-- <input type="text" id="observacion" name="observacion" size="50"> -->
                  <textarea name="justificar" id="observacion" rows="4" cols="40"></textarea>
                  <span> <b id="cant">4</b></span>
                  <br>
                  <br>
                  <input type="button" value="Limpiar"  onclick="limpiar();" />
                  <input type="button" value="Extraer dinero" onclick="extraer_dinero();" />
                  <input type="button" value="Ingresar dinero" onclick="ingreso_dinero();" />
                </fieldset>
              </td>
            </tr>
          </form>
        </table>
      <div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
    </div>
  </section>
  </body>
<script src= "../js/funciones_factura.js"></script>
