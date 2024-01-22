<?php
  include 'databaseconnect.php';
  $conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<title>División de Página</title>
</head>
<body>
  <div class="izquierda">
    <div class="marquing">
      <table id="salidas">
        <tr>
          <th>Nombre Voluntario</th>
          <th>ABONOS</th>
          <th>OBLIGATORIAS</th>
          <th>LICENCIAS</th>
          <th>PORCENTAJE TOTAL (Incl. Licencia)</th>
          <th>PORCENTAJE TOTAL (Sin Licencia)</th>
          <th>Abono (%)</th>
          <th>Obligatoria (%)</th>
          <th>Ranking</th>
        </tr>
        <?php
          $sql = "SELECT * FROM diariomural.salidas ORDER BY salidas_jerarquia_voluntario,salidas_ranking ;";
          $result = $conn->query($sql);
          // Verificar si hay resultados
          if ($result->num_rows > 0) {
              // Imprimir los resultados en una lista
              
              while($row = $result->fetch_assoc()) {
                $salidas_abono_totales = $row["salidas_abono_totales"];
                $salidas_obligatoria_totales = $row["salidas_obligatoria_totales"];
                $salidas_nombre_voluntario = $row["salidas_nombre_voluntario"];
                $salidas_abono = $row["salidas_abono"];
                $salidas_obligatoria = $row["salidas_obligatoria"];
                $salidas_licencia = $row["salidas_licencia"];
                $salidas_ranking = $row["salidas_ranking"];

                  echo "<tr>";
                  echo "<td>" . $salidas_nombre_voluntario . "</td>";
                  echo "<td>" . $salidas_abono . "</td>";
                  echo "<td>" . $salidas_obligatoria . "</td>";
                  echo "<td>" . $salidas_licencia . " </td>";
                  echo "<td>" . round(floatval( (($salidas_abono + $salidas_obligatoria + $salidas_licencia) *100)/($salidas_abono_totales+ $salidas_obligatoria_totales)),1). "% </td>";
                  echo "<td>" . round(floatval( (($salidas_abono + $salidas_obligatoria ) *100)/($salidas_abono_totales+ $salidas_obligatoria_totales)),1). "% </td>";
                  echo "<td>" . round(floatval( ($salidas_abono*100)/($salidas_abono_totales)),1). "% </td>";
                  echo "<td>" . round(floatval( ($salidas_obligatoria*100)/($salidas_obligatoria_totales)),1). "% </td>";
                  echo "<td>" . $salidas_ranking. "</td>";
                  echo "</tr>";
              }
              
          } else {
              echo "No hay resultados";
          }
        ?>
      </table>
    </div>
    <div>

    </div>
  </div>
    
    <div class='slider'>
      <img src="images/1.png" />
      <img src="images/2.png" />
      <img src="images/1.png" />
      <img src="images/2.png" />
    </div>
</body>
</html>
<?php
  CloseCon($conn);
?>