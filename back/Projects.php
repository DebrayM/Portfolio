<?php
require '../Backoffice.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Back-End - Projets</title>
    <link rel="stylesheet" href="../assets/css/Projects.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        $req = $db->query('SELECT idprojets, picture, title, createdat, pagehtml FROM projets');
        $results = $req->fetchAll();
    ?>

<div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-lg-2 coldeskLft"></div>
            <div class="col-lg-8 divForm d-flex flex-column justify-content-center">
                <p class="titre">Projets</p>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Preview</th>
                        <th>Titre</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                <?php
                    foreach($results as $data){
                        /*date_default_timezone_set('Europe/Paris');
                        $date = date_format($data['createdat'], "d-m-Y H:m:s");*/
                        echo "<tr><td>". $data['idprojets']. "</td><td><img src='../assets/uploads/". $data['picture']. "'>". "</td><td>". $data['title']. "</td><td>". $data['createdat']. '</td><td><a href="#" id="edit">Editer</a>/<a href="deleteProject.php?id='. $data['idprojets']. '>Supprimer</a></td></tr>';
                    }
                ?>
                </table>
            </div>
            <div class="col-lg-2 coldeskRght"></div>
        </div>
</div>
</body>
</html>