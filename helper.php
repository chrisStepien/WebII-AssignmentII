<?php
// Outputs table row
function outputTableRow($row) {
  echo "<tr>";
  echo "<td class='stockRow' id='stockDate'>" . $row['date'] . "</td>";
  echo "<td class='stockRow' id='stockOpen'>" . $row['open'] . "</td>";
  echo "<td class='stockRow' id='stockClose'>" . $row['close'] . "</td>";
  echo "<td class='stockRow' id='stockLow'>" . $row['low'] . "</td>";
  echo "<td class='stockRow' id='stockHigh'>" . $row['high'] . "</td>";
  echo "<td class='stockRow' id='stockVolume'>" . $row['volume'] . "</td>";
  echo "</tr>";
}

?>