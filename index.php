

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->


</head>
  <body>



.
        <?php
          include "connection.php"; // Assurez-vous d'inclure votre fichier de connexion ici

          $sql = "SELECT * FROM Marche";

          $result = mysqli_query($connexion, $sql);

          // Vérifier si la requête a renvoyé des résultats
          if (mysqli_num_rows($result) > 0) {
              // Boucle pour afficher les marchés en colonnes de trois
              while ($row = mysqli_fetch_assoc($result)) {
                  $image = $row['image'];
                  $nomMarche = $row['nomMarche'];
                  $capacite = $row['capacite'];
                  ?>
                  <div class="col-md-3 l5">
                      <div class="row">
                          <img style="height: 80px; width: 100%;" src="image/<?php echo $image; ?>" alt="" class="img">
                      </div>
                      <h5 class="titre2"><?php echo $nomMarche; ?></h5>
                      <div class="row">
                          <div class="col-md-12">
                              <p class="txt">Capacité : <?php echo $capacite; ?></p>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          } else {
              echo "Aucun résultat trouvé.";
          }
        ?>
    </div>
        </div>





                <!-- </div>    -->
                <script src="css/bootstrap.min.js"></script>
        </body>
</html>
