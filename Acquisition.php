<?php
$i = 1;
while (true) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "bdcapteur";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Echec de connexion: " . mysqli_connect_error());
    }
    $tab = file('data.');
$der_ligne = $tab[count($tab)-1];
$data = substr($der_ligne, -6);
    /*
    
    $file = fopen("data.", "r");

    while (!feof($file)) {
        $lastValue = fgets($file); // Stockage de la dernière valeur lue
        $data = substr($lastValue, -4);
        //$data_int = number_format($data);

    }
    */
    $sql_count = "SELECT COUNT(distance) as nb_rows FROM data_capteur_sens";
    $result_count = mysqli_query($conn, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $nb_rows = $row_count["nb_rows"];
if ($nb_rows > 50) {
    // Suppression des premières valeurs
    $sql_delete = "DELETE  FROM data_capteur_sens ORDER BY date ASC LIMIT 20";
    mysqli_query($conn, $sql_delete);
}

    echo "nombre de valeur : ".$nb_rows.PHP_EOL;
    echo "La valeur est : " . $data. PHP_EOL;
    $sql = "INSERT INTO `data_capteur_sens`(`distance`)
        VALUES ('".$data."');";

    $result = mysqli_query($conn, $sql) or die('Erreur SQL : \r\n'.$sql);
    mysqli_close($conn);

    echo "Le script s'exécute depuis " . $i . " seconde(s)." . PHP_EOL;
    sleep(1); // pause d'une seconde
    $i++;
}
?>