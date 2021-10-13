<?php
session_start();
require '../Backoffice.php';
$id = 0;
$query = "SELECT idusers FROM users WHERE username='{$_SESSION["newsession"]}'";
$req = $db->query($query);
while($data = $req->fetch()){
    $id = $data['idusers'];
}
if ($id = 0) {
    die("Vous n'êtes pas autorisé à consulter cette page");
}
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
                <p class="titre">Gestion des Projets du Portfolio</p>
                <div class="d-flex justify-content-end">
                    <a href="addProject.php" class="bnt bntBottom">Ajouter un nouveau projet</a>
                </div>
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

                        /* construction de la ligne du tableau */
                        /* début de ligne*/
                        $ligne = "<tr>";
                        /* première colonne : id projet */
                        $ligne =  $ligne. "<td>". $data['idprojets']. "</td>";
                        /* seconde colonne : prévisualisation de l'image */
                        $ligne =  $ligne.  '<td><img src="../assets/uploads/'. $data['picture']. '"></td>';
                        /* troisième colonne : titre de l'image */
                        $ligne =  $ligne.  "<td>". $data['title']. "</td>";
                        /* quatrième colonne : date de création de l'image */
                        /* date en français */ 
                        $datefr = date("d-m-Y H:m:s", strtotime($data['createdat']));
                        $ligne =  $ligne.  "<td>". $datefr. '</td>';
                        /* cinquième colonne : actions sur l'image */
                        $message = "Etes-vous sûr de vouloir supprimer l'image : ". $data['title'];
                        $ligne =  $ligne.  '<td><div class="d-flex flex-column align-items-center justify-content-center gap-1">';
                        $ligne =  $ligne. '<a href="editProject.php?id='. $data['idprojets']. '" class="bnt">Editer</a>';
                        $ligne =  $ligne. '<a href="deleteProject.php?id='. $data['idprojets']. '" class="bnt" onclick="return confirm('. $message. ')">Supprimer</a>';
                        $ligne =  $ligne. '</div></td>';
                         /* fin de ligne */
                         $ligne =  $ligne. "</tr>";
                          /* affichage de la ligne du tableau */
                         echo $ligne;
                    }
                ?>
                </table>
            </div>
            <div class="col-lg-2 coldeskRght justify-content-center">
                <a href="deconnect.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                    <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                    <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg>
                </a>
            </div>
        </div>
</div>
</body>
</html>