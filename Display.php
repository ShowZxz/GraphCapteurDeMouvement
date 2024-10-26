<!DOCTYPE html>
<html>
    <head>
      <title>Display</title>
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

    </head>
    <body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jpgraph@4.3.4/dist/jpgraph/jpgraph.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jpgraph@4.3.4/dist/jpgraph/jpgraph_line.js"></script>
	<script>
		$(document).ready(function() {
			// Fonction pour mettre à jour le graphique
			function updateGraph() {
				$.ajax({
					url: "BDsensor.php",
					method: "GET",
					success: function(data) {
						// Mettre à jour le contenu du div avec le nouveau graphique
						$("#graph-container").html(data);
					}
				});
			}

			// Appeler la fonction pour la première fois
			updateGraph();

			// Appeler la fonction toutes les 5 secondes
			setInterval(updateGraph, 5000);
		});
	</script>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <div><h1>Tableau de bord</h1></div>
        <img src='./BDsensor.php'/>        
        <div>
        <button class="refresh-button" onclick="location.reload()">Actualiser</button>
        <a href="TestHtml.php" download="TestHtml.png"><button>Télécharger l'image</button></a>
        

        </div>
    </body>
</html>