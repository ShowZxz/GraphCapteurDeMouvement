
<!DOCTYPE html>
<html>
    <head>
        <title>SC</title>
        <style>
   
		.refresh-button {
			background-color: #4CAF50; /* Couleur de fond */
			color: white; /* Couleur du texte */
			border: none; /* Supprimer la bordure */
			padding: 10px 20px; /* Ajouter de l'espace intérieur */
			text-align: center; /* Centrer le texte */
			text-decoration: none; /* Supprimer la décoration de lien */
			display: inline-block; /* Afficher en ligne */
			font-size: 16px; /* Taille de police */
			margin: 20px; /* Ajouter de la marge */
			cursor: pointer; /* Changer le curseur de souris */
			border-radius: 5px; /* Arrondir les coins */
			box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3); /* Ajouter une ombre */
		}

		.refresh-button:hover {
			background-color: #3e8e41; /* Changer la couleur de fond au survol */
		}
	</style>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <?php
// Inclusion de la bibliothèque JpGraph
//header("refresh: 2");
require_once ('jpgraph-4.2.9\src\jpgraph.php');
require_once ('jpgraph-4.2.9\src\jpgraph_bar.php');
require_once('jpgraph-4.2.9\src/jpgraph_line.php');

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdcapteur', 'root', '');


// Create connection
$requete = $bdd->query('SELECT distance FROM data_capteur_sens');
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

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

//echo $data_int;



// Création du graphique à barres
// Création de l'objet Graph
$graph = new Graph(1000, 700);
$graph->SetScale('textlin');
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

// Ajout du titre
$graph->title->Set('Courbe de données');

// Création de la courbe
$lineplot = new LinePlot($data_temp);
$graph->Add($lineplot);

// Affichage du graphique

//$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
$graph->img->Stream($fileName);
$fileName = "TestHtml.png";
$_POST


?>

<h1>Ma page avec un bouton d'actualisation</h1>
<img src="jpgraph-4.2.9\src\graph.php" alt="Mon graphique" />
<button class="refresh-button" onclick="location.reload()">Actualiser</button>
           </body>
</html>