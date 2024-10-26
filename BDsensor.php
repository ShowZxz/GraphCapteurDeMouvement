<?php
// Inclusion de la bibliothèque JpGraph
//header("refresh: 2");
require_once ('jpgraph-4.2.9\src\jpgraph.php');
require_once ('jpgraph-4.2.9\src\jpgraph_bar.php');
require_once('jpgraph-4.2.9\src/jpgraph_line.php');

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdcapteur', 'root', '');


// Create connection
$requete = $bdd->query('SELECT distance FROM data_capteur_sens');
$date_sql = $bdd->query('SELECT date FROM data_capteur_sens');
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
$date = $date_sql->fetchAll(PDO::FETCH_ASSOC);

// Check connection
if (!$bdd) {
    die("Echec de connexion: " . mysqli_connect_error());
}
// Génération de données aléatoires pour le graphique
//la requête sql a faire dans data



$data_temp = array();
foreach ($donnees as $row) {
    $data_temp[] = $row['distance'];
}
$date_temp = array();
foreach ($date as $row1) {
    $date_temp[] = $row1['date'];
}

//echo $data_int;



// Création du graphique à barres
// Création de l'objet Graph
$graph = new Graph(3500, 1500, 'auto');
$graph->SetScale('textlin');

// Ajout du titre
$graph->title->Set('Courbe de données');

$graph->ygrid->SetFill(true);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->HideZeroLabel(false);
$graph->xaxis->SetLabelFormat('%0.1f%%');
$graph->xaxis->SetFont(FF_FONT2);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetWeight(10);
$graph->xaxis->SetTitlemargin(50);

$graph->xaxis->SetTickLabels($date_temp);

$graph->SetBox(false);

// Création de la courbe
$lineplot = new LinePlot($data_temp);
$graph->Add($lineplot);
$lineplot->SetColor("#B22222");
$lineplot->SetLegend('Distance');

// Affichage du graphique
// $i=2;
// while ($i>1){
    $graph->Stroke();  
// }


