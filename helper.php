<?php

function outputTableRow($row) {
  echo "<tr>";
  echo "<td class='stockRow' id='stockDate'>" . $row['date'] . "</td>";
  echo "<td class='stockRow' id='stockOpen'>" . number_format($row['open'], 2, '.', '') . "</td>";
  echo "<td class='stockRow' id='stockClose'>" . number_format($row['close'], 2, '.', '') . "</td>";
  echo "<td class='stockRow' id='stockLow'>" . number_format($row['low'], 2, '.', '') . "</td>";
  echo "<td class='stockRow' id='stockHigh'>" . number_format($row['high'], 2, '.', '') . "</td>";
  echo "<td class='stockRow' id='stockVolume'>" . number_format($row['volume']) . "</td>";
  echo "</tr>";
}

?>
