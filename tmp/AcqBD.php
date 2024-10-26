<?php
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
header("refresh: 1");
$tab = file('data.');
$der_ligne = $tab[count($tab)-1];
$data = substr($der_ligne, -5);
$data_int = number_format($data);

echo $data;
$sql = "INSERT INTO `data_capteur_sens`(`distance`)
        VALUES ('".$data_int."');";

        $result = mysqli_query($conn, $sql) or die('Erreur SQL : \r\n'.$sql);
        mysqli_close($conn);

?>