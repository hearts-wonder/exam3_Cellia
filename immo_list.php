<?php

require 'pdo.php';
require 'helpers.php';

$request = 'SELECT * FROM logement';
$res = $bdd->query($request);
$logements = $res->fetchAll(PDO::FETCH_ASSOC);



?>


<!doctype html>
<html lang="en">

<head>
    <title>Liste des logements</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <tr>
            <th>id_logement</th>
            <th>titre</th>
            <th>adresse</th>
            <th>ville</th>
            <th>cp</th>
            <th>surface</th>
            <th>prix</th>
            <th>photo</th>
            <th>type</th>
            <th>description</th>

        </tr>
        <?php foreach ($logements as $loge) : ?>
            <tr>
                <td><?= $loge['id_logement'] ?></td>
                <td><?= $loge['titre'] ?></td>
                <td><?= $loge['adresse'] ?></td>
                <td><?= $loge['ville'] ?></td>
                <td><?= $loge['cp'] ?></td>
                <td><?= $loge['surface'] ?></td>
                <td><?= $loge['prix'] ?></td>
                <td><img src="uploads/<?= $loge['photo'] ?>" height="100"><td>
                <td><?= $loge['type'] ?></td>
                <td><?= $loge['description'] ?></td>
            </tr>

        <?php endforeach; ?>

    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>