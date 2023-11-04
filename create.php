<?php

include("connection.php") ;

if(isset($_POST['submit'])){
    $nomMarche =  $_POST['nomMarche'];
    $description = $_POST['description'];
    $capacite = $_POST['capacite'];
    $adresse =  $_POST['adresse'];
    $telephone = $_POST['telephone'];

    // Gestion du téléchargement du fichier CV
    $cv_directory = "image/"; // Nom du sous-dossier pour les CV
    $cv_temp_name = $_FILES['image']['tmp_name'];
    $cv_name = $_FILES['image']['name'];
    $cv_destination = $cv_directory . $cv_name;

    if (move_uploaded_file($cv_temp_name, $cv_destination)) {
        // Le fichier CV a été téléchargé avec succès.
        // Maintenant, vous pouvez insérer les autres données dans la base de données.
        $sql = "INSERT INTO marche (nomMarche, description, capacite, adresse, telephone, image) VALUES ('$nomMarche', '$description', '$capacite', '$adresse', '$telephone', '$cv_name')";
        $result = mysqli_query($connexion, $sql);

        if ($result) {
            // Les données du candidat ont été insérées avec succès.
            // Redirigez l'utilisateur vers la liste des candidats, par exemple.
            header("location: index.php");
        } else {
            die(mysqli_error($connexion));
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->


</head>
  <body>

  <div class="container my-5">
    <form action="" method="post" enctype="multipart/form-data">
     
        <div class="form-group">
            <label>Nom du marche :</label>
            <input type="text" class="form-control" placeholder="Nom du marche" name="nomMarche" >
        </div>

        <div class="form-group">
        <label for="desc">Description</label><br>
            <textarea name="description" id="desc" cols="148" rows="4" placeholder="Nom du groupe"></textarea>          
            <!-- <input type="text" class="form-control" placeholder="Prenom" name="description"  > -->
        </div>
        <div class="form-group">
            <label>Capacite du marche:</label>
            <input type="text" class="form-control" placeholder="capacite du marche" name="capacite"  >
        </div>

        <div class="form-group">
            <label>Adresse</label>
            <input type="text" class="form-control" placeholder="adresse" name="adresse"  >
        </div>
        <div class="form-group">
            <label>telephone :</label>
            <input type="text" class="form-control" placeholder="telephone" name="telephone"  >
        </div>

        <div class="form-group">
            <label for="fichier">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="reset" name="submit" class="btn btn-danger">Annuler</button>
        <button type="submit" name="submit" class="btn btn-primary ko">Creer</button>
    </form>
    </div>
  </body>
</html>



