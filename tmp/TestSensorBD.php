<?php
// Inclusion de la bibliothèque JpGraph
//header("refresh: 2");
require_once ('jpgraph-4.2.9\src\jpgraph.php');
require_once ('jpgraph-4.2.9\src\jpgraph_bar.php');
require_once('jpgraph-4.2.9\src/jpgraph_line.php');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bdcapteur";

$conn = mysqli_connect($servername, $username, $password, $dbname);




// Check connection
if (!$conn) {
    die("Echec de connexion: " . mysqli_connect_error());
}
// Create connection


//echo $data_int;



while (true)
{
    if(file_exists("tmp/image.jpg"))
    {
        unlink("tmp/image.jpg");
    }

    $requete = "SELECT distance FROM data_capteur_sens";
    $result = mysqli_query($conn,$requete);
    
    $xdata = array();
    $ydata = array();
    // Génération de données aléatoires pour le graphique
    //la requête sql a faire dans data
    while ($row = mysqli_fetch_assoc($result)) {
        
        $ydata[] = $row['distance'];
    }
    
    $graph = new Graph(1500, 1000);
    $graph->SetScale('textlin');
    
    // Ajout du titre
    $graph->title->Set('Courbe de données');
    
    // Création de la courbe
    $lineplot = new LinePlot($ydata);
    $graph->Add($lineplot);
    //$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

    //$fileName ="tmp/image.jpg";
    //$graph->img->Stream($fileName);
    $graph->Stroke("tmp/image.jpg");
    //$graph->Stroke($fileName); 
      

 
sleep(100);

}


?>