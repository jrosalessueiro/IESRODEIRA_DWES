<?php
echo "<table border='1'>";
echo "<tr><th>N</th><th>N<sup>2</sup></th><th>N<sup>3</sup></th><th>N<sup>4</sup></th></tr>";

for ($i = 1; $i < 11; $i++) {

    echo '<tr>';
    echo '<td>' . $i . '</td>';
    echo '<td>' . $i ** 2 . '</td>';
    echo '<td>' . $i ** 3 . '</td>';
    echo '<td>' . $i ** 4 . '</td>';
    echo "</tr>";

}
echo "</table>";
?>
