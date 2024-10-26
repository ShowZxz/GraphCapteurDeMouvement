<?php
$i = 1;
while (true) {
    echo "Le script s'exécute depuis " . $i . " seconde(s)." . PHP_EOL;
    sleep(1); // pause d'une seconde
    $i++;
}
?>
