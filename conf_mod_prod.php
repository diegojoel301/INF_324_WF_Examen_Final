<?php echo "Confirmacion Modificacion Producto"; ?>

<br>
<label for="si">Sí</label>
<input type="radio" id="Si" name="Si" value="Si">
<br>
<label for="no">No</label>
<input type="radio" id="No" name="No" value="No" onclick="mostrarCuadroTexto()">
<br>
<p>Desea modificar el producto?</p>

<script>
  function mostrarCuadroTexto() {
    var checkboxNo = document.getElementById("No");
    var cuadroTexto = document.getElementById("explicacion");

    if (checkboxNo.checked) {
      cuadroTexto.removeAttribute("disabled");
    } else {
      cuadroTexto.setAttribute("disabled", "disabled");
    }
  }
</script>