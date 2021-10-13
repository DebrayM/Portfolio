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
    <title>Back-End</title>
    <link rel="stylesheet" href="../assets/css/back.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="../assets/js/code.js" async></script>
</head>
<body>
    <form  action="insertProject.php" method="post" enctype= "multipart/form-data">
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-lg-2 coldeskLft"></div>
            <div class="col-lg-8 divForm">
                <div class="row">
                    <div class="col">
                    <legend class="titreform">Ajouter un nouveau projet</legend>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center gap-3">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" required >
                        <label for="desc">Description</label> 
                        <input type="text" name="desc" id="desc" required >
                        <label for="phtml">Page HTML</label> 
                        <input type="text" name="phtml" id="phtml" required value="Index">
                        <label for="file">Image du projet</label>
                        <input type="file" name="file" id="file" required  onchange="preview()">
                        <div class="d-flex align-items-center justify-content-center p-3">
                            <input type="submit" class="styled" value="Envoyer"/>
                        </div>
                    </div>
                     <div class="col-lg-6 d-flex align-items-center justify-content-center p-0">
                        <img id="frame" src=""/>
                    </div>
                </div>
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
    </form>
</body>
</html>