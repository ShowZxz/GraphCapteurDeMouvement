<?php
// Inclusion de la bibliothèque JpGraph
//header("refresh: 2");
require_once ('jpgraph-4.2.9\src\jpgraph.php');
require_once ('jpgraph-4.2.9\src\jpgraph_bar.php');
require_once('jpgraph-4.2.9\src/jpgraph_line.php');


$xdata = array(1, 2, 3, 4, 5);
$ydata = array(10, 20, 30, 40, 50);

    // Créer un nouveau graphique
    $graph = new Graph(400, 300);
    $graph->SetScale('textlin');

    // Créer une courbe de ligne
    $lineplot = new LinePlot($ydata, $xdata);
    $graph->Add($lineplot);

    // Envoyer le graphique à l'utilisateur
    $graph->Stroke('graph.jpg');

    // Mettre à jour les données
    $ydata = array(rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100));

    // Attendre 5 secondes avant de générer un nouveau graphique
  


?>