<form action="guardar_pregunta.php" method="post">
  <label for="titulo">Título de la pregunta:</label>
  <input type="text" id="titulo" name="titulo"><br>

  <label for="tipo">Tipo de pregunta:</label>
  <select id="tipo" name="tipo">
    <option value="Texto Libre">Texto Libre</option>
    <option value="Single Choice">Single Choice</option>
    <option value="Multiple Choice">Multiple Choice</option>
  </select><br>

  <!-- Opciones para preguntas de respuesta única -->
  <div id="opciones_single" style="display:none;">
    <label for="opcion1">Opción 1:</label>
    <input type="text" id="opcion1" name="opciones[]"><br>
    <label for="opcion2">Opción 2:</label>
    <input type="text" id="opcion2" name="opciones[]"><br>
    <label for="opcion3">Opción 3:</label>
    <input type="text" id="opcion3" name="opciones[]"><br>
  </div>

  <!-- Opciones para preguntas de respuesta múltiple -->
  <div id="opciones_multiple" style="display:none;">
    <label for="opcion4">Opción 4:</label>
    <input type="text" id="opcion4" name="opciones[]"><br>
    <label for="opcion5">Opción 5:</label>
    <input type="text" id="opcion5" name="opciones[]"><br>
    <label for="opcion6">Opción 6:</label>
    <input type="text" id="opcion6" name="opciones[]"><br>
  </div>

  <button type="submit">Guardar pregunta</button>
</form>

<script>
  // Mostrar u ocultar las opciones según el tipo de pregunta seleccionado
  var tipo = document.getElementById("tipo");
  tipo.addEventListener("change", function() {
    var opciones_single = document.getElementById("opciones_single");
    var opciones_multiple = document.getElementById("opciones_multiple");
    if (tipo.value == "Single Choice") {
      opciones_single.style.display = "block";
      opciones_multiple.style.display = "none";
    } else if (tipo.value == "Multiple Choice") {
      opciones_single.style.display = "none";
      opciones_multiple.style.display = "block";
    } else {
      opciones_single.style.display = "none";
      opciones_multiple.style.display = "none";
    }
  });
</script>
