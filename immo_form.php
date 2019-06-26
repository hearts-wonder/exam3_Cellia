<?php
require 'pdo.php';
require 'helpers.php';

if (!empty($_POST)) {

    if (!isset($_POST['titre'])) {
        throw new Exception('Le champ titre est vide.');
    }

    if (!isset($_POST['adresse'])) {
        throw new Exception('Le champ adresse est vide.');
    }

    if (!isset($_POST['ville'])) {
        throw new Exception('Le champ ville est vide.');
    }

    if (!isset($_POST['cp'])) {
        throw new Exception('Le champ cp est vide.');
    }

    if ($_POST['cp'] < 1000) {
        throw new Exception('Le champ cp est incorrect.');
    }

    if ($_POST['cp'] > 100000) {
        throw new Exception('Le champ cp est incorrect.');
    }

    if (!isset($_POST['surface'])) {
        throw new Exception('Le champ surface est vide.');
    }

    if (!is_numeric($_POST['surface'])) {
        throw new Exception('Le champ surface n\'a pas le bon format.');
    }

    if (!isset($_POST['prix'])) {
        throw new Exception('Le champ prix est vide.');
    }

    if (!is_numeric($_POST['prix'])) {
        throw new Exception('Le champ prix n\'a pas le bon format.');
    }

    if (!isset($_POST['type'])) {
        throw new Exception('Le champ type est vide.');
    }

    if (!isset($_POST['description'])) {
        throw new Exception('Le champ description est vide.');
    }


    $request = 'INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description)
                VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type, :description)';

    $results = $bdd->prepare($request);
    $results->execute([

        'titre'         => $_POST['titre'],
        'adresse'       => $_POST['adresse'],
        'ville'         => $_POST['ville'],
        'cp'            => $_POST['cp'],
        'surface'       => $_POST['surface'],
        'prix'          => $_POST['prix'],
        'photo'         => $_FILES['photo']['name'],
        'type'          => $_POST['type'],
        'description'   => $_POST['description']
    ]);


    $id = $bdd->lastInsertId();
    $newName = 'logement_' . $id;

    if ($_FILES['photo']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['photo']['size'] <= 32000000) {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['photo']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' .  $newName . '.' . $extension_upload);
                echo "L'envoi a bien été effectué !";

                $request = 'UPDATE logement SET image = :image WHERE id_logement = :id_logement';

                $response = $bdd->prepare($request);
                $response->execute([
                    'id_logement' => $id,
                    'image' => $newName
                ]);

                $titreAncienneImage = 'building';      // Le nom de l'image de départ AVEC extension
                $extension = 'jpg';               // L'extension de départ
                $dossierEnregistrement = 'uploads';   // Le dossier de stockage des images, sans "/" !!!
                $titreNouvelleImage = $titreAncienneImage . '_300x300.' . $extension;
            }
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Ajouter des logements</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row col-12 mt-3">
            <form action="immo_form.php" method="post" enctype="multipart/form-data">
                <input name="titre" type="text" placeholder="titre">
                <input name="adresse" type="text" placeholder="adresse">
                <input name="ville" type="text" placeholder="ville">
                <input name="cp" type="text" placeholder="cp">
                <input name="surface" type="text" placeholder="surface">
                <input name="prix" type="text" placeholder="prix">
                <input name="photo" type="file" placeholder="photo">
                <input name="type" type="text" placeholder="type">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="location">
                    <label class="form-check-label" for="exampleRadios1">
                        Location
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="vente">
                    <label class="form-check-label" for="exampleRadios2">
                        Vente
                    </label>
                </div>
                <input name="description" type="textarea" placeholder="description">
                <button class="btn btn-success m-2" value="Envoyer">Envoyer</button>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>